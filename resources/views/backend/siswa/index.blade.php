@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-siswa.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="siswa" data-scrollable>
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            {!! Breadcrumbs::render('siswa',$kelas_id); !!}
                            <div class="page-header">
                                <h1>
                                    Data Siswa Kelas {{$kelas_nama->nama_kelas}}<br />
                                </h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-success add-row" href="{{route('admin.kelas.{id}.siswa.create', $kelas_id)}}">
                                Tambah Siswa <i class="fa fa-plus"></i>
                            </a>
                            <div class="pull-right col-sm-5">
                                <input class="form-control col-md-12" style="background:#fff;" ng-model="query"  placeholder="Cari Siswa">
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
                                                <th>NIS</th>
                                                <th>Nama Kelas</th>
                                                <th>Kelas</th>
                                                <th>Tahun Ajaran</th>
                                                <th class="hidden-xs center">Aksi Data</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="status in data| filter:paginate">
                                                <td><% status['nis'] %></td>
                                                <td><% status['nama_siswa'] %></td>
                                                <td><% status['kelas']['nama_kelas'] %></td>
                                                <td><% status['kelas']['tahun_ajaran'] %></td>
                                                <td class="center">
                                                    <div>
                                                        <div class="btn-group">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                                <i class="fa fa-cog"></i> <span class="caret"></span>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li role="presentation">
                                                                    <a href="{{url('admin/kelas/'.$kelas_id.'/')}}/siswa/<% status['id_siswa']%>/edit" tabindex="-1" role="menuitem">
                                                                        <i class="fa fa-edit"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id_siswa'])">
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
        </div>
    </div>
@endsection