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
                        <h1 class="page-header">Recruitment
                            <small>Thêm nội dung mới cho tuyển dụng</small>
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
                        <form action="{{route('themtuyendung')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên tiêu đề tuyển dụng <span class="bat-buoc" >(*)</span></label>
                                <input type="text" class="form-control" name="ten" placeholder="Tên tiêu đề..." required="true">
                            </div>
                            <div class="form-group">
                                <label>Mô tả <span class="bat-buoc" >(*)</span></label>
                                <textarea class="form-control ckeditor"  id="demo"  name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm tin tuyển dụng</button>
                            <button type="reset" class="btn btn-danger">Xoá tất cả</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection