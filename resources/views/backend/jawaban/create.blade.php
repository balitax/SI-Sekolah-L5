@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-jawaban.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="jawabancreate">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            {!! Breadcrumbs::render('jawabancreate',$poll_id); !!}
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
                                                <label class="col-sm-2 control-label" for="form-field-1"> Pertanyaan </label>
                                                <div class="col-sm-9">
                                                    <select name="id_soal_poll" class="form-control" ng-model="data.id_soal_poll">
                                                        <option value="">Pilih Polling</option>
                                                        <option ng-repeat="unit in polling" ng-selected="unit.id == {{$poll_id}}" value="<%unit.id%>"><% unit.label %></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"> Jawaban </label>
                                                <div class="col-sm-9">
                                                    <input type='text' class='col-sm-10 form-control' name='jawaban' ng-model='data.jawaban'/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"></label>
                                                <div class="col-sm-9">
                                                    <div class="col-sm-9">
                                                        <button class="btn btn-success" type="submit">
                                                            Simpan <i class="fa fa-send"></i>
                                                        </button>
                                                        <a href='{{route('admin.polling.{id}.jawaban.index', $poll_id)}}' class="btn btn-warning">Kembali <i class="fa fa-arrow-left"></i></a>
                                                    </div>
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