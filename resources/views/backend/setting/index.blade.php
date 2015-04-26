@extends('backend/templates/index')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css')}}">
@stop
@section('js')
    <script src='{{asset('assets/js/controller/admin-setting.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="setting" data-scrollable>
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- start: PAGE TITLE & BREADCRUMB -->
                                {!! Breadcrumbs::render('setting'); !!}
                                <div class="page-header">
                                    <h1>{{$title}}</h1>
                                </div>
                                <!-- end: PAGE TITLE & BREADCRUMB -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tabbable">
                                    <div class="tab-content">
                                        <div id="panel_tab2_example1" class="tab-pane active">
                                            @if(Session::has('alert'))
                                                <div class="alert fade in alert-success">
                                                    <i class="icon-remove close" data-dismiss="alert">&times;</i>
                                                    {{Session::get('alert')}}
                                                </div>
                                            @endif
                                            <form class="form-horizontal" role="form" method="POST" action="{{url('admin/setting/save')}}" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Judul Website </label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                                        <input type='text' class='col-sm-8 form-control' name='title_web' ng-model='data.title_web'/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Deksiprisi Website </label>
                                                    <div class="col-sm-9">
                                                        <textarea class='col-sm-8 form-control' name='desc_web' ng-model='data.desc_web'></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Keyword Website </label>
                                                    <div class="col-sm-9">
                                                        <textarea class='col-sm-8 form-control' name='key_web' ng-model='data.key_web'></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">
                                                        Logo Website
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 400px; height: 100px;"><img src="{{asset('upload/logo')}}/<%data.logo%>" alt=""/>
                                                            </div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 100px; line-height: 20px;"></div>
                                                            <div>
                                                            <span class="btn btn-success btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                                                                <input type="file" name="file" accept="image/*" ng-file-select="" ng-model="data.logo">
                                                            </span>
                                                                <a href="#" class="btn fileupload-exists btn-danger" data-dismiss="fileupload">
                                                                    <i class="fa fa-times"></i> Remove
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Facebook </label>
                                                    <div class="col-sm-9">
                                                        <input type='text' class='col-sm-10 form-control' name='facebook' ng-model='data.facebook'/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Twitter </label>
                                                    <div class="col-sm-9">
                                                        <input type='text' class='col-sm-10 form-control' name='twitter' ng-model='data.twitter'/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Googl Plus </label>
                                                    <div class="col-sm-9">
                                                        <input type='text' class='col-sm-10 form-control' name='gplus' ng-model='data.gplus'/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"></label>
                                                    <div class="col-sm-9">
                                                        <button class="btn btn-success" type="submit">
                                                            Simpan <i class="fa fa-send"></i>
                                                        </button>
                                                    </div>
                                                </div>
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