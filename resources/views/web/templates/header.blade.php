<div class="responsive-navigation visible-sm visible-xs">
    <a href="javascript:void(0)" class="menu-toggle-btn">
        <i class="fa fa-bars"></i>
    </a>
    <div class="responsive_menu">
        <ul class="main_menu">
            <li><a href="{{url('')}}">Home</a></li>
            <?php
            $menu = DB::table('tbl_menu')->where('id_parent','0')->Orderby('id','ASC')-> get();
            ?>
            @foreach($menu as $mn)
                <?php
                $submenu    = DB::table('tbl_menu')->where('id_parent', $mn->id)->Orderby('id','DESC')->get();
                ?>
                @if(count($submenu))
                    <li class="dropdown"  role="button" aria-expanded="false">
						@if($mn->tipe_menu == '1')
							<a href="{{url('page',$mn->slug_menu)}}">{{$mn->title}} </a>
						@elseif($mn->tipe_menu == '3')
							<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
						@else
							<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
						@endif
                        <ul style="width: auto">
                            @foreach($submenu as $s)
                                @if($s->tipe_menu == '1')
                                    <li><a href="{{url('page',$s->slug_menu)}}">{{$s->title}}</a></li>
                                @elseif($s->tipe_menu == '3')
                                    <li><a href="{{url($s->slug_menu)}}">{{$s->title}}</a></li>
                                @else
                                    <li><a href="{{url($s->slug_menu)}}">{{$s->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        @if($mn->tipe_menu == '1')
							<a href="{{url('page',$mn->slug_menu)}}">{{$mn->title}} </a>
						@elseif($mn->tipe_menu == '3')
							<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
						@else
							<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
						@endif
                    </li>
                @endif
            @endforeach
        </ul> <!-- /.main_menu -->
        <ul class="social_icons">
            <li><a href="{{$facebook}}"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{$twitter}}"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{$gplus}}"><i class="fa fa-google-plus"></i></a></li>
        </ul> <!-- /.social_icons -->
    </div> <!-- /.responsive_menu -->
</div> <!-- /responsive_navigation -->

<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 header-left">
                <div class="logo">
                    <a href="{{url('')}}" title="" rel="home">
                        <img src="{{url('upload/logo',$logo)}}" style="margin-left: 50px;height: 50px;width:90%">
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
                        $submenu    = DB::table('tbl_menu')->where('id_parent', $mn->id)->Orderby('id','DESC')->get();
                        ?>
                        @if(count($submenu))
                            <li class="dropdown"  role="button" aria-expanded="false">
                                @if($mn->tipe_menu == '1')
									<a href="{{url('page',$mn->slug_menu)}}">{{$mn->title}} </a>
								@elseif($mn->tipe_menu == '3')
									<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
								@else
									<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
								@endif
                                <ul style="width: auto">
                                    @foreach($submenu as $s)
                                        @if($s->tipe_menu == '1')
                                            <li><a href="{{url('page',$s->slug_menu)}}">{{$s->title}}</a></li>
                                        @elseif($s->tipe_menu== '3')
                                            <li><a href="{{url($s->slug_menu)}}">{{$s->title}}</a></li>
                                        @else
                                            <li><a href="{{url($s->slug_menu)}}">{{$s->title}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            @else
                            <li>
                                @if($mn->tipe_menu == '1')
									<a href="{{url('page',$mn->slug_menu)}}">{{$mn->title}} </a>
								@elseif($mn->tipe_menu == '3')
									<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
								@else
									<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
								@endif
                            </li>
                        @endif
                    @endforeach
                </ul> <!-- /.main-menu -->

                <ul class="social-icons pull-right">
                    <li><a href="{{$facebook}}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{$twitter}}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{$gplus}}"><i class="fa fa-google-plus"></i></a></li>
                </ul> <!-- /.social-icons -->
            </nav> <!-- /.main-navigation -->
        </div> <!-- /.container -->
    </div> <!-- /.nav-bar-main -->

</header> <!-- /.site-header -->


