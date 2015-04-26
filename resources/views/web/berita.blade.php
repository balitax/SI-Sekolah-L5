@extends('web/templates/index')
@section('content')

    <div class="container">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="{{url('')}}">Home</a></h6>
                    <h6><span class="page-active">Berita</span></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">

                    @foreach($beritalist as $new)
                    <div class="col-md-6 col-sm-6">
                        <div class="blog-grid-item" style="border: 1px solid #e2e9e6;">
                            <div class="blog-grid-thumb">
                                <a href="{{url('baca/berita',$new->slug_berita)}}">
                                    <img src="{{asset('upload/berita/'.$new->gambar)}}" />
                                </a>
                            </div>
                            <div class="box-content-inner" style='height:110px'>
                                <h4 class="blog-grid-title">
                                    <a href="{{url('baca/berita',$new->slug_berita)}}">
                                        {{$new->judul_berita}}
                                    </a>
                                </h4>
                                <p class="blog-grid-meta small-text"><span><a href="#">{{date('d F Y',strtotime($new->tanggal))}}</a></span></p>
                            </div> <!-- /.box-content-inner -->
                        </div> <!-- /.blog-grid-item -->
                    </div>
                    @endforeach

                </div> <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        {!!$beritalist->render()!!}
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

            </div> <!-- /.col-md-8 -->
            <!-- Here begin Sidebar -->
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

        </div> <!-- /.row -->
    </div> <!-- /.container -->

@stop