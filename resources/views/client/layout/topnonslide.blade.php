		<div class="page-container">
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-xs-8 col-sm-8 hidden-xs">
							@if(Session::has("thanhcong"))
							<div class="alert alert-danger">
								{{Session::get('thanhcong')}}
							</div>
							@endif
							<div class="hotline_top">
								<img  src='{{ asset("public") }}/client/img/icondienthoaie6dd.png' alt="HANAH phone" />
								<b style="color:#fff;">Tư vấn 24/7:</b> 0283 853 2518
							</div>
							
							<p class="diachi_header"><span>Địa chỉ:</span> 437 Nguyễn Tri Phương Phường 8, Quận 10</p>
						</div>
						<div class="col-xs-12 col-sm-4 text-right">
							<div class="dropdown boxtaikhoan">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-user" aria-hidden="true"></i>
							@if(Auth::check()) 
							{{Auth::user()->name}} 
							@else
							{{'Tài khoản'}}
							@endif
							<i class="fa fa-angle-down" aria-hidden="true"></i></a>
							
							<ul class="dropdown-menu" style="margin: 0;top: 100%;">
								@if(!Auth::check())  
								<li><a href="{{route('dangnhap')}}" id="customer_login_link">Đăng nhập</a></li>
								@else
								<li><a href="{{route('danhsachproducts')}}" >Quản lý sản phẩm</a></li>
								<li><a href="{{route('dangxuat')}}" >Đăng xuất</a></li>
								@endif

							</ul>
						</div>
					</div>
						</div>
					</div>
				</div>

				<nav class="navbar menumain visible-xs mobile-menu">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a title="" href="{{route('trangchu')}}" class="navbar-brand">

							<img src='{{ asset("public") }}/client/img/logo.jpg'  alt="HANAH">

						</a>
					</div>
					<div class="navbar-collapse collapse navbar-left">
						<ul class="nav navbar-nav list-collections list-cate-banner">


							<li class="menu_lv1 item-sub-cat"><a href="{{route('trangchu')}}">
								Trang chủ</a>
							</li>



							<li class="menu_lv1 item-sub-cat"><a href="{{route('gioithieu')}}">
								Giới thiệu</a>
							</li>
							<li class="menu_lv1 item-sub-cat"><a href="{{route('sukien')}}">
								Sự kiện</a>
							</li>
							<li class="menu_lv1 item-sub-cat"><a href="{{route('tuyendung')}}">
						Tuyển dụng</a>
					</li>
							<li class="menu_lv1 item-sub-cat">
								<a class="active_product">
									Sản phẩm
								</a>
								<ul class="menu_lv2 product_hidden menuchild_product">
									@foreach($category as $category1)

									<li class="col-xs-12 col-sm-6">
										<a href="{{route('danhmuc',$category1->tenkhongdau)}}">{{$category1->ten}}</a>

										<ul class="sub2">
											@foreach($category1->categorychild as $cate1)
											<li >
												<a href="{{route('loaisanpham',$cate1->tenkhongdau)}}">{{$cate1->ten}}</a>
											</li>
											@endforeach
										</ul>
									</li>

									@endforeach
								</ul>
							</li>
						</ul>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							$(".active_product").on('click',function(){
								$(".menuchild_product").fadeToggle(1000);
							});
						});
					</script>
					<form action="{{route('tim')}}" method="get" class="navbar-form navbar-search navbar-right hidden-md hidden-lg hidden-sm"  >

						<input   name="q" placeholder="Nhập thông tin cần tìm kiếm" class="search-query" maxlength="128" type="text">
						<button type="submit" class="btn icon-search"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</nav>
				<div class="logo-top" >
					<a title="HANAH" href="{{route('trangchu')}}">

						<img alt="HANAH" src='{{ asset("public") }}/client/img/logo.png' >

					</a>
				</div>
				<div class="header hidden-xs">
					<div class=" container">
						<nav class="navbar menumain">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Menu</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>

							</div>
							<div class="navbar-collapse collapse navbar-left">
								<ul class="nav navbar-nav">


									<li class="active"><a href="{{route('trangchu')}}">Trang chủ</a></li>



									<li ><a href="{{route('gioithieu')}}">Giới thiệu</a></li>



									<li class="dropdown "><a href="#">Sản phẩm <i class="fa fa-caret-down pull-right" aria-hidden="true"></i></a>
										<ul class="dropdown-menu sub1">
											<div class="col-xs-12 col-sm-8">
												<div class="row">


													@foreach($category as $category)

													<li class=" col-xs-12 col-sm-6">
														<a href="{{route('danhmuc',$category->tenkhongdau)}}">{{$category->ten}}</a>

														<ul class="sub2">
															@foreach($category->categorychild as $cate)
															<li >
																<a href="{{route('loaisanpham',$cate->tenkhongdau)}}">{{$cate->ten}}</a>
															</li>
															@endforeach
														</ul>
													</li>

													@endforeach
												</div>
											</div>
											<div class="col-xs-12 col-sm-4 hidden-xs">
												<div class="box-bestseller">
													<div class="title_bestseller">
														Sản phẩm mới nhất
													</div>
													<div class="body_bestseller">
														@foreach($products_noibat as $products_noibat)
														<div class="bestseller_one">
															<a href="{{route('chitiet',$products_noibat->id)}}" title="{{$products_noibat->ten}}" class="bestseller_one_img">
																@foreach($products_noibat->hinhproduct as $hinh_nomally)
																<img src="storage/app/upload/product/{{$hinh_nomally->hinh}}" alt="{{$hinh_nomally->ten}}" class="img_noibat" />
																@break
																@endforeach
															</a>
															<h3 class="bestseller_one_name">
																<a href="{{route('chitiet',$products_noibat->id)}}" title="{{$products_noibat->ten}}">
																	{{$products_noibat->ten}}	
																</a>
															</h3>
															<div class="bizweb-product-reviews-badge" data-id="1003351976"></div>
															<p class="bestseller_one_price">

																<span class="price-new">@if($products_noibat->promotion_price == null || $products_noibat->promotion_price == 0.00)
																	{{number_format($products_noibat->unit_price)}}₫
																	@else
																	{{number_format($products_noibat->promotion_price)}}₫
																	@endif</span> 

																</p>
																<div class="clearfix"></div>
															</div>
															@endforeach
														</div>
													</div>
												</div>
												<div class="clearfix"></div>

											</ul>
										</li>



										<li class="active"><a href="{{route('sukien')}}">Sự kiện</a></li>
										<li class="active"><a href="{{route('tuyendung')}}">Tuyển dụng</a>
								</li>






									</ul>
								</div><!-- /.navbar-collapse -->
								<form action="{{route('tim')}}" method="get" class="navbar-form navbar-search navbar-right hidden-xs"  >

									<input   name="q" placeholder="Nhập thông tin cần tìm kiếm tại đây" class="search-query" maxlength="128" type="text">
									<button type="submit" class="btn icon-search"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>


							</nav>
						</div>
					</div>
					<script>
						$(document).ready(function(){
							$(window).scroll(function(){
								if($(this).scrollTop() > 150){
									$('.header').addClass('fixmenu');
								} else{
									$('.header').removeClass('fixmenu');
								}
							})
						})
					</script>
