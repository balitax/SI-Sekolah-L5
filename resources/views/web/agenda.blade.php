@extends('web.templates.index')
@section('content')

    <div class="container">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="{{url('')}}">Home</a></h6>
                    <h6><span class="page-active">Agenda</span></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">

                    @foreach($agendalist as $umum)
                        <div class="col-md-6 col-sm-6">
                            <div class="blog-grid-item" style="border: 1px solid #e2e9e6;">
                                <div class="box-content-inner" style='height:180px'>
                                    <h4 class="blog-grid-title">
                                        <a href="{{url('baca/agenda',$umum->slug_agenda)}}">
                                            {{$umum->tema_agenda}}
                                        </a>
                                    </h4>
                                    <p style="text-align: justify;"> {!!substr($umum->isi,0,150)!!}...</p>
                                    <br />
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div> <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        {!!$agendalist->render()!!}
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

            </div> <!-- /.col-md-8 -->
            <!-- Here begin Sidebar -->
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

                    </div>
                </div>

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

            </div>

        </div> <!-- /.row -->
    </div> <!-- /.container -->

@stop