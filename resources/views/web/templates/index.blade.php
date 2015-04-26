<?php
error_reporting(0);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en">
</html><![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en">
</html><![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> </html><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="{{$desc}}">
    <meta name="keywords" content="{{$key}}">
    <meta name="author" content="Agus Cahyono" />
    <meta charset="UTF-8" />
    <!-- CSS Bootstrap & Custom -->
    <link href="{{asset('assets/theme/bootstrap/css/bootstrap.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('assets/theme/css/font-awesome.min.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('assets/theme/css/animate.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('assets/theme/style.css')}}" rel="stylesheet" media="screen" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('assets/theme/images/ico/favicon.ico')}}" />
    <!-- JavaScripts -->
    <script src="{{asset('assets/theme/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/theme/js/modernizr.js')}}"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=323921094484837&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

@include('web.templates.header',['menu' => isset($menu) ? $menu : ''])

@yield('content')

@include('web.templates.footer')

