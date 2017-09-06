<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Hinhproduct;
use App\Events;
class ProductsController extends Controller
{
    //
	public function getDanhsach(){
		$product = Products::all();
		return view("admin.product.danhsach",compact('product'));
	}
	public function getThem(){
		$category = Category::all();
		$events = Events::all();
		return view("admin.product.them",compact('category','events'));
	}
	public function postThem(Request $req){
    	// ta co max_id
    	// khi tao sp moi hinh dk them thi se tang len 1
		$max_id = 0;
		$check = 0;
		$this->validate($req,
			[
			'ten' => 'required',
			'category' => 'required',
			'description' => 'required',
			'unit_price' => 'required|min:0',
			'promotion_price' => 'min:0'
			],
			[
			'ten.required' => 'Bạn chưa nhập tên cho sản phẩm',
			'category.required' => 'Bạn chưa chọn danh mục cho sản phẩm',
			'description.required' => 'Bạn chưa nhập mô tả cho sản phẩm',
			'unit_price.required' => 'Bạn chưa nhập giá góc cho sản phẩm',
			'unit_price.min'=>'Giá góc không được âm ',
			'promotion_price.min' => "Giá khuyến mãi không được âm"
			]);
		// luc dau thi them san pham truoc
		// tat co check = 0 
		// khi them san pham thanh cong thi bat co check =1
		if($check == 0){
			$productnew = new Products();
			$productnew->ten = $req->ten;
			$productnew->id_category = $req->category;
			$productnew->id_categorychild = $req->categorychild;
			$productnew->description = $req->description;
			$productnew->unit_price = $req->unit_price;
			$productnew->id_event = $req->event;
			if($req->promotion_price == null){
				$productnew->promotion_price = 0;
			}else{
				$productnew->promotion_price = $req->promotion_price;
			}
			$productnew->new = $req->new;
			$productnew->save();
			// lay max id de gan vao gia tri khoa ngoai cho hinh san pham
			$product = Products::find(Products::max('id'));
			$max_id =$product->id;
			$check = 1;
		}
		// thuc hien thao tac them img
		// check ton tai file khong
		if($req->hasFile('file') && $check== 1){
			echo "maxhinh".$max_id;
			foreach ($req->file as $key) {
    			# code...
				$filename = $key->getClientOriginalName("file");
				$Hinh = str_random(4)."_".$filename;
				$key->storeAs(
    				'upload/product',// vi tri luu
    				$Hinh
    				);
				$producthinh = new Hinhproduct();
				$producthinh->id_product = (int)($max_id);
				$producthinh->hinh= $Hinh;
				$producthinh->save();
			}
			$check = 0;
		}	
		return redirect()->back()->with("thanhcong","Thêm sản phẩm thành công");
	}
	public function getSua($id){
		$product = Products::find($id);
		$category= Category::all();
		$events = Events::all();
		return view("admin.product.sua",compact('product','category','events'));
	}
	public function postSua(Request $req,$id){
		$this->validate($req,
			[
			'ten' => 'required',
			'category' => 'required',
			'description' => 'required',
			'unit_price' => 'required|min:0',
			'promotion_price' => 'min:0'
			],
			[
			'ten.required' => 'Bạn chưa nhập tên cho sản phẩm',
			'category.required' => 'Bạn chưa chọn danh mục cho sản phẩm',
			'description.required' => 'Bạn chưa nhập mô tả cho sản phẩm',
			'unit_price.required' => 'Bạn chưa nhập giá góc cho sản phẩm',
			'unit_price.min'=>'Giá góc không được âm ',
			'promotion_price.min' => "Giá khuyến mãi không được âm"
			]);
		$productnew =Products::find($id);
		$productnew->ten = $req->ten;
		$productnew->id_category = $req->category;
		$productnew->id_categorychild = $req->categorychild;
		$productnew->description = $req->description;
		$productnew->unit_price = $req->unit_price;
		$productnew->id_event = $req->event;
		if($req->promotion_price == null){
			$productnew->promotion_price = 0;
		}else{
			$productnew->promotion_price = $req->promotion_price;
		}
		$productnew->new = $req->new;
		$productnew->save();
		return redirect()->back()->with("thanhcong","Sửa sản phẩm thành công | Bạn có thể sửa tiếp tục hình ảnh của sản phẩm");
	}
	public function getXoa($id){
		$product = Products::find($id);
		$product->delete();
		return redirect()->back()->with("thanhcong","Xoá sản phẩm thành công");
	}
}
