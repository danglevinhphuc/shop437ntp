<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hinhproduct;
use App\Products;
class ProductshinhController extends Controller
{
    public function getDanhsach($id){
        $id_product = $id;
        $hinhproduct = Hinhproduct::where('id_product','=',$id)->get();
        return view("admin.hinhproduct.danhsach",compact('hinhproduct','id_product'));
    }
    public function getThem($id){
        $id_product = $id;
        return view("admin.hinhproduct.them",compact('id_product'));   
    }
    public function postThem(Request $req,$id){
        if($req->hasFile('file')){
                # code...
            $file = $req->file("file");
            $filename = $file->getClientOriginalName("file");
            $Hinh = str_random(4)."_".$filename;
            $file->storeAs(
                    'upload/product',// vi tri luu
                    $Hinh
                    );
            $slide = new Hinhproduct();
            $slide->hinh=  $Hinh;
            $slide->id_product = $id;
            $slide->save();
            return redirect()->back()->with("thanhcong","Thêm hình thành công ");
        }   
    }
    public function getSua($id){
        $hinhproduct = Hinhproduct::find($id);
        return view("admin.hinhproduct.sua",compact('hinhproduct'));
    }
    public function postSua(Request $req,$id){
        if($req->hasFile('file')){
                # code...
            $hinhName = Hinhproduct::find($id);
            while(file_exists('storage/app/upload/product/'.$hinhName->hinh)){
                unlink('storage/app/upload/product/'.$hinhName->hinh);   
            }
            $file = $req->file("file");
            $filename = $file->getClientOriginalName("file");
            $Hinh = str_random(4)."_".$filename;
            $file->storeAs(
                    'upload/product',// vi tri luu
                    $Hinh
                    );
            $slide = Hinhproduct::find($id);
            $slide->hinh=  $Hinh;
            $slide->save();
            return redirect()->back()->with("thanhcong","Sửa hình thành công ");
        }   
    }
    public function getXoa($id){
        $slide = Hinhproduct::find($id);
        $slide->delete();
        return redirect()->back()->with("thanhcong","Xoá hình thành công");
    }
}
