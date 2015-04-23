@extends('backend/templates/index')
@section('js')
    <script src='{{asset('assets/js/controller/admin-menu.js')}}'></script>
@stop
@section('content')

    <div class="st-pusher" id="content" ng-controller="datamenucreate">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                        <div class="row">
                            <div class="col-sm-12">
                                {!! Breadcrumbs::render('datamenucreate') !!}
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
                                            <form class="form-horizontal" role="form" name="dataStatisForm" ng-submit="submit()">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Nama Menu </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="title" class="form-control" ng-model="data.title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Url Menu </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="slug_menu" class="form-control" ng-model="data.slug_menu">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Tipe Menu </label>
                                                    <div class="col-sm-9">
                                                        <select data-toggle="select2" name="tipe_menu" class="form-control" ng-model="data.tipe_menu" rquired="">
                                                            <option>-- Pilih Tipe Menu --</option>
                                                            <option ng-repeat="unit in tipemenu" value="<% unit.id %>"><% unit.label %></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Level Menu </label>
                                                    <div class="col-sm-4">
                                                        <select data-toggle="select2" name="id_parent" class="form-control" ng-model="data.id_parent" rquired="">
                                                            <option>-- Pilih Level Menu --</option>
                                                            <option value="0">Menu Utama</option>
                                                            <option ng-repeat="unit in menu" value="<% unit.id %>">Dropdown dari : <% unit.title %></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"></label>
                                                    <div class="col-sm-9">
                                                        <button class="btn btn-success" type="submit">
                                                            Simpan <i class="fa fa-send"></i>
                                                        </button>
                                                        <a href='{{route('admin.datastatis.index')}}' class="btn btn-warning">Kembali <i class="fa fa-arrow-left"></i></a>
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