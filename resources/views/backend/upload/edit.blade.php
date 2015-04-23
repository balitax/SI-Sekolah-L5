@extends('backend/templates/index')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css')}}">
@stop
@section('js')
<script src="{{asset('assets/js/controller/admin-upload.js')}}"></script>
@stop
@section('content')
<div class="st-pusher" id="content" ng-controller="uploadedit" data-scrollable>
    <div class="st-content">
        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner padding-none">
            <div class="container-fluid">
                <div class="page-section third">

                <div class="row">
                    <div class="col-sm-12">
                        {!! Breadcrumbs::render('uploadedit'); !!}
                        <div class="page-header">
                            <h1>{{$title}}</h1>
                        </div>
                        <!-- end: PAGE TITLE & BREADCRUMB -->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tabbable">
                            <ul class="nav nav-tabs tab-bricky" id="myTab">
                                <li class="active">
                                    <a data-toggle="tab" href="#panel_tab2_example1">
                                        <i class="green fa fa-home"></i> {{$title}}
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="panel_tab2_example1" class="tab-pane active">
                                    <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><% alert.msg %></alert>
                                    <form class="form-horizontal" role="form" name="beritaForm" ng-submit="submit()" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Judul Upload </label>
                                            <div class="col-sm-9">
                                                <input type='text' class='col-sm-10 form-control' name='judul_upload' ng-model='data.judul_file'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama File</label>
                                            <div class="col-sm-10">
                                                <p class="form-control-static"><% data.nama_file %></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> File </label>
                                            <div class="col-sm-9">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="input-group">
                                                        <div class="form-control uneditable-input">
                                                            <i class="fa fa-file fileupload-exists"></i>
                                                            <span class="fileupload-preview"></span>
                                                        </div>
                                                        <div class="input-group-btn">
                                                            <div class="btn btn-light-grey btn-file">
                                                                <span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Select file</span>
                                                                <span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Change</span>
                                                                <input type="file" class="file-input" name='file' ng-file-select="" ng-model="data.file">
                                                            </div>
                                                            <a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload">
                                                                <i class="fa fa-times"></i> Remove
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <span class="help-block"><i class="fa fa-info-circle"></i> Biarkan Kosong bila tidak ingin mengganti file.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"></label>
                                            <div class="col-sm-9">
                                                <button class="btn btn-success" type="submit">
                                                    Simpan <i class="fa fa-send"></i>
                                                </button>
                                                <a href='{{route('admin.upload.index')}}' class="btn btn-warning">Kembali <i class="fa fa-arrow-left"></i></a>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
        <!-- /st-content-inner -->
    </div>  <!-- /st-content -->
</div>
@stop