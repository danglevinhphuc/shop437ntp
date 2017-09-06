@extends('client.layout.index')
@section('contentClient')
@section('title')Trang chủ|Quà lưu niệm HANAH
@endsection

<section class="so-spotlight1">
	<div class="container">       
		<div class="row">
			<div class="col-xs-12">
				<div class="module moduleship">
					<div class="modcontent clearfix">
						<div class="row re-ship-phone">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="item">
									<span class="icon icon1">
									</span>
									<p class="des">
										<span>Tư vấn 24/7</span> Miễn phí
									</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="item">
									<span class="icon icon2">

									</span>
									<p class="des">
										Free ship <span>nội thành</span>
									</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="item">
									<span class="icon icon3">

									</span>
									<p class="des">
										Nhận hàng <span>Nhận tiền</span>
									</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="item">
									<span class="icon icon4">

									</span>
									<p class="des">
										Gọi ngay <span>0902 068 068</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>          

</section>

<section class="box-collection1">
	<div class="container">
		<div class=" modcontent">
			<div class="header-title">
				<h3 class="modtitle"><span>Danh mục </span>&nbsp;<span>sản phẩm</span></h3>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 hidden-xs">
					<div class="box-colection">
						<ul class="list-collections list-cate-banner">
							@foreach($category as $cate)
							<li class="menu_lv1 item-sub-cat"><a href="{{route('danhmuc',$cate->tenkhongdau)}}"><i class="fa fa-play-circle" aria-hidden="true"></i> {{$cate->ten}}</a>
								<ul  class="breadcrumb_menu2 hidden-menu-danhmuc">
									@foreach($cate->categorychild as $catechild)
									<li  class="menu_lv2 item-sub-cat"><a href="{{route('loaisanpham',$catechild->tenkhongdau)}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>  {{$catechild->ten}}</a></li>
									@endforeach
								</ul>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$(".item-sub-cat").hover(function(e){
							$(this).children('.breadcrumb_menu2').fadeIn();
						},function(){
							$(this).children('.breadcrumb_menu2').css('display','none');
						});
					});
				</script>
				<div class="col-md-9 col-sm-8 col-md-9 col-xs-12">
					<div class="row product-thumb">		
						@foreach($products_nomally as $products_nomally)
						<div class="col-md-3">
							<div  id="product-{{$products_nomally->id}}" class="item wow bounceIn">
								<div class="item-inner transition">
									@if($products_nomally->promotion_price != null && $products_nomally->promotion_price != 0.00)
									{! <span class="label label-sale">Sale</span> !}₫
									@endif
									<div class="image">
										<a class="lt-image" href="{{route('chitiet',$products_nomally->id)}}" target="_self" title="">
											@foreach($products_nomally->hinhproduct as $hinh_nomally)
											<img  src="storage/app/upload/product/{{$hinh_nomally->hinh}}" class="img-1 product-featured-image" alt="{{$products_nomally->ten}}" >
											@break
											@endforeach
											@foreach($products_nomally->hinhproduct as $hinh_nomally)
											<img  src="storage/app/upload/product/{{$hinh_nomally->hinh}}" class="img-2 product-featured-image" alt="{{$products_nomally->ten}}" >
											@break
											@endforeach

										</a>
										<div class="button-group">
											<div class="button-group">
												<form action="#" method="post">
													<button style="margin-left: 0px auto;" type="button"  class="button btn-cart btn-add-to-cart" data-toggle="tooltip" title="Mua hàng"><span><i class="fa fa-eye" aria-hidden="true" ></i></span></button>
												</form>
											</div> <!-- /.button-group -->
										</div> <!-- /.button-group -->

									</div> <!-- /.image -->
									<div class="caption">
										<h4>
											<a href="{{route('chitiet',$products_nomally->id)}}" title="{{$products_nomally->ten}}" target="_self">
												{{$products_nomally->ten}}								
											</a>
										</h4>
										<p class="price">

											<span class="price-new">
												@if($products_nomally->promotion_price == null || $products_nomally->promotion_price == 0.00)
												{{number_format($products_nomally->unit_price)}}₫
												@else
												{{number_format($products_nomally->promotion_price)}}₫
												@endif
											</span> 
										</p>
									</div>		
								</div> <!-- /.item-inner -->
							</div> <!-- /.item -->
						</div>		
						@endforeach						

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@foreach($category_name as $category)

<section class="box-collection2">
	<div class="container">
		<div class="modcontent">
			<div class="header-title">
				<h3 class="modtitle"><span>Sản phẩm</span>&nbsp;<span>{{$category->ten}}</span></h3>
			</div>
			<div class="row product-thumb product_limit" >
				<script type="text/javascript">
					$(document).ready(function(){
						$.get("{{route('loadProducts',$category->id)}}",function(data){
								// chuyen du lieu ve json de xuat
								var html = "";
								html = data;
								$("#product_list-{{$category->tenkhongdau}}").append(html);
							});
					});
				</script>
				<div id="product_list-{{$category->tenkhongdau}}"></div>
			</div>
		</div>
	</div>
</section>

@endforeach
<section class="so-spotlight1 top_qc" >
	<div class="container">       
		<div class="row top_inform" >
			<div class="col-xs-12">
				<div class="module moduleship">
					<div class="modcontent clearfix">
						<div class="row re-ship-phone">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<img src="//theme.hstatic.net/1000111235/1000276160/14/policies_icon_1.png?v=34" alt="Women Shoes">
									</div>
									<h3>Miễn phí giao hàng</h3>
									<p class="notopmargin">Nhận hàng trong vòng 3 ngày</p>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<img src="//theme.hstatic.net/1000111235/1000276160/14/policies_icon_3.png?v=34" alt="Women Shoes">
									</div>
									<h3>Bảo đảm chất lượng</h3>
									<p class="notopmargin">Sản phẩm đã dược kiểm định</p>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<img src="//theme.hstatic.net/1000111235/1000276160/14/policies_icon_4.png?v=34" alt="Women Shoes">
									</div>
									<h3><a href="tel:HOTLINE: 0902 068 068">HOTLINE: 0902 068 068</a></h3>
									<p class="notopmargin">Dịch vụ hỗ trợ bạn 24/7</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>          

</section>
@endsection