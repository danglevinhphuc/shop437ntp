@extends('client.layout.chitiet')
@section('contentClient')
@section('title')Đăng nhập|Quà lưu niệm HANAH
@endsection
<section class="top_section">
	<div class="container">
		<div class="breadcrumbs">
			<ul class="breadcrumb">
				<li><a href="{{route('trangchu')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> <span class="divider"></span></li>
				<li>
					Đăng nhập
				</li>
			</ul>
		</div>
	</div>
</section>
<div class="row">
	<div class="col-md-6 col-md-offset-3 text-center">
		<h2>Đăng nhập</h2>
	</div>
</div>
<div class="row text-center">
	<div class="col-md-6 col-md-offset-3 customer-login">
		<form accept-charset="UTF-8" action="{{route('dangnhap')}}" id="customer_login" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="loginbox form-horizontal">
			
			<div class="form-group">
				<label class="control-label col-md-4" for="inputEmail">Email<span class="required">*</span></label>
				<div class="col-md-8">
					<input type="email" class="form-control" name="email" id="email"  required="true" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4" for="inputPassword">Mật khẩu<span class="required">*</span></label>
				<div class="col-md-8">
					<input type="password" class="form-control" name="password" id="pass" required="true" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<button class="btn btn-primary" type="submit">Đăng nhập</button>
				</div>
			</div>
		</div>
		</form>
	</div>	

	

	</div>

</div>
@endsection