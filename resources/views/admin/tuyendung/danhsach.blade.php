
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
                        <h1 class="page-header">Recruitment
                            <small>Danh sách tin tuyển dụng</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(Session::has("thanhcong"))
                        <div class="alert alert-success">
                            {{Session::get('thanhcong')}}
                        </div>
                    @endif
                    <div class="tablereponsive" >
                    <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tuyendung as $tuyendung)
                            <tr>
                                <td>{{$tuyendung->id}}</td>
                                <td>{{$tuyendung->title}}</td>
                                <td class="mota">{!!$tuyendung->description!!}</td>
                                <td><a href="admin/tuyendung/xoa/{{$tuyendung->id}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn xoá tin tuyển dụng này không??' );"></i></a></td>
                                    <td><a href="admin/tuyendung/sua/{{$tuyendung->id}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
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