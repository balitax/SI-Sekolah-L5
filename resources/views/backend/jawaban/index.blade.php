@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-jawaban.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="jawaban">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            {!! Breadcrumbs::render('jawaban',$poll_id); !!}
                            <div class="page-header">
                                <h1>
                                    {{$title}} <br />
                                </h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-success add-row" href="{{route('admin.polling.{id}.jawaban.create', $poll_id)}}">
                                Add New <i class="fa fa-plus"></i>
                            </a>
                            <div class="pull-right col-sm-5">
                                <input class="form-control col-md-12" style="background:#fff;" ng-model="query"  placeholder="Cari Jawaban">
                            </div>
                            <br />
                            <br />
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                                    <table id="sample-table-1" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Soal</th>
                                                <th>Jawaban</th>
                                                <th>Counter</th>
                                                <th class="hidden-xs center">Aksi Data</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="status in data| filter:paginate">
                                                <td><% status['polling']['soal_poll'] %></td>
                                                <td><% status['jawaban'] %></td>
                                                <td><% status['counter'] %></td>
                                                <td class="center">
                                                    <div>
                                                        <div class="btn-group">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                                <i class="fa fa-cog"></i> <span class="caret"></span>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li role="presentation">
                                                                    <a href="{{url('admin/polling/'.$poll_id)}}/jawaban/<% status['id_jawaban_poll']%>/edit" tabindex="-1" role="menuitem">
                                                                        <i class="fa fa-edit"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id_jawaban_poll'])">
                                                                        <i class="fa fa-times"></i> Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <pagination total-items="totalItems" ng-model="currentPage"
                                                max-size="10" boundary-links="true"
                                                items-per-page="numPerPage" class="pagination-sm">
                                    </pagination>
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