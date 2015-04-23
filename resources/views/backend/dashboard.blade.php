@extends('backend/templates/index')
@section('content')
        <div class="st-pusher" id="content">
            <div class="st-content">
                <!-- extra div for emulating position:fixed of the menu -->
                <div class="st-content-inner padding-none">
                    <div class="container-fluid">
                        <div class="page-section">

                        </div>
                        <div class="panel panel-default">
                            <div class="media v-middle">
                                <div class="media-left">
                                    <div class="bg-green-400 text-white">
                                        <div class="panel-body">
                                            <i class="fa fa-credit-card fa-fw fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    Selamat Datang <b>{{Auth::user()->nama_pegawai}}</b>
                                </div>

                            </div>
                        </div>
                        <div class="row" data-toggle="isotope">

                            <div class="item col-xs-12 col-lg-12">
                                <div class="panel panel-default paper-shadow" data-z="0.5">
                                    <div class="panel-heading">
                                        <h4 class="text-headline"> MENU PINTAS
                                        </h4>
                                    </div>
                                    <div class="panel-body">
                                        <a href="{{url('admin/berita')}}" class="btn btn-success text-grey-400 btn-lg btn-circle" data-toggle="tooltip" data-title="Data Berita Sekolah">
                                            <i class="fa fa-behance-square"></i>
                                        </a>
                                        <a href="{{url('admin/pengumuman')}}" class="btn btn-warning text-grey-400 btn-lg btn-circle" data-toggle="tooltip" data-title="Data Pengumuman Sekolah">
                                            <i class="fa fa-bell"></i>
                                        </a>
                                        <a href="{{url('admin/agenda')}}" class="btn btn-inverse text-grey-400 btn-lg btn-circle" data-toggle="tooltip" data-title="Data Agenda Sekolah">
                                            <i class="fa fa-briefcase"></i>
                                        </a>
                                        <a href="{{url('admin/kelas')}}" class="btn btn-danger text-grey-400 btn-lg btn-circle" data-toggle="tooltip" data-title="Data Kelas dan Siswa">
                                            <i class="fa fa-group"></i>
                                        </a>
                                        <a href="{{url('admin/pegawai')}}" class="btn btn-warning text-grey-400 btn-lg btn-circle" data-toggle="tooltip" data-title="Data Pegawai">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <a href="{{url('admin/galeri')}}" class="btn btn-success text-grey-400 btn-lg btn-circle" data-toggle="tooltip" data-title="Galeri Foto">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        <a href="{{url('admin/absensi')}}" class="btn btn-success text-grey-400 btn-lg btn-circle" data-toggle="tooltip" data-title="Absensi Siswa">
                                            <i class="fa fa-graduation-cap "></i>
                                        </a>
                                        <a href="{{url('admin/upload')}}" class="btn btn-danger text-grey-400 btn-lg btn-circle" data-toggle="tooltip" data-title="Upload File Berkas">
                                            <i class="fa fa-file-archive-o "></i>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <br/>
                    </div>
                </div>
                <!-- /st-content-inner -->
            </div>
            <!-- /st-content -->
        </div>
        <!-- /st-pusher -->
@stop