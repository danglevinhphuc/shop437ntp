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
                <h1 class="page-header">Picture
                    <small>Thêm hình ảnh cho sản phẩm</small>
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
                
                <form action="admin/hinhproduct/them/{{$id_product}}" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Chọn hình <span class="bat-buoc" >(*)</span></label>
                        <input type="file" name="file" class="form-control" required="true" accept="image/gif, image/jpeg, image/png" /><br/>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm hình</button>
                    <a href="{{route('danhsachhinhproduct',$id_product)}}" type="reset" class="btn btn-danger">Quay về</a>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection
