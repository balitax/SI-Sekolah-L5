@extends('web.templates.index')
@section('js')
    <script src='{{asset('assets/js/angular.min.js')}}'></script>
    <script src='{{asset('assets/js/ui-bootstrap-tpls-0.12.0.min.js')}}'></script>
    <script src='{{asset('assets/js/angular-block-ui.min.js')}}'></script>
    <script src='{{asset('assets/js/siswa.js')}}'></script>
@endsection
@section('content')

    <div class="container">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="{{url('')}}">Home</a></h6>
                    <h6><span class="page-active">Data Siswa</span></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container" ng-app="siswa">
        <div class="row">

            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-post-container" style="border: 1px solid #e2e9e6;" ng-controller="kelas">
                            <div class="blog-post-inner">
                                <div class="form-group">
                                    <form class="form-horizontal" role="form" name="agendaForm" ng-submit="submit()" enctype="multipart/form-data">
                                        <label class="col-sm-2 control-label" for="form-field-1"> Kelas </label>
                                        <div class="col-sm-5">
                                            <select name="id_kelas" class="form-control" ng-model="data.id_kelas">
                                                <option value="">Pilih Kelas</option>
                                                <option ng-repeat="unit in kelas" value="<%unit.id%>"><% unit.label %></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <button class="btn btn-success" type="submit">Submit <i class="fa fa-send"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <br />
                                <div class='row' ng-show='show'>
                                    <br/>
                                    <table id="sample-table-1" class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="s in siswa | filter:paginate">
                                            <td><%s['nis']%></td>
                                            <td><%s['nama_siswa']%></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <pagination total-items="totalItems" ng-model="currentPage"
                                            max-size="15" boundary-links="true"
                                            items-per-page="numPerPage" class="pagination-sm">
                                    </pagination>
                                </div>
                                <br />
                            </div>
                        </div>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

            </div> <!-- /.col-md-8 -->

            <div class="col-md-4">

                <div class="widget-main" style="height:400px;border: 1px solid #e2e9e6;">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Pengumuman
                            <span><a href="{{url('pengumuman')}}" style="float: right;">Index</a></span>
                        </h4>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                        @foreach($pengumuman as $umum)
                            <div class="blog-list-post clearfix">
                                <div class="blog-list-thumb" style="width:auto;height:auto;">
                                    <a href="{{url('baca/pengumuman',$umum->slug_pengumuman)}}" style="padding: 10px">
                                        {{$umum->judul_pengumuman}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- /.widget-inner -->
                </div>

                <div class="widget-main" style="height:400px;border: 1px solid #e2e9e6;">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Agenda
                            <span><a href="{{url('agenda')}}" style="float: right;">Index</a></span>
                        </h4>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                        @foreach($agenda as $ag)
                            <div class="blog-list-post clearfix">
                                <div class="blog-list-thumb" style="width:auto;height:auto;">
                                    <a href="{{url('baca/agenda',$ag->slug_agenda)}}" style="padding: 10px">
                                        {{$ag->tema_agenda}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- /.widget-inner -->
                </div>

            </div>

        </div>
    </div>

@stop