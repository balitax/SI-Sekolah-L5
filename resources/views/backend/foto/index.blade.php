@extends('backend/templates/index')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/colorbox/example2/colorbox.css')}}">
@stop
@section('js')
<script src='{{asset('assets/js/controller/admin-foto.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="foto">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            {!! Breadcrumbs::render('foto',$album_id); !!}
                            <div class="page-header">
                                <h1>
                                    Album Foto <%title%><br />
                                </h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                            <div class="col-sm-2">
                                <a class="btn btn-success add-row" href="{{route('admin.galeri.{id}.foto.create', $album_id)}}">
                                    Tambah Foto <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                            <table id="sample-table-1" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>File Kecil</th>
                                    <th>File Besar</th>
                                    <th>File</th>
                                    <th class="hidden-xs center">Aksi Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="status in data| filter:paginate">
                                    <td>
                                        <%status['foto_kecil']%>
                                    </td>
                                    <td>
                                        <%status['foto_besar']%>
                                    </td>
                                    <td>
                                        <a title="<%status['foto_besar']%>" href="{{asset('upload/besar')}}/<%status['foto_besar']%>" class="group1 btn btn-success">
                                            <i class="fa fa-image"></i> Lihat Foto
                                        </a>
                                    </td>
                                    <td class="center">
                                        <div>
                                            <div class="btn-group">
                                                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                    <i class="fa fa-cog"></i> <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <li role="presentation">
                                                        <a href="{{url('admin/galeri/'.$album_id)}}/foto/<% status['id_foto']%>/edit">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#" ng-click="delete(status['id_foto'])">
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
        <!-- end: BASIC TABLE PANEL -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop