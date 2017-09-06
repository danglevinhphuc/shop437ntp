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
                <h1 class="page-header">Products
                    <small>Thêm thông tin và hình ảnh cho sản phẩm</small>
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
                <form action="{{route('themproducts')}}" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên sản phẩm: <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="ten" placeholder="Tên sản phẩm..." class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Chọn danh mục cho sản phẩm: <span class="bat-buoc" >(*)</span></label>
                        <select name="category" class="form-control" id='danhmucchange'>
                            @foreach($category as $category)
                               <option value="{{$category->id}}">{{$category->ten}}</option>  
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn loại cho sản phẩm: </label>
                        <select name="categorychild" class="form-control" id="loaisanpham" disabled="true">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm: <span class="bat-buoc" >(*)</span></label>
                        <textarea id="demo" class="ckeditor" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá góc: <span class="bat-buoc" >(*)</span></label>
                        <input type="number" name="unit_price" min="0" placeholder="Giá góc sản phẩm ..." class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mãi:</label>
                        <input type="number" name="promotion_price" placeholder="Giá khuyến mãi sản phẩm ..." class="form-control" min="0">
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm mới:</label><br/>
                        Có:<input type="radio" name="new" value="1" >
                        Không:<input type="radio" name="new" value="0" checked="true">
                    </div>
                    <div class="form-group">
                        <label>Sự kiện:</label><br/>
                        <select name="event" class="form-control" >
                            <option value="">***Chọn sự kiên***</option>
                                @foreach($events as $events)
                               <option value="{{$events->id}}">{{$events->ten}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Chọn hình: <span class="bat-buoc" >(*)</span></label>
                        <input type="file" name="file[]" class="form-control" multiple="true" required="true" accept="image/gif, image/jpeg, image/png" /><br/>
                        <div class="add_file"></div>
                        <button id="chon-them" type="button" class="btn btn-default">Chọn thêm hình</button>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                    <a href="{{route('danhsachproducts')}}" type="reset" class="btn btn-danger">Quay về</a>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection

        @section('script')
        <script type="text/javascript">
            $(document).ready(function(){
                $("#chon-them").on('click',function(){
                    $(".add_file").append('<input type="file" name="file[]" class="form-control" multiple="true" accept="image/gif, image/jpeg, image/png" /><br/>');
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                // check khi nguoi dung thay doi noi dung trong select
                $("#danhmucchange").on('change',function(){
                    var giatriId = $(this).val();
                    $.get('admin/categorychild/loaisanpham/'+giatriId,function(data){
                        if(data.length >2){
                            // chuyen du lieu ve json
                            var chuyenJson = JSON.stringify(JSON.parse(data),null,2);
                            // chuyen ve array de xuat
                            var changeArr = JSON.parse(chuyenJson);
                            for(var i = 0 ; i < changeArr.length ; i++){
                                $("#loaisanpham").append("<option value='"+changeArr[i]['id']+"'>"+changeArr[i]['ten']+"</option>");    
                            }
                            $('#loaisanpham').removeAttr("disabled");
                        }else{
                            $('#loaisanpham').html('');
                            $('#loaisanpham').attr('disabled','true');
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                // auto load de check danh sach loai san pham
                    var giatriId = $('#danhmucchange').val();
                    $.get('admin/categorychild/loaisanpham/'+giatriId,function(data){
                        if(data.length >2){
                            // chuyen du lieu ve json
                            var chuyenJson = JSON.stringify(JSON.parse(data),null,2);
                            // chuyen ve array de xuat
                            var changeArr = JSON.parse(chuyenJson);
                            for(var i = 0 ; i < changeArr.length ; i++){
                                $("#loaisanpham").append("<option value='"+changeArr[i]['id']+"'>"+changeArr[i]['ten']+"</option>");    
                            }
                            $("#loaisanpham").html(data);
                            $('#loaisanpham').removeAttr("disabled");
                        }else{
                            $('#loaisanpham').html('');
                            $('#loaisanpham').attr('disabled','true');
                        }
                    });
                });
        </script>
        @endsection