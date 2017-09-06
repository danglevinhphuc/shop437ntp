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
                <h1 class="page-header">Category
                    <small>Sửa hình ảnh cho slider</small>
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
                
                <form action="{{route('suauser',$user->id)}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                   <div class="form-group">
                        <label>Tên <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="name" class="form-control" required="true" value="{{$user->name}}" /><br/>
                    </div>
                    <div class="form-group">
                        <label>Email <span class="bat-buoc" >(*)</span></label>
                        <input type="email" name="email" class="form-control" required="true" value="{{$user->email}}" /><br/>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới <span class="bat-buoc" >(*)</span></label>
                        <input type="password" name="password" class="form-control" required="true" value="" /><br/>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa tài khoản</button>
                    <a href="{{route('danhsachuser')}}" type="reset" class="btn btn-danger">Quay về</a>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection
