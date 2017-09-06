
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
</style>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Event
                            <small>Danh sách sự kiện</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(Session::has("thanhcong"))
                        <div class="alert alert-success">
                            {{Session::get('thanhcong')}}
                        </div>
                    @endif
                    @if(Session::has("thatbai"))
                        <div class="alert alert-danger">
                            {{Session::get('thatbai')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sự kiện</th>
                                <th>Tên sự kiện không dấu</th>
                                <th>Hình đại diện</th>
                                <th>Xoá</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $cate)
                                <tr>
                                    <td>{{$cate->id}}</td>
                                    <td>{{$cate->ten}}</td>
                                    <td>{{$cate->tenkhongdau}}</td>
                                    <td>
                                        @if($cate->hinh)<img src="storage/app/upload/event/{{$cate->hinh}}" width="100px" height="100px"></td>
                                        @else
                                            {!!'<i class="fa fa-times-circle-o" aria-hidden="true" style="color: red"></i>'!!}
                                        @endif
                                    <td><a href="admin/events/xoa/{{$cate->id}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn xoá danh mục sản phẩm: {{$cate->ten}}' );"></i></a></td>
                                    <td><a href="admin/events/sua/{{$cate->id}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection