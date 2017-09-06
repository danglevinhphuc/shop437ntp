
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
                     @foreach($categorychild as $cate)
                        <h1 class="page-header">Type Product
                            <small>Loại sản phẩm trong danh mục {{$cate->category->ten}}</small>
                        </h1>
                        <div class="pull-right">

                            <a href="admin/categorychild/them/{{$cate->category->id}}">Thêm loại sản phẩm</a>
                        </div>
                        @break
                    @endforeach
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(Session::has("thanhcong"))
                        <div class="alert alert-success">
                            {{Session::get('thanhcong')}}
                        </div>
                    @endif
                    @if(Session::has("thatbai"))
                        <div class="alert alert-success">
                            {{Session::get('thatbai')}}
                        </div>
                    @endif
                    <div class="tablereponsive" >
                    <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên loại sản phẩm</th>
                                <th>Tên loại sản phẩm không dấu</th>        
                                <th>Xoá</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorychild as $cate)
                                <tr>
                                    <td>{{$cate->id}}</td>
                                    <td>{{$cate->ten}}</td>
                                    <td>{{$cate->tenkhongdau}}</td>
                                    <td><a href="{{route('xoacategorychild',$cate->id)}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn xoá danh mục sản phẩm: {{$cate->ten}}' );"></i></a></td>
                                    <td><a href="{{route('suacategorychild',$cate->id)}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
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