<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
class EventsController extends Controller
{
    //
     //
    public function getDanhsach(){
    	$category = Events::all();
    	return view("admin.event.danhsach",compact('category'));
    }
    public function getThem(){
    	return view("admin.event.them");
    }
    public function postThem(Request $req){
    	$this->validate($req,
    		[
         'ten' => 'required'
         ],
         [
         'ten.required' => 'Bạn chưa đặt tên cho danh mục sản phẩm'
         ]);
        $count = Events::where('ten','=',$req->ten)->count();
        if($count== 0){
            $category = new Events();
            $category->ten = $req->ten;
            $category->tenkhongdau= changeTitle($req->ten);
            $category->description = $req->description;
            // check ton tai file khong
            if($req->hasFile('file')){
                # code...
                $key =$req->file;
                $filename = $key->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;
                $key->storeAs(
                    'upload/event',// vi tri luu
                    $Hinh
                    );
                $category->hinh= $Hinh;
            }   
            $category->save();
            return redirect()->back()->with("thanhcong","Thêm sự kiện thành công ");
        }else{
            return redirect()->back()->with("thatbai","Tên sự kiện này đã tồn tại");
        }
    }
    public function getSua($id){
        $category = Events::find($id);
        return view("admin.event.sua",compact('category'));
    }
    public function postSua(Request $req,$id){
        $this->validate($req,
            [
            'ten' => 'required'
            ],
            [
            'ten.required' => 'Bạn chưa đặt tên cho danh mục sản phẩm'
            ]);
        $count = Events::where('ten','=',$req->ten)->count();
        if($count ==0 ){
            $category =Events::find($id);
            $category->ten = $req->ten;
            $category->tenkhongdau= changeTitle($req->ten);
            $category->description = $req->description;
            // check ton tai file khong
            if($req->hasFile('file')){
                # code...
                $key =$req->file;
                $filename = $key->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;
                $key->storeAs(
                    'upload/event',// vi tri luu
                    $Hinh
                    );
                $category->hinh= $Hinh;

            }   
            $category->save();
            return redirect()->back()->with("thanhcong","Sửa danh mục thành công ");
        }else{
           return redirect()->back()->with("thatbai","Tên danh mục này đã tồn tại");
       }
   }
   public function getXoa($id){
       $category = Events::find($id);
       $category->delete();
       return redirect()->back()->with("thanhcong","Xoá danh mục thành công");
   }
}
