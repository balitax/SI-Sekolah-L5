@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-absensi.js')}}'></script>
@stop
@section('content')

    <div class="st-pusher" id="content" ng-controller="absensicreate">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            {!! Breadcrumbs::render('absensishow'); !!}
                            <div class="page-header">
                                <h1>{{$title}} {{$fulltanggal}} Kelas {{$siswa->first()->kelas->nama_kelas}}</h1>
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
                                        <form action="{{route('admin.absensi.store')}}" method="post">
                                            <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
                                            <table id="sample-table-1" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NIS</th>
                                                        <th>Nama Siswa</th>
                                                        <th class="center">Keterangan (Absen)</th>
                                                        <th class="center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if($siswa)
                                                    <input type="hidden" name="kelas" value="{{$siswa->first()->id_kelas}}" />
                                                    @if(count($siswa->first()->absensi) > 0)
                                                        @foreach($siswa as $sis)
                                                                <tr>
                                                                    <td>{{$sis->nis}}</td>
                                                                    <td>{{$sis->nama_siswa}}</td>
                                                                    <td class="center">
                                                                        {{$sis->absensi->first()->absen}}
                                                                    </td>
                                                                    <td class="center">
                                                                        <a href="{{route('admin.absensi.edit',$sis->absensi->first()->id_absensi)}}" class="btn btn-success">Edit Data <i class="fa fa-edit"></i></a>
                                                                    </td>
                                                                </tr>
                                                        @endforeach
                                                    @else
                                                            <tr>
                                                                <td colspan="4" class="center">Tidak Ada Data</td>
                                                            </tr>
                                                    @endif
                                                @endif
                                                </tbody>
                                            </table>
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