<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorychild;
use App\Category;
class CategorychildController extends Controller
{
    //get danh sach Categorychild mà theo id của Category tu url
    public function getDanhsach($id){
    	$categorychild = Categorychild::where('id_category','=',$id)->get();
    	return view('admin.categorychild.danhsach',compact('categorychild'));
    }
    // get them Categorychild giao dien
    public function getThem($id){
    	$category = Category::find($id);
    	return view("admin.categorychild.them",compact('category'));
    }
    // them du lieu post cho categorychild
    public function postThem(Request $req){
    	$this->validate($req,
    		[
         'ten' => 'required'
         ],
         [
         'ten.required' => 'Bạn chưa đặt tên cho loại sản phẩm',
         ]);
        $count = Categorychild::where('ten','=',$req->ten)->count();
        if($count== 0){
            $categorychild = new Categorychild();
            $categorychild->ten = $req->ten;
            $categorychild->tenkhongdau= changeTitle($req->ten);
            $categorychild->id_category = $req->id_category;
            $categorychild->save();
            return redirect()->back()->with("thanhcong","Thêm loại sản phẩm thành công ");
        }else{
            return redirect()->back()->with("thatbai","Tên loại sản phẩm này đã tồn tại");
        }

    }
    public function getSua($id){
        $category = Categorychild::find($id);
        return view("admin.categorychild.sua",compact('category'));
    }
    public function postSua(Request $req,$id){
        $this->validate($req,
            [
            'ten' => 'required'
            ],
            [
            'ten.required' => 'Bạn chưa đặt tên cho loại sản phẩm'
            ]);
        $count = Categorychild::where('ten','=',$req->ten)->count();
        if($count ==0 ){
            $category =Categorychild::find($id);
            $category->ten = $req->ten;
            $category->tenkhongdau= changeTitle($req->ten);
            $category->save();
            return redirect()->back()->with("thanhcong","Sửa loại sản phẩm thành công ");
        }else{
           return redirect()->back()->with("thatbai","Tên loại sản phẩm này đã tồn tại");
       }

   }
   // Xoa categorychild theo id
    public function getXoa($id){
       $category = Categorychild::find($id);
       $category->delete();
       return redirect()->back()->with("thanhcong","Xoá danh mục thành công");
   }
   // lay loai san pham theo id_category khoa ngoai
   public function getLoaisanpham($id){
        $category = Categorychild::where('id_category','=',$id)->get();
        echo json_encode($category);
        /*foreach ($category as $tl) {
            # code...
            echo "<option value='".$tl->id."'>".$tl->ten."</option>";
        }*/
   }
}
