<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<html class="hide-sidebar ls-bottom-footer no-js" lang="en" ng-app="admin">
<head>
    <meta charset="utf-8" />
    <title>::. Login Administrator Adminex Scholl .::</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="Agus Cahyono" name="author" />
    <link href="{{asset('assets/admin/css/vendor.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/theme-core.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/module-essentials.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/module-material.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/module-layout.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/angular-block-ui.min.css')}}" type="text/css">
    <style type="text/css">
        body {
            background-color: #f7f7f7;

        }
        .container {
            margin-top: 80px;
        }
        .form-signin input[type="text"] {
            margin-bottom: 5px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .form-signin .form-control {
            position: relative;
            font-size: 16px;
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .vertical-offset-100 {
            padding-top: 100px;
        }
        .img-responsive {
            display: block;
            max-width: 100%;
            height: auto;
            margin: auto;
        }
        .panel-body {
            background: #fff;
        }
        .panel {
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.75);
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: 5px 5px 5px rgba(0, 0, 0, .05);
            box-shadow: 5px 5px 5px rgba(0, 0, 0, .05);
        }
        .icon-field i {
            left: 10px;
            position: relative;
            top: 26px;
        }
    </style>
</head>
<body ng-controller="login">
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <center>
                <h2 style="font-weight: bolder">ADMINEX</h2>
            </center>
            <br />
            <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><% alert.msg %></alert>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" ng-submit='submit()' novalidate>
                        <fieldset>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <input class="form-control" name="username" placeholder="Masukan Username Anda" ng-model='data.username' type="text" data-toggle="tooltip" data-placement="top" title="Masukan Username Anda">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="password" placeholder="Masukan Password Anda" ng-model="data.password" type="password" data-toggle="tooltip" data-placement="top" title="Masukan Password Anda">
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary">
                                Login <i class="fa fa-fw fa-unlock-alt"></i>
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <center>
                <span style="color:#333;font-weight: bold;">Developed By
                    <a style="color:#333" href="http://facebook.com/cahyocode" style="color:white" target="_blank">
                        Agus Cahyono</a>
                </span>
            </center>
        </div>
    </div>
</div>
<script src="{{asset('assets/plugins/jQuery-lib/2.0.3/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<script>var base_url = "{{url()}}";</script>

<script src="{{asset('assets/js/angular.min.js')}}"></script>
<script src="{{asset('assets/js/ui-bootstrap-tpls-0.12.0.min.js')}}"></script>
<script src="{{asset('assets/js/angular-file-upload.min.js')}}"></script>
<script src="{{asset('assets/js/angular-block-ui.min.js')}}"></script>
<script src="{{asset('assets/js/admin.js')}}"></script>
<script src="{{asset('assets/js/controller/login.js')}}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="{{asset('assets/admin/js/module-material.min.js')}}"></script>
<script src="{{asset('assets/admin/js/theme-core.min.js')}}"></script>
</body>
</html>