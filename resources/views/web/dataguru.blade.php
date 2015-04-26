@extends('web.templates.index')
@section('content')

    <div class="container">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="{{url('')}}">Home</a></h6>
                    <h6><a href="{{url('dataguru')}}">Data Guru</a></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-post-container" style="border: 1px solid #e2e9e6;">
                            <div class="blog-post-inner">
                                <h3 class="blog-post-title">Data Guru</h3>
                                @foreach($guru as $gr)
                                    <div class="panel-group accordion-custom accordion-teal" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$gr->nip}}">
                                                        <i class="icon-arrow"></i>
                                                        {{$gr->nama_pegawai}}
                                                    </a>
                                                </h4>
                                            </div>


                                            <div id="collapse{{$gr->nip}}" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>: </td>
                                                            <td>{{$gr->nama_pegawai}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td>: </td>
                                                            <td>{{$gr->jk}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIP</td>
                                                            <td>: </td>
                                                            <td>{{$gr->nip}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Guru Mata Pelajaran</td>
                                                            <td>: </td>
                                                            <td></strong>{{$gr->matpel}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kelahiran</td>
                                                            <td>:</td>
                                                            <td>{{$gr->kelahiran}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                {!!$guru->render()!!}
                            </div>
                        </div> <!-- /.blog-post-container -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

            </div> <!-- /.col-md-8 -->

            <div class="col-md-4">

                <div class="widget-main" style="height:430px;border: 1px solid #e2e9e6;">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Berita Terbaru
                            <span><a href="{{url('berita')}}" style="float: right;">Index</a></span>
                        </h4>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                        @foreach($berita as $news)
                            <div class="blog-list-post clearfix">
                                <div class="blog-list-thumb">
                                    <a href="{{url('baca/berita',$news->slug_berita)}}">
                                        <img src="{{asset('upload/berita/'.$news->gambar)}}" />
                                    </a>
                                </div>
                                <div class="blog-list-details">
                                    <h5 style="font-size:12px;" class="blog-list-title">
                                        <a style="font-size:12px;" href="{{url('baca/berita',$news->slug_berita)}}">{{$news->judul_berita}}</a></h5>
                                    <p class="blog-list-meta small-text">
                                        {!!substr($news->isi,0,80)!!}..
                                    </p>
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