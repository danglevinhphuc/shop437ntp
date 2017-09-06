@extends('client.layout.chitiet')
@section('contentClient')
@section('title'){{$product->ten}}|Quà lưu niệm HANAH
@endsection
<section class="top_section">
	<div class="container">
		<div class="breadcrumbs">
			<ul class="breadcrumb">
				<li><a href="{{route('trangchu')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> <span class="divider"></span></li>
				<li class="active">{{$product->ten}}</li>
			</ul>
		</div>
	</div>
</section>
<div class="page_collection">
	<div class="container">
		<div class="product-info" itemscope="" >
			<div class="row">
				<div class="col-md-6 col-sm-12">
					
					
					<div class="image large-image">
						@foreach($product->hinhproduct as $hinh_nomally)
						<a class="cloud-zoom" rel="adjustX: 0, adjustY:0" id='zoom1' href="storage/app/upload/product/{{$hinh_nomally->hinh}}" title=""><img src="storage/app/upload/product/{{$hinh_nomally->hinh}}" title="{{$product->ten}}" class="img_chitiet" 
							alt="{{$product->ten}}" 
							/></a>
							@break
							@endforeach
						</div>

						<div class="image-additional">
							@if(count($product->hinhproduct) >1)
							@foreach($product->hinhproduct as $hinh_nomally)
							<a title="{{$product->ten}}" rel="useZoom: 'zoom1', smallImage: 'storage/app/upload/product/{{$hinh_nomally->hinh}}' " class="cloud-zoom-gallery" href="storage/app/upload/product/{{$hinh_nomally->hinh}}"><img title="" src="storage/app/upload/product/{{$hinh_nomally->hinh}}" alt="{{$product->ten}}" ></a>
							@endforeach
							@endif
						</div>


					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<h1 itemprop="name" class="name_product">{{$product->ten}}</h1>
						<div id="bizweb-product-reviews" class="bizweb-product-reviews" data-id="1003351981">

						</div>
						<div class="box-price-titrang">
							<div class="row">
								<div class="giasp col-xs-8 col-sm-6">
									<strong class="sale-price" itemprop="price">
										@if($product->promotion_price == null || $product->promotion_price == 0.00)
										{{number_format($product->unit_price)}}₫
										@else
										{{number_format($product->promotion_price)}}₫
										@endif
									</strong>
								</div>
								<div class="col-xs-4 col-sm-6">
									<ul class="tinhtrang">
										<li><span class="hidden-xs">Tình trạng: </span>

											<span class="green bl">Còn hàng</span>

										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="line"></div>
						<div class="">
							<ul class="list_thongtin">
								<li><span>Địa điểm bán:</span> <a href="{{route('trangchu')}}">SHOP HANAH</a></li>
								<li>437 Nguyễn Tri Phương Phường 8, Quận 10</li>
							</ul>
						</div>
						<div class="line"></div>
						<div class="detailcall">
							<div class="callphoneicon">
								<i class="fa fa-phone"></i>
							</div>
							<a href="tel:0433653666">
								đặt mua qua điện thoại (8h00 - 22h00) <br>
								<span>0283 853 2518</span>
							</a>
						</div>
						<div class="clearfix"></div>
						<div class="line"></div>

					</div>
				</div>
			</div>
			<div class="col-md-9" style="padding-left:0;">
				<div class="">
					<div class="tabthongtinchitiet">
						<div class="tabs">
							<ul class="nav nav-tabs tabs-title" id="myTab">
								<li class="active"><a style="color: #CCFF00 !important">Thông tin sản phẩm</a></li>
							</ul>
							<div class="tab-content tab-body">
								<div class="tab-pane active" id="home">
									{!!$product->description!!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 left-sp" style="padding-right:0;">
				<div class="" id="related_products">
					<div class="block-sidebar-product">
						<div class="block-sidebar-product-title">
							<h2 style="color: #CCFF00 !important">Sản phẩm liên quan</h2>
						</div>
						<div class="block-sidebar-product-content">
						@foreach($product_lienquan as $product)
							<div id="product-{{$product->id}}" class="item product-inner">
								<div class="item-inner transition">

									<div class="image">
										<a class="lt-image" href="{{route('chitiet',$product->id)}}" target="_self" title="{{$product->ten}}">
											@foreach($product->hinhproduct as $hinh_nomally)
											<img  src="storage/app/upload/product/{{$hinh_nomally->hinh}}" class="img-1 product-featured-image img_lienquan" alt="{{$product->ten}}" >
											@break
											@endforeach
										</a>
										<div class="button-group">
											<div class="button-group">

											</div> <!-- /.button-group -->
										</div> <!-- /.button-group -->

									</div> <!-- /.image -->
									<div class="caption">
										<h4>
											<a href="{{route('chitiet',$product->id)}}" title="{{$product->ten}}" target="_self">
												{{$product->ten}}								
											</a>
										</h4>

										<p class="price">

											<span class="price-new">
												@if($product->promotion_price == null || $product->promotion_price == 0.00)
												{{number_format($product->unit_price)}}₫
												@else
												{{number_format($product->promotion_price)}}₫
												@endif
											</span> 

										</p>

									</div>		
								</div> <!-- /.item-inner -->

							</div> <!-- /.item -->
						@endforeach
						</div>

					</div>
				</div>
			</div>
			<script src='{{ asset("public") }}/client/js/cloud-zoom.1.0.3e6dd.js' type='text/javascript'></script>
			<script>
				var selectCallback = function(variant, selector) {

					var addToCart = jQuery('.btn-cart'),
					productPrice = jQuery('.giasp .sale-price'),
					comparePrice = jQuery('.giasp .compare-price');

					if (variant) {
						if (variant.available) {
			// We have a valid product variant, so enable the submit button
			addToCart.removeClass('disabled').removeAttr('disabled');

		} else {
			// Variant is sold out, disable the submit button
			addToCart.addClass('disabled').attr('disabled', 'disabled');
		}

		// Regardless of stock, update the product price
		productPrice.html(Haravan.formatMoney(variant.price, ""));

		// Also update and show the product's compare price if necessary
		if ( variant.compare_at_price > variant.price ) {

			comparePrice.html(Haravan.formatMoney(variant.compare_at_price, "")).show();
		} else {
			comparePrice.hide();     
		}       

	} else {
		// The variant doesn't exist. Just a safeguard for errors, but disable the submit button anyway
		addToCart.val('Unavailable').addClass('disabled').attr('disabled', 'disabled');
	}
	/*begin variant image*/


	if (variant && variant.image) {  
		var originalImage = jQuery(".large-image img"); 
		var newImage = variant.image;
		var element = originalImage[0];
		Bizweb.Image.switchImage(newImage, element, function (newImageSizedSrc, newImage, element) {	
			jQuery('.image-additional img').each(function() {						
				var grandSize = jQuery(this).attr('src');
				var grandSize = grandSize.replace('\/thumb\/small','').split("?")[0];
				var vrnewImageSizedSrc = newImageSizedSrc.split("?")[0];	
				if (grandSize == vrnewImageSizedSrc) {
					jQuery(this).parent('a').trigger('click');              
					return false;
				}
			});
		});			
	}
	/*end of variant image*/
};	



$.fn.CloudZoom.defaults = {
	zoomWidth:"500",
	zoomHeight:"300",
	position:"inside",
	adjustX:0,
	adjustY:0,
	adjustY:"",
	tintOpacity:0.5,
	lensOpacity:0.5,
	titleOpacity:0.5,
	smoothMove:3,
	showTitle:false};

	jQuery(document).ready(function()
	{
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		})
	});
</script>			
@endsection