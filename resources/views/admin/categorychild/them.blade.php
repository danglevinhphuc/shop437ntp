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
                        <h1 class="page-header">Type Product
                            <small>Thêm loại sản phẩm trong danh mục {{$category->ten}}</small>
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
                        <form action="{{route('themcategorychild')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id_category" value="{{$category->id}}">
                            <div class="form-group">
                                <label>Tên loại sản phẩm <span class="bat-buoc" >(*)</span></label>
                                <input type="text" class="form-control" name="ten" placeholder="Tên loại sản phẩm...">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm loại sản phẩm</button>
                            <a href="{{route('danhsachcategorychild',$category->id)}}" class="btn btn-danger">Quay về</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection