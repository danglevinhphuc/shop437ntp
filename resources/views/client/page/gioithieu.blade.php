@extends('client.layout.chitiet')
@section('contentClient')
@section('title')Giới thiệu|Quà lưu niệm HANAH
@endsection
<section class="top_section">
	<div class="container">
		<div class="breadcrumbs">
			<ul class="breadcrumb">
				<li><a href="{{route('trangchu')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> <span class="divider"></span></li>
				<li>
					Giới thiệu
				</li>
			</ul>
		</div>
	</div>
</section>

<div class="introduce" >
<div class="row" >
	<div class="col-md-12">
		<div class="cat_header">
			<h2 class="page_title">Giới thiệu</h2>
		</div>
	</div>
</div>
<div class="col-md-12 top_section" >
	<div class="row content-page">
		<div class="box padding">
			<p>Trang giới thiệu giúp khách hàng hiểu rõ hơn về cửa hàng <a href="{{route('trangchu')}}">HANAH</a>.<br/> Có thể tham khảo giá các sản phẩm được bày bán tại shop <a href="{{route('trangchu')}}">HANAH.</a><br/>
			Nhân viên chăm sóc khách hàng thân thiện và thành thật đảm bảo đúng giá thị trường.<br/>
			Trực tiếp trao đổi với nhân viên hoặc chủ shop về giá cả hoặc địa chỉ để chuyển hàng , đặc biệt <span style="color: red">FREE SHIP nội thành</span>.</p>
		</div>
	</div>
</div>
</div>
@endsection