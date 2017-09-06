<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/** FILE NOT FOUND **/

/** ROUTE CLIENT **/
Route::get('/',function(){
	return redirect()->route('trangchu');
});
Route::get('trangchu',['as'=>'trangchu','uses'=>'ClientController@index']);
Route::get('danhmuc/{slug}',['as'=>'danhmuc','uses'=>'ClientController@danhmuc']);
Route::get('loaisanpham/{slug}',['as'=>'loaisanpham','uses'=>'ClientController@loaisanpham']);
Route::get('sukien',['as'=>'sukien','uses'=>'ClientController@sukien']);
Route::get("san-pham-su-kien/{slug}",['as'=>'sanphamsukien','uses'=>'ClientController@sanphamsukien']);
Route::get('chitiet/{id}',['as'=>'chitiet','uses'=>'ClientController@chitiet']);
Route::get("tim",['as'=>'tim','uses'=>'ClientController@getTim']);
Route::get("dangnhap",['as'=>'dangnhap','uses'=>'ClientController@getDangnhap']);
Route::post("dangnhap",['as'=>'dangnhap','uses'=>'ClientController@postDangnhap']);
Route::get("dangxuat",['as'=>'dangxuat','uses'=>'ClientController@dangxuat']);
Route::get("gioithieu",['as'=>'gioithieu','uses'=>'ClientController@gioithieu']);
Route::get("tuyendung",['as'=>'tuyendung','uses'=>'ClientController@tuyendung']);
// load du lieu tung loai san pham cho index gia tri dau vao id_category
Route::get("loadProduct/{id}",['as'=>'loadProducts','uses'=>'ClientController@loadProducts']);
// load hinh anh tung loai san pham cho index gia tri dau vao id_category
Route::get("loadHinh/{id}",['as'=>'loadHinh','uses'=>'ClientController@loadHinh']);
/**END ROUTE CLIENT **/
/*** ĐIỀU HƯỚNG ADMIN **/
Route::get('admin',function(){
	return redirect()->route('danhsachproducts');
});
/***END ĐIỀU HƯỚNG ADMIN**/
/** ROUTE ADMIN OR DRASHBOARD **/
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	Route::group(['prefix'=>'category'],function(){
		//admin/category/danhsach
		Route::get('danhsach',['as'=>'danhsachcategory','uses'=>'CategoryController@getDanhsach']);

		//admin/category/them
		Route::get('them',['as'=>'themcategory','uses'=>'CategoryController@getThem']);
		// them post category
		Route::post('them',['as'=>'themcategory','uses'=>'CategoryController@postThem']);
		//admin/category/sua
		Route::get('sua/{id}',['as'=>'suacategory','uses'=>'CategoryController@getSua']);
		Route::post('sua/{id}',['as'=>'suacategory','uses'=>'CategoryController@postSua']);
		//delete category
		Route::get('xoa/{id}',['as' => 'xoacategory','uses' => 'CategoryController@getXoa']);
	});
	Route::group(['prefix'=>'categorychild'],function(){
		//admin/category/danhsach
		Route::get('danhsach/{id}',['as'=>'danhsachcategorychild','uses'=>'CategorychildController@getDanhsach']);

		//admin/category/them
		Route::get('them/{id}',['as'=>'themcategorychild','uses'=>'CategorychildController@getThem']);
		// them post category
		Route::post('them',['as'=>'themcategorychild','uses'=>'CategorychildController@postThem']);
		//admin/category/sua
		Route::get('sua/{id}',['as'=>'suacategorychild','uses'=>'CategorychildController@getSua']);
		Route::post('sua/{id}',['as'=>'suacategorychild','uses'=>'CategorychildController@postSua']);
		//delete category
		Route::get('xoa/{id}',['as' => 'xoacategorychild','uses' => 'CategorychildController@getXoa']);
		// getajax gia tri neu co ton tai khoa ngoai cua category
		Route::get("loaisanpham/{id}",['as' => 'getloaisanpham','uses' => 'CategorychildController@getLoaisanpham']);
	});
	Route::group(['prefix'=>'slide'],function(){
		//admin/slide/danhsach
		Route::get('danhsach',['as'=>'danhsachslide','uses'=>'SlideController@getDanhsach']);
		//admin/category/them
		Route::get('them',['as'=>'themslide','uses'=>'SlideController@getThem']);
		// them post category
		Route::post('them',['as'=>'themslide','uses'=>'SlideController@postThem']);
		//admin/category/sua
		Route::get('sua/{id}',['as'=>'suaslide','uses'=>'SlideController@getSua']);
		Route::post('sua/{id}',['as'=>'suaslide','uses'=>'SlideController@postSua']);
		//delete category
		Route::get('xoa/{id}',['as' => 'xoaslide','uses' => 'SlideController@getXoa']);
	});
	Route::group(['prefix'=>'products'],function(){
		//admin/slide/danhsach
		Route::get('danhsach',['as'=>'danhsachproducts','uses'=>'ProductsController@getDanhsach']);
		//admin/category/them
		Route::get('them',['as'=>'themproducts','uses'=>'ProductsController@getThem']);
		// them post category
		Route::post('them',['as'=>'themproducts','uses'=>'ProductsController@postThem']);
		//admin/category/sua
		Route::get('sua/{id}',['as'=>'suaproducts','uses'=>'ProductsController@getSua']);
		Route::post('sua/{id}',['as'=>'suaproducts','uses'=>'ProductsController@postSua']);
		// sua hinh anh 
		Route::get('suahinh/{id}',['as'=>'suaproducthinh','uses'=>'ProductsController@getSuahinh']);
		Route::post('suahinh/{id}',['as'=>'suaproducthinh','uses'=>'ProductsController@postSuahinh']);
		//delete category
		Route::get('xoa/{id}',['as' => 'xoaproducts','uses' => 'ProductsController@getXoa']);
	});
	Route::group(['prefix'=>'events'],function(){
		//admin/slide/danhsach
		Route::get('danhsach',['as'=>'danhsachevents','uses'=>'EventsController@getDanhsach']);
		//admin/category/them
		Route::get('them',['as'=>'themevents','uses'=>'EventsController@getThem']);
		// them post category
		Route::post('them',['as'=>'themevents','uses'=>'EventsController@postThem']);
		//admin/category/sua
		Route::get('sua/{id}',['as'=>'suaevents','uses'=>'EventsController@getSua']);
		Route::post('sua/{id}',['as'=>'suaevents','uses'=>'EventsController@postSua']);
		Route::get('xoa/{id}',['as' => 'xoaevents','uses' => 'EventsController@getXoa']);
	});
	Route::group(['prefix'=>'users'],function(){
		//admin/user/danhsach
		Route::get('danhsach',['as'=>'danhsachuser','uses'=>'UsersController@getDanhsach']);
		//admin/user/xoa
		Route::get('xoa/{id}',['as'=>'xoauser','uses'=>'UsersController@getXoa']);
		//admin/user/sua
		Route::get('sua/{id}',['as'=>'suauser','uses'=>'UsersController@getSua']);
		Route::post('sua/{id}',['as'=>'suauser','uses'=>'UsersController@postSua']);
	});
	Route::group(['prefix'=>'hinhproduct'],function(){
		//admin/hinhproduct/danhsach
		Route::get('danhsach/{id}',['as'=>'danhsachhinhproduct','uses'=>'ProductshinhController@getDanhsach']);
		//admin/hinhproduct/them
		Route::get('them/{id}',['as'=>'themhinhproduct','uses'=>'ProductshinhController@getThem']);
		// them post hinhproduct
		Route::post('them/{id}',['as'=>'themhinhproduct','uses'=>'ProductshinhController@postThem']);
		//admin/hinhproduct/xoa
		Route::get('xoa/{id}',['as'=>'xoahinhproduct','uses'=>'ProductshinhController@getXoa']);
		//admin/hinhproduct/sua
		Route::get('sua/{id}',['as'=>'suahinhproduct','uses'=>'ProductshinhController@getSua']);
		Route::post('sua/{id}',['as'=>'suahinhproduct','uses'=>'ProductshinhController@postSua']);
	});
	Route::group(['prefix'=>'tuyendung'],function(){
		//admin/slide/danhsach
		Route::get('danhsach',['as'=>'danhsachtuyendung','uses'=>'TuyendungController@getDanhsach']);
		//admin/category/them
		Route::get('them',['as'=>'themtuyendung','uses'=>'TuyendungController@getThem']);
		// them post category
		Route::post('them',['as'=>'themtuyendung','uses'=>'TuyendungController@postThem']);
		//admin/category/sua
		Route::get('sua/{id}',['as'=>'suatuyendung','uses'=>'TuyendungController@getSua']);
		Route::post('sua/{id}',['as'=>'suatuyendung','uses'=>'TuyendungController@postSua']);
		Route::get('xoa/{id}',['as' => 'xoatuyendung','uses' => 'TuyendungController@getXoa']);
	});
});
/**END ROUTE ADMIN OR DRASHBOARD **/