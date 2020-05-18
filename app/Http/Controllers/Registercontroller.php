<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class Registercontroller extends Controller
{
    public function dangky(){
    	return view('home.register');
    }
    public function postdangky(Request $request){
    	 $this->validate($request, [
        'name'=>'required',
        'password'=>'required|min:6|max:20',
        'pass'=>'required|same:password',
        'email'=>'required|email|unique:user,email',
        'phone'=>'required|min:10', 
    ],
     [
        'name.required'=>'vui lòng nhập họ tên',
        'password.required'=>'vui lòng nhập mật khẩu',
        'password.min'=>'mật khẩu phải có 6 kí tự ',
        'pass.required'=>'nhập lại mật khẩu',
        'repassword.same'=>'mật khẩu nhập lại không đúng',
         'email.required'=>'vui lòng nhập email',
         'email.email'=>'email không đúng định dạng',
         'email.unique'=>'email đã tồn tại',
         'phone.required'=>'vui lòng nhập số điện thoại',
         'phone.min'=>'số điện thoại phải có 10 kí tự',
    ]);
    	 $user = new User();
    	 $user->name = $request->name;
    	 $user->phone = $request->phone;
    	 $user->email = $request->email;
         $user->address= $request->address;
    	 $user->password = bcrypt($request->password) ;
    	 
    	 $user->save();
    	 if ($user->id) {
              $notification = array(
                'message' => 'Đăng ký thành công',
                'alert-type' => 'success'
                     );
    	 	return redirect()->route('dangnhap')->with($notification);
    	 }

    	 return redirect()->back();
    }
}
