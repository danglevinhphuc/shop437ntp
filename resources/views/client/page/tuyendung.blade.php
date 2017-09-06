@extends('client.layout.chitiet')
@section('contentClient')
@section('title')Tuyển dụng|Quà lưu niệm HANAH
@endsection
<section class="top_section">
	<div class="container">
		<div class="breadcrumbs">
			<ul class="breadcrumb">
				<li><a href="{{route('trangchu')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> <span class="divider"></span></li>
				<li>
					Tin tuyển dụng
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
				@foreach($tuyendung as $tin)
				<div class="box-article-item wow bounceIn">
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<img src='{{ asset("public") }}/client/img/tuyendung.jpg' alt="{{$tin->title}}" class="img_sukien img-responsive">
						</div>
						<div class="col-xs-12 col-sm-8">
							<h3 class="title-article-inner"><a href="{{route('sanphamsukien',$tin->tenkhongdau)}}">{{$tin->title}}</a></h3>
							<div class="post-detail">
								<a>HANAH</a> - {{$tin->created_at}}
							</div>
							<div class="text-blog">
								<p>{!!$tin->description!!}</p>
							</div>	
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		
					<div class="row text-center">{{$tuyendung->links()}}</div>
		
	</div>
</div>
@endsection