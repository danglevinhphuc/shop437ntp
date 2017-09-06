<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    //
    public function getDanhsach(){
    	$user = User::all();
    	return view('admin.user.danhsach',compact('user'));
    }
    public function getXoa($id){
    	$user = User::find($id);
    	$user->delete();
		return redirect()->back()->with("thanhcong","Xóa user thành công");
    }
    public function getSua($id){
        $user = User::find($id);
        return view("admin.user.sua",compact("user"));
    }
    public function postSua(Request $req,$id){
        $this->validate($req,
            [
                'name' => 'required',
                'email' => 'required',
                'password'=>'required|min:5'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên',
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Mật khẩu bạn chưa nhập',
                'password.min' => 'Mật khẩu phải lớn hơn 5 ký tự'
            ]);
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->back()->with("thanhcong","Tạo tài khoản thành công");
    }
}
