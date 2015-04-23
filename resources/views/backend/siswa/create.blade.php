@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-siswa.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="siswacreate" data-scrollable>
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            {!! Breadcrumbs::render('siswacreate',$id); !!}
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
                                         <form class="form-horizontal" role="form" name="agendaForm" ng-submit="submit()" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"> Kelas </label>
                                                <div class="col-sm-9">
                                                    <select name="id_kelas" class="form-control" ng-model="data.id_kelas">
                                                        <option value="">Pilih Kelas</option>
                                                        <option ng-repeat="unit in kelas" ng-selected="unit.id == {{$id}}" value="<%unit.id%>"><% unit.label %></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"> Nomor Induk Siswa </label>
                                                <div class="col-sm-9">
                                                    <input type='number' class='col-sm-10 form-control' name='nis' ng-model='data.nis'/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"> Nama Siswa </label>
                                                <div class="col-sm-9">
                                                    <input type='text' class='col-sm-10 form-control' name='nama_siswa' ng-model='data.nama_siswa'/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"></label>
                                                <div class="col-sm-9">
                                                    <button class="btn btn-success" type="submit">
                                                        Simpan <i class="fa fa-send"></i>
                                                    </button>
                                                    <a href='{{route('admin.kelas.{id}.siswa.index',$id)}}' class="btn btn-warning">Kembali <i class="fa fa-arrow-left"></i></a>
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