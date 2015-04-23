@extends('guru/templates/index')
@section('js')
    <script src='{{asset('assets/js/controller/guru-pegawai.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="pegawaiedit" data-scrollable>
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- start: PAGE TITLE & BREADCRUMB -->
                                {!! Breadcrumbs::render('gurupegawaiedit'); !!}
                                <div class="page-header">
                                    <h1>{{$title}}</h1>
                                </div>
                                <!-- end: PAGE TITLE & BREADCRUMB -->
                            </div>
                        </div>
                        <!-- Tabbable Widget -->
                        <div class="tabbable paper-shadow relative" data-z="0.5">
                            <!-- Panes -->
                            <div class="tab-content">
                                <div id="account" class="tab-pane active">
                                    <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                                    <form class="form-horizontal" role="form" name="pegawaiForm" ng-submit="submit()" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> NIP </label>
                                            <div class="col-sm-9">
                                                <input type='text' class='col-sm-10 form-control' name='nip' ng-model='data.nip'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Nama Pegawai </label>
                                            <div class="col-sm-9">
                                                <input type='text' class='col-sm-10 form-control' name='nama_pegawai' ng-model='data.nama_pegawai'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Kelahiran </label>
                                            <div class="col-sm-9">
                                                <input type='text' class='col-sm-10 form-control' name='kelahiran' ng-model='data.kelahiran'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Mata Pelajaran </label>
                                            <div class="col-sm-9">
                                                <input type='text' class='col-sm-10 form-control' name='matpel' ng-model='data.matpel'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Jenis Kelamin </label>
                                            <div class="col-sm-9">
                                                <select name="data.id" class="form-control" ng-model="data.jk" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option ng-repeat="unit in jk" ng-selected="unit.id == {{$data->jk}}" value="<% unit.id %>"><% unit.label %></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Status </label>
                                            <div class="col-sm-9">
                                                <select name="data.id" class="form-control" ng-model="data.status" required disabled>
                                                    <option value="">Pilih Jabatan</option>
                                                    <option ng-repeat="unit in status" ng-selected="unit.id == {{$data->status}}" value="<% unit.id %>"><% unit.label %></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Username</label>
                                            <div class="col-sm-5">
                                                <input type='text' class='form-control' name='username' ng-model='data.username'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Password </label>
                                            <div class="col-sm-5">
                                                <input type='password' class='form-control' name='password' ng-model='data.password'/>
                                            </div>
                                            <span class="help-inline col-sm-3"> <i class="fa fa-info-circle"></i> Kosongkan saja jika tidak diganti </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"></label>
                                            <div class="col-sm-9">
                                                <button class="btn btn-success" type="submit">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- // END Panes -->
                        </div>
                        <!-- // END Tabbable Widget -->
                    </div>
                </div>
            </div>
            <!-- /st-content-inner -->
        </div>
        <!-- /st-content -->
    </div>
@stop