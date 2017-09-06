<div class="col-xs-12 col-sm-4 col-md-3 product_hidden">
				<div class=" left-menu">
					<div class="box-search-inner">
						<p>Tìm kiếm</p>
						<form action="{{route('tim')}}" method="GET" class="navbar-form navbar-search" role="search">
							<input type="text" name="q" placeholder="Tìm kiếm" class="search-query-inner">
							<button type="submit" class="btn icon-search-inner"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form>
					</div>
					<div class="box-colection">
						<div class="title-collection-menu-l">Danh mục</div>
						<ul class="list-collections list-cate-banner list-index">
							@foreach($categorys as $cate)
							<li class="menu_lv1 item-sub-cat"><a href="{{route('danhmuc',$cate->tenkhongdau)}}"><i class="fa fa-play-circle" aria-hidden="true"></i> {{$cate->ten}}</a>
								<ul  class="breadcrumb_menu2 hidden-menu-danhmuc">
									@foreach($cate->categorychild as $catechild)
									<li  class="menu_lv2  item-sub-cat"><a href="{{route('loaisanpham',$catechild->tenkhongdau)}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>  {{$catechild->ten}}</a></li>
									@endforeach
								</ul>
							</li>
							@endforeach
						</ul>
					</div>
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