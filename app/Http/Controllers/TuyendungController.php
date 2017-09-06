<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tuyendung;
class TuyendungController extends Controller
{
    //
    public function getDanhsach(){
    	$tuyendung = Tuyendung::all();
    	return view("admin.tuyendung.danhsach",compact('tuyendung'));
    }
    public function getThem(){
    	return view("admin.tuyendung.them");
    }
    public function postThem(Request $req){
    	$this->validate($req,
            [
            'description' => 'required'
            ],
            [
            'description.required' => 'Bạn chưa nhập mô tả cho tin tuyển dụng'
            ]);
    	$tuyendung = new Tuyendung();
        $tuyendung->title = $req->ten;
        $tuyendung->titlekhongdau= changeTitle($req->ten);
        $tuyendung->description = $req->description;
        $tuyendung->save();
        return redirect()->back()->with("thanhcong","Thêm tin tuyển dụng mới thành công ");
    }
    public function getSua($id){
		$tuyendung = Tuyendung::find($id);
		return view("admin.tuyendung.sua",compact('tuyendung'));
	}
	public function postSua(Request $req,$id){
        $this->validate($req,
            [
            'description' => 'required'
            ],
            [
            'description.required' => 'Bạn chưa nhập mô tả cho tin tuyển dụng'
            ]);
            $tuyendung =Tuyendung::find($id);
            $tuyendung->title = $req->ten;
        	$tuyendung->titlekhongdau= changeTitle($req->ten);
        	$tuyendung->description = $req->description;
        	$tuyendung->save();
            // check ton tai file khong
            $tuyendung->save();
            return redirect()->back()->with("thanhcong","Sửa tin tuyển dụng thành công ");
   }
   public function getXoa($id){
       $tuyendung = Tuyendung::find($id);
       $tuyendung->delete();
       return redirect()->back()->with("thanhcong","Xoá tin tuyển dụng thành công");
   }
}
