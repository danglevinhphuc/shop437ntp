@extends('client.layout.chitiet')
@section('contentClient')
@section('title')@foreach($category as $category_title){{$category_title->category->ten}}|{{$category_title->ten}}@endforeach|Quà lưu niệm HANAH
@endsection
<section class="top_section">
	<div class="container">
		<div class="breadcrumbs">
			<ul class="breadcrumb">
				<li><a href="{{route('trangchu')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> <span class="divider"></span></li>
				<li>
					@foreach($category as $category)
								<a href="{{route('danhmuc',$category->category->tenkhongdau)}}">{{$category->category->ten}}</a> / {{$category->ten}}
					@endforeach
				</li>
				
				
			</ul>
		</div>
	</div>
</section>
<div class="page_collection">
	<div class="container">
		<div class="row">
			@include("client.layout.sidebar")
			<div class="col-xs-12 col-sm-8 col-md-9">


				<div class="row product-thumb">
					@if(!count($products))
						<div class="alert alert-danger">
                            Không có sản phẩm 
                        </div>
					@endif
					@foreach($products as $product)
					<div class="col-xs-12 col-sm-4 col-md-3">
						

						<div id="product-{{$product->id}}" class="item product-inner wow bounceIn">
							<div class="item-inner transition">
								@if($product->promotion_price != null && $product->promotion_price != 0.00)
									{! <span class="label label-sale">Sale</span> !}₫
									@endif
								<div class="image">
									<a class="lt-image" href="{{route('chitiet',$product->id)}}" target="_self" title="{{$product->ten}}">


										@foreach($product->hinhproduct as $hinh_nomally)
										<img  src="storage/app/upload/product/{{$hinh_nomally->hinh}}" class="img-1 product-featured-image" alt="{{$product->ten}}" >
										@break
										@endforeach


										@foreach($product->hinhproduct as $hinh_nomally)
										<img  src="storage/app/upload/product/{{$hinh_nomally->hinh}}" class="img-2 product-featured-image" alt="{{$product->ten}}" >
										@break
										@endforeach

									</a>
									<div class="button-group">
										<div class="button-group">

											<form action="#" method="post" class="variants" >    

											</form>  
											<form action="#" method="post">

												<button type="button" onclick="window.location.href='/products/tu-ruou-3-ngan'" class="button btn-cart" data-toggle="tooltip" title="" data-original-title="Tùy chọn"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>           


											</form>
										</div> <!-- /.button-group -->
									</div> <!-- /.button-group -->

								</div> <!-- /.image -->
								<div class="caption">
									<h4>
										<a href="/products/tu-ruou-3-ngan" title="Tủ rượu 3 ngăn" target="_self">
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
					</div>
					@endforeach
					
				</div>
				
				<div class="toolbar">
					<div class="row text-center">{{$products->links()}}</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
@endsection