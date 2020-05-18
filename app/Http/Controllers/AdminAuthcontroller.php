<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
class AdminAuthcontroller extends Controller
{
    public function getLogin(){
    	return view('admin.login');
    }
    public function postLogin(Request $request){
        // $email = $request['email'];
        // $password = $request['password'];
        // if (Auth::attempt(['email'=>$email,'password'=>$password])) {
        //     return redirect()->route('tongquan');
        // }else {
        //     return redirect()->back()->with('loi','Đăng nhập không thành công ');
        // }}
    
    public function Logout(){
        Auth::logout();
        return redirect()->route('tongquan');
    }
}
