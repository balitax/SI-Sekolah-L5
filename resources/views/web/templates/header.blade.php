<div class="responsive-navigation visible-sm visible-xs">
    <a href="javascript:void(0)" class="menu-toggle-btn">
        <i class="fa fa-bars"></i>
    </a>
    <div class="responsive_menu">
        <ul class="main_menu">

        </ul> <!-- /.main_menu -->
        <ul class="social_icons">
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
        </ul> <!-- /.social_icons -->
    </div> <!-- /.responsive_menu -->
</div> <!-- /responsive_navigation -->

<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 header-left">
                <div class="logo">
                    <a href="{{url('')}}" title="" rel="home">
                        <img src="{{asset('assets/theme/logo.png')}}" style="margin-left: 50px;height: 90px">
                    </a>
                </div> <!-- /.logo -->
            </div> <!-- /.col-md-4 -->

            <div class="col-md-4 header-right">
                <ul class="small-links">
                </ul>
            </div> <!-- /.header-right -->
        </div>
    </div> <!-- /.container -->

    <div class="nav-bar-main" role="navigation">
        <div class="container">
            <nav class="main-navigation clearfix visible-md visible-lg" role="navigation">
                <ul class="main-menu sf-menu">
                    <li><a href="{{url('')}}">Home</a></li>
                    <?php
                        $menu = DB::table('tbl_menu')->where('id_parent','0')->Orderby('id','ASC')-> get();
                    ?>
                    @foreach($menu as $mn)
                        <?php
                        $submenu    = DB::table('tbl_menu')->where('id_parent', $mn->id)->get();
                        ?>
                        @if(count($submenu))
                            <li class="dropdown"  role="button" aria-expanded="false">
                                <a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
                                <ul style="width: auto">
                                    @foreach($submenu as $s)
                                        <li><a href="{{url($s->slug_menu)}}">{{$s->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
                            </li>
                        @endif
                    @endforeach
                </ul> <!-- /.main-menu -->

                <ul class="social-icons pull-right">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                </ul> <!-- /.social-icons -->
            </nav> <!-- /.main-navigation -->
        </div> <!-- /.container -->
    </div> <!-- /.nav-bar-main -->

</header> <!-- /.site-header -->


