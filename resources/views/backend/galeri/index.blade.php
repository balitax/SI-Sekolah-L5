@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-galeri.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="galeri">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            {!! Breadcrumbs::render('galeri'); !!}
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
                            <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                            <div class="col-sm-12">
                                <fieldset>
                                    <form class="form-horizontal" role="form" name="agendaForm" ng-submit="submit()" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="form-field-1"> Tambah Album </label>
                                            <div class="col-sm-5">
                                                <input type='text' style="background: #ffffff" placeholder="Masukan Nama Album Baru" class='col-sm-10 form-control' name='nama_album' ng-model='post.nama_album'/>
                                            </div>
                                            <div class="col-sm-5">
                                                <button class="btn btn-success" type="submit">
                                                    Simpan <i class="fa fa-send"></i>
                                                </button>
                                                <button type="reset" class="btn btn-danger">Reset <i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: BASIC TABLE PANEL -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-sm-12">
                                        <input class="form-control pull-right" style="background: #ffffff"  ng-model="query"  placeholder="Cari Album">
                                    </div>
                                    <table id="sample-table-1" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Album Galeri</th>
                                                <th class="hidden-xs center">Aksi Data</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="status in data| filter:paginate">
                                                <td><% status['nama_album'] %></td>
                                                <td class="center">
                                                    <div>
                                                        <div class="btn-group">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                                <i class="fa fa-cog"></i> <span class="caret"></span>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li role="presentation">
                                                                    <a href="{{url('admin/galeri')}}/<% status['id_album']%>/foto" tabindex="-1" role="menuitem">
                                                                        <i class="fa fa-image"></i> Lihat Foto
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="{{url('admin/galeri')}}/<% status['id_album']%>/edit" tabindex="-1" role="menuitem">
                                                                        <i class="fa fa-edit"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id_album'])">
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