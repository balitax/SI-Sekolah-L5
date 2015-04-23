@extends('backend/templates/index')
@section('js')
<script src="{{asset('assets/js/controller/admin-upload.js')}}"></script>
@stop
@section('content')

<div class="st-pusher" id="content" ng-controller="upload" data-scrollable>
            <div class="st-content">
                <!-- extra div for emulating position:fixed of the menu -->
                <div class="st-content-inner padding-none">
                    <div class="container-fluid">
                        <div class="page-section third">
                            <!-- start: PAGE HEADER -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- start: PAGE TITLE & BREADCRUMB -->
                                {!! Breadcrumbs::render('upload'); !!}
                                <div class="page-header">
                                    <h1>
                                        {{$title}} <br />
                                    </h1>
                                </div>
                                <!-- end: PAGE TITLE & BREADCRUMB -->
                            </div>
                        </div>
                        <!-- end: PAGE HEADER -->
                        <!-- start: PAGE CONTENT -->
                        <div class="row">
                            <div class="col-md-12">

                                <a class="btn btn-success add-row" href="{{route('admin.upload.create')}}">
                                    Tambah Data Baru <i class="fa fa-plus"></i>
                                </a>
                                <span class="btn btn-default add-row">
                                    Jumlah :  <% totalItems %> Data File <i class="fa fa-user"></i>
                                </span>
                                <div class="pull-right col-sm-5">
                                    <input class="form-control col-md-12" style="background:#fff;" ng-model="query"  placeholder="Cari File">
                                </div>
                                <br />
                                <br />
                                <!-- start: BASIC TABLE PANEL -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">
                                        <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                                        <table id="sample-table-1" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Judul File</th>
                                                    <th>Tanggal</th>
                                                    <th>Di Download</th>
                                                    <th>Penulis</th>
                                                    <th class="center">Download Link</th>
                                                    <th class="hidden-xs center">Aksi Data</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="status in data| filter:paginate">
                                                    <td><% status['judul_file'] %></td>
                                                    <td><% status['tgl_posting'] %></td>
                                                    <td><% status['didownload'] %> Kali</td>
                                                    <td><% status['author'] %></td>
                                                    <td class='center'><a href="{{url('admin/upload/didownload')}}/<% status['id_download'] %>">[Download]</a></td>
                                                    <td class="center">
                                                        <div>
                                                            <div class="btn-group">
                                                                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                                    <i class="fa fa-cog"></i> <span class="caret"></span>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                    <li role="presentation">
                                                                        <a href="{{url('admin/upload')}}/<% status['id_download']%>/edit" tabindex="-1" role="menuitem">
                                                                            <i class="fa fa-edit"></i> Edit
                                                                        </a>
                                                                    </li>
                                                                    <li role="presentation">
                                                                        <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id_download'])">
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
                <!-- /st-content-inner -->
            </div>
            <!-- /st-content -->
</div>

@stop