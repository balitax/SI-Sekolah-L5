<!-- begin The Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="bottom-footer">
            <div class="row">
                <div class="col-md-5">
                    <p class="small-text">&copy; Copyright <?php echo date('Y'); ?>. Allright reserved <a href="{{url('')}}"></a></p>
                </div> <!-- /.col-md-5 -->
                <div class="col-md-7">
                    <ul class="footer-nav">
                        <li><a href="{{url('')}}">Home</a></li>
                    <?php
                        $menu = DB::table('tbl_menu')->where('id_parent','0')->Orderby('id','ASC')-> get();
                    ?>
                    @foreach($menu as $mn)
						<li>
							@if($mn->tipe_menu == '1')
								<a href="{{url('page',$mn->slug_menu)}}">{{$mn->title}} </a>
							@elseif($mn->tipe_menu == '3')
								<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
							@else
								<a href="{{url($mn->slug_menu)}}">{{$mn->title}} </a>
							@endif
                        </li>
                    @endforeach
                    </ul>
                </div> <!-- /.col-md-7 -->
            </div> <!-- /.row -->
        </div> <!-- /.bottom-footer -->

    </div> <!-- /.container -->
</footer> <!-- /.site-footer -->
<script src="{{asset('assets/theme/bootstrap/js/bootstrap.min.js ')}}"></script>
<script src="{{asset('assets/theme/js/plugins.js')}}"></script>
<script src="{{asset('assets/theme/js/pace.min.js')}}"></script>
<script src="{{asset('assets/theme/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/theme/js/custom.js')}}"></script>
<script>
    var base_url = "{{url()}}";
</script>
@section('js')

@show
</body>
</html>