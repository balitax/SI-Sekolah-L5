@extends('web/templates/index')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="main-slideshow" >
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($slider_home as $news)
                            <li>
                                <a href="{{url('baca/berita',$news->slug_berita)}}" title="{{$news->judul_berita}}">
                                    <img src="{{asset('upload/berita/'.$news->gambar)}}" />
                                </a>
                            </li>
                            @endforeach
                        </ul> <!-- /.slides -->
                    </div> <!-- /.flexslider -->
                </div> <!-- /.main-slideshow -->
            </div> <!-- /.col-md-8 -->

            <div class="col-md-4">
                <div class="widget-main" style="height:450px;border: 1px solid #e2e9e6;">
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
                                    <img src="{{asset('upload/berita/'.$news->gambar)}}" style="border: 1px solid #e2e9e6;" />
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
                </div> <!-- /.widget-main -->
            </div> <!-- /.col-md-4 -->

        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="row">

                    <div class="col-md-6">
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
                        </div> <!-- /.widget-main -->
                    </div> <!-- /col-md-6 -->

                    <div class="col-md-6">
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
                        </div> <!-- /.widget-main -->
                    </div> <!-- /col-md-6 -->

                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-main" style="border: 1px solid #e2e9e6;">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Polling</h4>
                    </div>
                    <div class="widget-inner">
                        <p>{{$polling->soal_poll}} <br /></p>
                        @if(Request::cookie('polling') != 'sudah')
                            <form action="{{url('tambahpoll')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                <input type="hidden" name="id_soal_poll" value="{{ $polling->id_soal_poll}}">
                                @foreach($polling->jawaban as $jawaban)

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jawaban" id="optionsRadios1" value="{{$jawaban->jawaban}}" required>
                                            {{$jawaban->jawaban}}
                                        </label>
                                    </div>
                                @endforeach
                                <div class="form-group center">
                                    <button class="btn btn-default btn-squared" type="submit"> Pilih </button>
                                    <a class="btn btn-warning btn-squared" type="button" href="{{url('lihatpoll')}}"> Lihat Polling </a>
                                </div>
                            </form>
                        @else
                            <p>
                                <a class="btn btn-warning btn-squared" type="button" href="{{url('lihatpoll')}}"> Lihat Polling </a>
                            </p>
                        @endif
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->

            </div>

        </div>
    </div>

@endsection