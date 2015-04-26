@extends('web.templates.index')
@section('content')

    <div class="container">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="{{url('')}}">Home</a></h6>
                    <h6><a href="{{url('pengumuman')}}">Pengumuman</a></h6>
                    <h6><span class="page-active">{{$pengumumanlist->judul_pengumuman}}</span></h6>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ce92a639-1e24-4484-88fc-66e4e66ca575", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <style type="text/css">
        .stButton .stFb, .stButton .stTwbutton, .stButton .stMainServices
        {
            height: 50px;
        }
    </style>

    <div class="container">
        <div class="row">

            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-post-container" style="border: 1px solid #e2e9e6;">
                            <div class="blog-post-image">
                                <div class="blog-post-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>{{date('d F Y',strtotime($pengumumanlist->tanggal))}}</li>
                                        <li><a href="#"><i class="fa fa-user"></i> Oleh {{$pengumumanlist->penulis}}</a></li>
                                    </ul>
                                </div> <!-- /.blog-post-meta -->
                            </div> <!-- /.blog-post-image -->
                            <div class="blog-post-inner">
                                <h3 class="blog-post-title">{{$pengumumanlist->judul_pengumuman}}</h3>
                                <div>
                                    <span class='st_facebook_hcount' displayText='Facebook'></span>
                                    <span class='st_twitter_hcount' displayText='Tweet'></span>
                                    <span class='st_email_hcount' displayText='Email'></span>
                                </div>
                                <p style="text-align: justify"> {!!$pengumumanlist->isi!!}</p>
                                <br />
                                <h3>Bagikan Tulisan Ini :</h3>
                                <span class='st_facebook_vcount' displayText='Facebook'></span>
                                <span class='st_twitter_vcount' displayText='Tweet'></span>
                                <span class='st_email_vcount' displayText='Email'></span>
                                <br />
                                <br />
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