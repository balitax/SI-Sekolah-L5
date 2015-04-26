<div class="navbar navbar-size-large navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#sidebar-menu" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand navbar-brand-primary navbar-brand-logo navbar-nav-padding-left">
                        <a href="{{url('admin')}}">
                           <h2 style="color:#fff";>ADMINEX</h2> 
                        </a>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="nav navbar-nav navbar-nav-bordered navbar-right" style="margin-right:25px;">
                        <!-- User -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                <img src="{{asset('assets/admin/images/people/110/guy-9.jpg')}}" alt="Bill" class="img-circle" width="40" />
                                 {{$user->nama_pegawai}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('admin.pegawai.edit',$user->id_kepegawaian)}}">Profil Pengguna</a></li>
                                <li><a href="{{url('')}}" target="_blank">Kunjungi Website</a></li>
                                <li><a href="{{url('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
        <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
        <div class="sidebar left sidebar-size-3 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu" data-type="collapse">
            <div data-scrollable>
                <br />
                <ul class="sidebar-menu">
                    <li class='{{setActive('')}}'>
                        <a href="{{url('/admin')}}">
                            <i class="fa fa-home"></i><span> Dashboard</span>
                        </a>
                    </li>

                    <li class="hasSubmenu">
                        <a href="#datastatis-menu"><i class="fa fa-bar-chart-o"></i><span>Data Statis</span></a>
                        <ul id="datastatis-menu">
                            <li class='{{setActive('admin.datastatis')}}'>
                                <a href="{{url('/admin/datastatis')}}">
                                    <span> Data Halaman Statis</span>
                                </a>
                            </li>
                            <li class='{{setActive('admin.datamenu')}}'>
                                <a href="{{url('/admin/datamenu')}}">
                                    <span> Data Menu </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="hasSubmenu">
                        <a href="#datadinamis-menu"><i class="fa fa-bar-chart-o"></i><span>Data Dinamis</span></a>
                        <ul id="datadinamis-menu">
                            <li class="{{setActive('admin.berita')}}">
                                <a href="{{route('admin.berita.index')}}">
                                    Index Berita
                                </a>
                            </li>
                            <li class="{{setActive('admin.pengumuman')}}">
                                <a href="{{route('admin.pengumuman.index')}}">
                                    Pengumuman
                                </a>
                            </li>
                            <li class="{{setActive('admin.agenda')}}">
                                <a href="{{route('admin.agenda.index')}}">
                                    Agenda Sekolah
                                </a>
                            </li>
                        </ul>
                    </li>

                     <li class="hasSubmenu">
                        <a href="#datasekolah-menu"><i class="fa fa-graduation-cap "></i><span>Data Sekolah</span></a>
                        <ul id="datasekolah-menu">
                            <li class="{{setActive('admin.kelas')}}{{setActive('admin.siswa')}}">
                                <a href="{{route('admin.kelas.index')}}">
                                    Data Kelas & Siswa
                                </a>
                            </li>
                            <li class="{{setActive('admin.pegawai')}}">
                                <a href="{{route('admin.pegawai.index')}}">
                                    Data Kepegawaian
                                </a>
                            </li>
                            <li class="{{setActive('admin.alumni')}}">
                                <a href="#">
                                    Data Alumni
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{setActive('admin.polling')}}">
                        <a href="{{route('admin.polling.index')}}">
                            <i class="fa fa-bar-chart-o"></i><span> Polling</span>
                        </a>
                    </li>

                    <li class="{{setActive('admin.galeri')}}">
                        <a href="{{route('admin.galeri.index')}}">
                            <i class="fa fa-file-photo-o"></i><span> Galleri Foto</span>
                        </a>
                    </li>

                    <li lass="{{setActive('admin.absensi')}}">
                        <a href="{{route('admin.absensi.index')}}">
                            <i class="fa fa-bar-chart-o"></i><span> Absensi Siswa</span>
                        </a>
                    </li>

                     <li class="{{setActive('admin.upload')}}">
                        <a href="{{route('admin.upload.index')}}">
                            <i class="fa fa-file-archive-o "></i><span> Upload Bekas</span>
                        </a>
                     </li>
                    <li class="{{setActive('admin.upload')}}">
                        <a href="{{route('admin.setting.index')}}">
                            <i class="fa fa-gear"></i><span> Setting</span>
                        </a>
                    </li>
                    <li class="{{setActive('admin.logout')}}">
                        <a href="{{url('logout')}}">
                            <i class="fa fa-sign-out"></i><span> Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- sidebar effects OUTSIDE of st-pusher: -->
        