@extends('admin.layout.index')
@section('content')
<style type="text/css">
    .bat-buoc{
        color: red;
    }
</style>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Event
                            <small>Sửa sự kiện</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br/>
                            @endforeach
                        </div>
                    @endif

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
                        <form action="{{route('suaevents',$category->id)}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên sự kiện <span class="bat-buoc" >(*)</span></label>
                                <input type="text" class="form-control" value="{{$category->ten}}" name="ten" placeholder="Tên sự kiện...">
                            </div>
                            <div class="form-group">
                                <label> <span class="description" >Mô tả</span></label>
                                <textarea class="form-control" name="description">{{$category->description}}</textarea>
                            </div>
                            <div class="form-group">
                            <div>
                                <label>Hình trước đây:</label>
                                @if($category->hinh)<img src="storage/app/upload/event/{{$category->hinh}}" width="100px" height="100px"></td>
                                        @else
                                            {!!'<i class="fa fa-times-circle-o" aria-hidden="true" style="color: red"></i>'!!}
                                        @endif
                            </div>
                            <label> <span class="hinh" >Hình đại diện</span></label>
                            <input type="file" name="file" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa sự kiện</button>
                            <a href="{{route('danhsachevents')}}" type="reset" class="btn btn-danger">Quay về</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection