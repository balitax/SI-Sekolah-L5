<!DOCTYPE html>
<html class="st-layout ls-top-navbar-large ls-bottom-footer show-sidebar sidebar-l3" lang="en" ng-app="admin">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>.:: {{$title}} | Adminex School ::.</title>
    <meta name="author" content="Agus Cahyono">
    <link href="{{asset('assets/admin/css/vendor.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/theme-core.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/module-essentials.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/module-material.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/module-layout.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/module-sidebar.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/module-sidebar-skins.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/module-navbar.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/angular-block-ui.min.css')}}" type="text/css" id="skin_color">
    @section('css')

    @show
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <div class="st-container">
        @section('header')
            @include('backend.templates.header',['user' => Auth::User()])
        @show

        @yield('content')

        <footer class="footer">
            <strong>BY <a href="http://facebook.com/cahyocode"> AGUS CAHYONO</a> &copy; {{date('Y')}}. SI SEKOLAH WITH LARAVEL 5 </strong>
        </footer>
        
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="{{asset('front/plugins/respond.min.js')}}"></script>
        <script src="{{asset('front/plugins/excanvas.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/plugins/jQuery-lib/1.10.2/jquery.min.js')}}"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <script>
            var colors = {
                "danger-color": "#e74c3c",
                "success-color": "#81b53e",
                "warning-color": "#f0ad4e",
                "inverse-color": "#2c3e50",
                "info-color": "#2d7cb5",
                "default-color": "#6e7882",
                "default-light-color": "#cfd9db",
                "purple-color": "#9D8AC7",
                "mustard-color": "#d4d171",
                "lightred-color": "#e15258",
                "body-bg": "#f6f6f6"
            };
            var config = {
                theme: "html",
                skins: {
                    "default": {
                        "primary-color": "#42a5f5"
                    }
                }
            };
        </script>
        <!-- Separate Vendor Script Bundles -->
        <script src="{{asset('assets/admin/js/vendor-core.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/vendor-tables.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/vendor-forms.min.js')}}"></script>

        <script src="{{asset('assets/admin/js/module-essentials.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/module-material.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/module-layout.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/module-sidebar.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/theme-core.min.js')}}"></script>

        <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="{{ url('') }}/tinymce/tinymce_editor.js"></script>
        <script type="text/javascript">
        editor_config.selector = "textarea";
        tinymce.init(editor_config);
        </script>

        <script src="{{asset('assets/plugins/ckeditor/adapters/jquery.js')}}"></script>
        <script src="{{asset('assets/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
                    var base_url = "{{url()}}";
                    jQuery(document).ready(function() {
            CKEDITOR.disableAutoInline = true;
                    $('textarea.ckeditor').ckeditor();
                    $(".group1").colorbox({
            rel: 'group1',
                    transition: "none",
                    width: "100%",
                    height: "100%",
                    retinaImage: true
            });
            });</script>
        <script src='{{asset('assets/js/angular.min.js')}}'></script>
        <script src='{{asset('assets/js/ui-bootstrap-tpls-0.12.0.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-file-upload.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-file-upload-shim.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-block-ui.min.js')}}'></script>
        <script src='{{asset('assets/js/admin.js')}}'></script>
        @section('js')

        @show

    </body>
    </html>