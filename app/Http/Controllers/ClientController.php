<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Categorychild;
use App\Events;
use App\Hinhproduct;
use App\Tuyendung;
class ClientController extends Controller
{
    //
    public function index(){
    	$products_nomally=  Products::where('new','=',1)->orderBy('id', 'desc')
        ->limit(16)->get();
        $category = Category::all();
        $category_name = Category::all();
        $products_name = Products::orderBy('id', 'desc')->get();
        return view("client.page.index",compact('category','products_nomally','category_name','products_name'));
    }
    // tao 1 ham dung de xu ly khi co gia tri dau vao la category name
    // gioi han 8 loai san pham
   public function loadProducts($id){
    $products = Products::where('id_category','=',$id)->orderBy('id', 'desc')
    ->limit(8)->get();
    foreach ($products as $products) {
        $label_sale = "";
        $price = 0;
        $nameHinh = "";
        // lay thong bao giam gia
        if($products->promotion_price != null && $products->promotion_price != 0.00){
            $label_sale= '<span class="label label-sale">Sale</span>';
        }else{
            $label_sale = "";
        }
        // lay gia san pham
        if($products->promotion_price == null || $products->promotion_price == 0.00){
            $price =$products->unit_price;
        }else{
            $price = $products->promotion_price;
        }
        // lay ten hinh
        foreach ($products->hinhproduct as $hinh) {
            $nameHinh = $hinh->hinh;
            break;
        }
       echo  '<div class="col-md-3">'.
       '<div   class="item product-inner wow bounceIn">'.
       '<div class="item-inner transition">'.
       $label_sale.
       '<div class="image">'.
       '<a class="lt-image" href="chitiet/'.$products->id.'" target="_self" title="">'.
        '<img  src="storage/app/upload/product/'.$nameHinh.'" class="img-1 product-featured-image" alt="'.$products->ten.'" >'.
        '<img  src="storage/app/upload/product/'.$nameHinh.'" class="img-2 product-featured-image" alt="'.$products->ten.'" >'.
       '</a>'.
       '<div class="button-group">'.
       '<div class="button-group">'.
       '<form action="chitiet/'.$products->id.'" method="get">'.
       '<button type="submit" style="margin-left: 0px auto;" type="button"  class="button btn-cart btn-add-to-cart" data-toggle="tooltip" title="Xem"><span><i class="fa fa-eye" aria-hidden="true" ></i></span></button>'.
       '</form>'.
       '</div> '.
       '</div> '.
       '</div>'.
       '<div class="caption">'.
       '<h4>'.
       '<a href="chitiet/'.$products->id.'" title="'.$products->ten.'" target="_self">'.
       $products->ten.
       '</a>'.
       '</h4>'.
       '<p class="price">'.
       '<span class="price-new">'.
       $price.
       "₫".
       '</span>'.
       '</p>'.
       '</div>     '.
       '</div> '.
       '</div> '.
       '</div>';
   }
   
}
public function danhmuc($slug){
 $category = Category::where('tenkhongdau','=',$slug)->get();
 $id = $category[0]->id;
 $products=  Products::where('id_category','=',$id)->orderBy('id', 'desc')
 ->paginate(15);
 return view("client.page.danhmuc",compact('products','category'));
}
public function loaisanpham($slug){
 $category = Categorychild::where('tenkhongdau','=',$slug)->get();
 $id = $category[0]->id;
 $products=  Products::where('id_categorychild','=',$id)->orderBy('id', 'desc')
 ->paginate(15);
 return view("client.page.loaisanpham",compact('products','category'));
}
public function sukien(){
    $events = Events::orderBy('id', 'desc')
    ->paginate(5);
    $categorys = Category::all();                
    return view("client.page.sukien",compact('events','categorys'));
}
public function sanphamsukien($slug){
    $event = Events::where("tenkhongdau",'=',$slug)->get();
    $id = $event[0]->id;
    $ten = $event[0]->ten;
    $products = Products::where("id_event","=",$id)->orderBy('id', 'desc')
    ->paginate(15);
    return view("client.page.sanphamsukien",compact('ten','products'));   
}
public function chitiet($id){
    $product = Products::find($id);
    $id_category = $product->id_category;
    $product_lienquan = Products::where([
        ['id_category', '=', $id_category],
        ['id', '!=', $id]
        ])->orderBy('id', 'desc')->limit(5)->get();
    return view("client.page.chitietsanpham",compact('product',"product_lienquan"));
}
public function getTim(Request $req){
    $value = $req->get('q');
    $ten = $value;
    $products = Products::where('ten','like','%'.$value.'%')->orderBy('id', 'desc')->paginate(15);
    if(count($products) >0){
        return view('client.page.tim',compact('ten','products'));    
    }else{
        return redirect()->back()->with("thanhcong","Không tìm thấy sản phẩm");
    }
}
public function getDangnhap(){
    return view("client.page.dangnhap");
}
public function postDangnhap(Request $req){
    $this->validate($req,
        [
        'email' => 'required',
        'password'=>'required|min:5'
        ],
        [
        'email.required' => 'Bạn chưa nhập email',
        'password.required' => 'Mật khẩu bạn chưa nhập',
        'password.min' => 'Mật khẩu phải lớn hơn 5 ký tự'
        ]);
    $email = $req->email;
    $password= $req->password;
    if(Auth::attempt(['email' => $email,'password'=>$password])){
        return redirect()->route('trangchu');
    }else{
        return redirect()->back()->with("thanhcong","Đăng nhập thất bại");
    }
}
    // dang xuat 
public function dangxuat(){
    Auth::logout();
    return redirect()->route('dangnhap');
}
    // gioi thieu
public function gioithieu(){
    return view("client.page.gioithieu");
}
  // Tuyendung
public function tuyendung(){
   $tuyendung = Tuyendung::orderBy('id', 'desc')->paginate(5);
   return view("client.page.tuyendung",compact('tuyendung')); 
}
}
