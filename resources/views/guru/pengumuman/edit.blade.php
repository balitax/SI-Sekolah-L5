@extends('guru/templates/index')
@section('js')
    <script src='{{asset('assets/js/controller/guru-pengumuman.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="pengumumanedit">
        <div class="st-content">
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- start: PAGE TITLE & BREADCRUMB -->
                                {!! Breadcrumbs::render('gurupengumumanedit'); !!}
                                <div class="page-header">
                                    <h1>{{$title}}</h1>
                                </div>
                                <!-- end: PAGE TITLE & BREADCRUMB -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tabbable">
                                    <div class="tab-content">
                                        <div id="panel_tab2_example1" class="tab-pane active">
                                            <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><% alert.msg %></alert>
                                            <form class="form-horizontal" role="form" name="beritaForm" ng-submit="submit({{$data->id_pengumuman}})" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Judul Pengumuman </label>
                                                    <div class="col-sm-9">
                                                        <input type='text' class='col-sm-10 form-control' name='judul_pengumuman' ng-model="data.judul_pengumuman"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Isi </label>
                                                    <div class="col-sm-9">
                                                    <textarea class="ckeditor form-control" cols="10" rows="10" name="editor1" ng-model='data.isi'>
                                                        {{$data->isi}}
                                                    </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"></label>
                                                    <div class="col-sm-9">
                                                        <button class="btn btn-success" type="submit">
                                                            Simpan <i class="fa fa-send"></i>
                                                        </button>
                                                        <a href='{{route('guru.pengumuman.index')}}' class="btn btn-warning">Kembali <i class="fa fa-arrow-left"></i></a>
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
        </div>
    </div>
@stop