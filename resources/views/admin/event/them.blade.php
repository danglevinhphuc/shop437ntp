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
                            <small>Thêm sự kiện</small>
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
                        <form action="{{route('themevents')}}" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên sự kiện <span class="bat-buoc" >(*)</span></label>
                                <input type="text" class="form-control" name="ten" placeholder="Tên sự kiện...">
                            </div>
                            <div class="form-group">
                                <label> <span class="description" >Mô tả</span></label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                            <label> <span class="hinh" >Hình đại diện</span></label>
                            <input type="file" name="file" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm sự kiện</button>
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