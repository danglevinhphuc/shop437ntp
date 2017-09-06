@extends('client.layout.chitiet')
@section('contentClient')
@section('title')Sự kiện|Quà lưu niệm HANAH
@endsection
<section class="top_section">
	<div class="container">
		<div class="breadcrumbs">
			<ul class="breadcrumb">
				<li><a href="{{route('trangchu')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> <span class="divider"></span></li>
				<li>
					Sự kiện
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
				@foreach($events as $event)
				<div class="box-article-item wow bounceIn">
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<a href="{{route('sanphamsukien',$event->tenkhongdau)}}"><img src="storage/app/upload/event/{{$event->hinh}}" alt="{{$event->ten}}" class="img_sukien"></a>
						</div>
						<div class="col-xs-12 col-sm-8">
							<h3 class="title-article-inner"><a href="{{route('sanphamsukien',$event->tenkhongdau)}}">{{$event->ten}}</a></h3>
							<div class="post-detail">
								<a>HANAH</a> - {{$event->created_at}}
							</div>
							<div class="text-blog">
								<p>{{$event->description}}</p>
							</div>	
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		
					<div class="row text-center">{{$events->links()}}</div>
		
	</div>
</div>
@endsection