@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-datastatis.js')}}'></script>
@stop
@section('content')

    <div class="st-pusher" id="content" ng-controller="datastatisedit">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            {!! Breadcrumbs::render('datastatisedit') !!}
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
                                         <form class="form-horizontal" role="form" name="dataStatisForm" ng-submit="submit({{$data->id}})">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"> Title </label>
                                                <div class="col-sm-9">
                                                       <input type="text" name="title" ng-model="data.title" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="form-field-1"> Content </label>
                                                <div class="col-sm-9">
                                                    <textarea class="ckeditor form-control" cols="10" rows="10" name="editor1">
                                                        {{$data->content}}
                                                    </textarea>
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