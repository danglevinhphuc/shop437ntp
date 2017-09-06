
@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<style type="text/css">
   tr td .fa{
        font-size: 30px !important;
    }
    .danger{
        color: red !important; 
    }
    .success{
        color: green !important;
    } 
    @media screen and (max-width:860px){
        .tablereponsive{
            overflow-x: scroll !important;
        }
    }
</style>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Products
                            <small>Danh sách sản phẩm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(Session::has("thanhcong"))
                        <div class="alert alert-success">
                            {{Session::get('thanhcong')}}
                        </div>
                    @endif
                    <div class="tablereponsive" >
                    <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Thuộc danh mục</th>
                                <th>Thuộc loại sản phẩm</th>
                                <th>Giá góc</th>                                
                                <th>Giá khuyến mãi</th>
                                <th>Sản phẩm mới</th>
                                <th>Sự kiện</th>
                                <th>Xoá</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->ten}}</td>
                                <td>{{$product->category->ten}}</td>
                                <td>
                                    @If($product->categorychild)
                                        {{$product->categorychild->ten}}
                                    @else
                                        {!!'<i class="fa fa-times-circle-o" aria-hidden="true" style="color: red"></i>'!!}
                                    @endif
                                </td>
                                <td>{{$product->unit_price}}</td>
                                <td>{{$product->promotion_price}}</td>
                                <td>
                                    @If($product->new == 1)
                                        {{'Có'}}
                                    @else
                                        {{'Không'}}
                                    @endif
                                </td>
                                <td>
                                    @If($product->id_event != null)
                                        {{$product->events->ten}}
                                    @else
                                        {!!'<i class="fa fa-times-circle-o" aria-hidden="true" style="color: red"></i>'!!}
                                    @endif
                                </td>
                                <td><a href="admin/products/xoa/{{$product->id}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn  xoá sản phẩm này không??' );"></i></a></td>
                                    <td><a href="admin/products/sua/{{$product->id}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection