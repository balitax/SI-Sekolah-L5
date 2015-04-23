@extends('guru/templates/index')
@section('js')
    <script src='{{asset('assets/js/controller/guru-absensi.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="absensiedit">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- start: PAGE TITLE & BREADCRUMB -->
                                {!! Breadcrumbs::render('guruabsensiedit'); !!}
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
                                            <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><% alert.msg %></alert>
                                            <form class="form-horizontal" role="form" ng-submit="submit()" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Nama Siswa </label>
                                                    <div class="col-sm-5">
                                                        <input type='text' class='col-sm-10 form-control' name='nama_siswa' ng-model="data.nama_siswa" readonly/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Kelas </label>
                                                    <div class="col-sm-3">
                                                        <input type='text' class='col-sm-10 form-control' name='kelas' ng-model="data.kelas" readonly/>
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <label class="col-sm-2 control-label" for="form-field-1">Tanggal</label>
                                                    <div class="col-md-2">
                                                        <select name="tanggal" class="form-control" ng-model="data.tanggal">
                                                            <option ng-repeat="unit in date" ng-selected="unit.id == data.tanggal" value="<%unit.id%>"><% unit.label %></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="bulan" class="form-control" ng-model="data.bulan">
                                                            <option ng-repeat="unit in bulan" ng-selected="unit.id == data.bulan" value="<%unit.id%>"><% unit.label %></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="tahun" class="form-control" ng-model="data.tahun">
                                                            <option ng-repeat="unit in tahun" ng-selected="unit.id == data.tahun" value="<%unit.id%>"><% unit.label %></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"> Kelas </label>
                                                    <div class="col-sm-3">
                                                        <div>
                                                            <label>
                                                                <input type="radio" value="H" name="optionsRadios2" class="grey" ng-model="data.absen">
                                                                Hadir
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label>
                                                                <input type="radio" value="I" name="optionsRadios2" class="grey" ng-model="data.absen">
                                                                Ijin
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label>
                                                                <input type="radio" value="A" name="optionsRadios2" class="grey" ng-model="data.absen">
                                                                Alpha
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label>
                                                                <input type="radio" value="B" name="optionsRadios2" class="grey" ng-model="data.absen">
                                                                Bolos
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label>
                                                                <input type="radio" value="SK" name="optionsRadios2" class="grey" ng-model="data.absen">
                                                                Skors
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label>
                                                                <input type="radio" value="D" name="optionsRadios2" class="grey" ng-model="data.absen">
                                                                Dispen
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label>
                                                                <input type="radio" value="S" name="optionsRadios2" class="grey" ng-model="data.absen">
                                                                Sakit
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="form-field-1"></label>
                                                    <div class="col-sm-9">
                                                        <button data-style="zoom-in" class="btn btn-success ladda-button" type="submit">
                                                            <span class="ladda-label"> Simpan <i class="fa fa-send"></i> </span>
                                                            <span class="ladda-spinner"></span>
                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
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