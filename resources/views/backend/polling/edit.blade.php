@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-polling.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="pollingedit" data-scrollable>
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            {!! Breadcrumbs::render('pollingedit'); !!}
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
                                        <form class="form-horizontal" role="form" name="agendaForm" ng-submit="submit(data.id_soal_poll)" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"> Soal Polling </label>
                                                <div class="col-sm-9">
                                                    <input type='text' class='col-sm-10 form-control' name='soal_poll' ng-model='data.soal_poll'/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"> Status </label>
                                                <div class="col-sm-3">
                                                    <select name="data.id" class="form-control" ng-model="data.status" required>
                                                        <option value="">Pilih Status</option>
                                                        <option ng-repeat="unit in status" ng-selected="unit.id == data.status" value="<% unit.id %>"><% unit.label %></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"></label>
                                                <div class="col-sm-9">
                                                    <button class="btn btn-success" type="submit">
                                                        Simpan <i class="fa fa-send"></i>
                                                    </button>
                                                    <a href='{{route('admin.polling.index')}}' class="btn btn-warning">Kembali <i class="fa fa-arrow-left"></i></a>
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
@endsection