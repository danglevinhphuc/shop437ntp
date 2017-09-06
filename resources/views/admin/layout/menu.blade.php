<style type="text/css">
    .khoang{
        margin-left: 20px;
    }
    h5{
        color: #DD0000;
    }
</style>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <h5>Hôm nay bạn khoẻ không ???</h5>
                </div>
                <!-- /input-group -->
            </li>

            <li>
                <a href="{{ asset('') }}" target="_blank"><i class="fa fa-undo fa-fw"></i> Quay về trang bán hàng</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-book fa-fw"></i>Danh mục sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('danhsachcategory')}}">Danh Sách</a>
                    </li>
                    <li>
                        <a href="{{route('themcategory')}}">Thêm tên danh mục sản phẩm</a>
                    </li>
                    <li>
                    @foreach($category as $category)

                       <li>
                        <a href="#"><i class="fa fa fa-circle-o fa-fw"></i>{{$category->ten}}<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachcategorychild',$category->id)}}" class="khoang">Danh Sách</a>
                            </li>
                            <li>
                                <a href="admin/categorychild/them/{{$category->id}}" class="khoang">Thêm loại sản phẩm trong danh mục {{$category->ten}}</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    @endforeach
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-sliders fa-fw"></i>Slide<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{route('danhsachslide')}}">Danh Sách</a>
                </li>
                <li>
                    <a href="{{route('themslide')}}">Thêm</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-product-hunt fa-fw"></i>Sản Phẩm<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{route('danhsachproducts')}}">Danh Sách</a>
                </li>
                <li>
                    <a href="{{route('themproducts')}}">Thêm</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-gift fa-fw"></i>Sự kiện<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{route('danhsachevents')}}">Danh Sách</a>
                </li>
                <li>
                    <a href="{{route('themevents')}}">Thêm</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-paper-plane-o"></i> Tuyển dụng<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{route('danhsachtuyendung')}}">Danh Sách</a>
                </li>
                <li>
                    <a href="{{route('themtuyendung')}}">Thêm</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{route('danhsachuser')}}">Danh Sách</a>
                </li>

            </ul>
            <!-- /.nav-second-level -->
        </li>
    </ul>
</div>
<!-- /.sidebar-collapse -->
</div>