@extends('web/templates/index')
@section('content')

    <div class="container">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="{{url('')}}">Home</a></h6>
                    <h6><span class="page-active">Lihat Polling</span></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="blog-grid-item" style="border: 1px solid #e2e9e6;">
                                <div class="box-content-inner">
                                    <h3>Hasil Polling Sementara</h3>
                                    <p>
                                        {{$polling->soal_poll}}
                                    </p>
                                    <br />
                                    <div class="progress-bars">
                                        @foreach($polling->jawaban as $jawaban)

                                            <div class="progress-label">
                                                <span>{{$jawaban->jawaban}}</span>
                                            </div>
                                            <div class="progress">
                                                <div aria-valuetransitiongoal="{{number_format($jawaban->counter/$total_data,2)}}" class="progress-bar main-color animate-bar six-sec-ease-in-out" style="width: {{number_format($jawaban->counter/$total_data,2)}}%;" aria-valuenow="{{$jawaban->counter/$total_data}}"><span class="progressbar-front-text" style="width: 653px;">{{number_format($jawaban->counter/$total_data,2)}}%</span></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div> <!-- /.box-content-inner -->
                            </div> <!-- /.blog-grid-item -->
                        </div>

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