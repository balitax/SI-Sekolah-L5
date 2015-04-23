@extends('backend/templates/index')
@section('js')
<script src="{{asset('assets/js/controller/admin-berita.js')}}"></script>
@stop
@section('content')

<div class="st-pusher" id="content" ng-controller="databerita" data-scrollable>
    <div class="st-content">
        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner padding-none">
            <div class="container-fluid">
                <div class="page-section third">

                <div class="row">
                    <div class="col-sm-12">
                        {!! Breadcrumbs::render('indexberita'); !!}
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
                        <!-- start: BASIC TABLE PANEL -->
                        <a class="btn btn-success add-row" href="{{route('admin.berita.create')}}">
                            Tambah Data Baru <i class="fa fa-plus"></i>
                        </a>
                        <span class="btn btn-default add-row">
                            Jumlah :  <% totalItems %> Data Berita <i class="fa fa-list"></i>
                        </span>
                        <div class="pull-right col-sm-5">
                            <input class="form-control col-md-12" style="background:#fff;" ng-model="query"  placeholder="Cari Berita">
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
                                            <th>Judul Berita</th>
                                            <th>Link Berita</th>
                                            <th>Dibaca</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th class="hidden-xs center">Aksi Data</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="status in data| filter:paginate">
                                            <td><% status['judul_berita'] %></td>
                                            <td><a href="{{url('baca/berita')}}/<% status['slug_berita'] %>/" class="btn btn-success" target="_blank">Klik</a></td>
                                            {{--<td><% status['slug_berita'] %></td>--}}
                                            <td><% status['counter'] %> Kali</td>
                                            <td><% status['tanggal'] %></td>
                                            <td><% status['waktu'] %></td>
                                            <td class="center">
                                                <div>
                                                    <div class="btn-group">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                            <li role="presentation">
                                                                <a href="{{url('admin/berita')}}/<% status['id_berita']%>/edit" tabindex="-1" role="menuitem">
                                                                    <i class="fa fa-edit"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li role="presentation">
                                                                <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id_berita'])">
                                                                    <i class="fa fa-times"></i> Remove 
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