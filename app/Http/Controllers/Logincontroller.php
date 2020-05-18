<?php

namespace App\Http\Controllers;
use App\User;
use Mail;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  use Carbon\Carbon;
class Logincontroller extends Controller
{
    public function dangnhap(){
    	return view('home.login');
    }
    public function postdangnhap(Request $request){
        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required|unique:user',
             // 'password'=>'unique:user',
        ],
          [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' =>'Email không đúng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'password.unique'=>'Mật khẩu không đúng ',
        ]);
        $email = $request['email'];
        $password = $request['password'];
        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
         $notification = array(
            'message' => 'Đăng nhập thành công!',
            'alert-type' => 'success'
          );
           
            return redirect('index')->with($notification);
        }else {
            $notification = array(
            'message' => 'Đăng nhập không thành công!',
            'alert-type' => 'warning'
          );
            return redirect()->back()->with($notification);
            }
    		// $user = $request->only('email','password');
    		// if (Auth::attempt($user)) {
    		// 	return redirect()->route('index');
    		// }
    }
    public function Logout(){
    	Auth::logout();
        $notification = array(
            'message' => 'Đăng xuất thành thành công!',
            'alert-type' => 'success'
          );
    	return redirect()->route('index')->with($notification);
    }

     public function getformresetpassword(){
        return view('home.email');
    }
    public function postresetpassword(Request $request){
        $email = $request->email;
        $checkemail = User::where('email',$email)->first();
        if (!$checkemail) {
            $notification = array(
            'message' => 'Email không tồn tại!',
            'alert-type' => 'error'
          );
            return redirect()->back()->with($notification);
        }
        $code = bcrypt(md5(time().$email));
       
        $checkemail->code=$code;
        $checkemail->time_code = Carbon::now();
        $checkemail->save();
        //  Mail::send('home.rest_password',$checkemail->toArray(), function($message) use($email){
        //     $message->to($email, 'Reset ')->subject('Lấy lại mật khẩu!');
        // });
        $url = route('getlinkresetpassword',['code'=>$checkemail->code,'email'=>$email]);
        $data = [
            'route'=>$url
        ];
         Mail::send('home.rest_password',$data,

            function ($message) use ($email) {
            $message->sender('cskha@gmail.com');
            $message->to($email)->subject('Lấy lại mật khẩu!');
            }
        );
          $notification = array(
            'message' => 'Link lấy lại mật khẩu đã được gửi vào email',
            'alert-type' => 'success'
          );
        return redirect()->back()->with($notification);
    }

    public function passwordreset(Request $request){
         $code = $request->code ; 
        $email = $request->email;
          //dd($request->all());
        $checkuser = User::where([
            'code' =>$code,
            'email'=>$email,
        ])->first();
        if (!$checkuser) {
            $notification = array(
            'message' => 'Xin lỗi !Đường dẫn lấy mật khẩu không đúng, bạn vui lòng thử lại sau',
            'alert-type' => 'error'
          );
             return redirect('/')->back()->with($notification);
         }
          // $checkuser->password = bcrypt($request->password);
          //   $checkuser->save();
          return view('home.reset',compact('checkuser'));

    }

    public function SaveResetPassword(Request $request)
    {
             $this->validate($request,[
            'password' =>'required',
            'password_confirm' => 'required|same:password',
            
        ],
          [
            'password.required' => 'Không được để trống',
            'password_confirm.required' => 'Không được để trống',
            'password_confirm.same' => 'Mật khẩu nhập lại không đúng',
            
        ]);
          //   dd($request->all());
          // $result = ResetPassword::where([
          //   $code = $request->code,
          //   $email = $request->emaill,
          // ])->first();
           
            
        if ($request->password) {
            $code = $request->code;
            $email = $request->email;

            $checkuser = User::where([
            'code' =>$code,
            'email'=>$email,
        ])->first();

          

        if (!$checkuser) {
            $notification = array(
            'message' => 'Xin lỗi !Đường dẫn lấy mật khẩu không đúng, bạn vui lòng thử lại sau',
            'alert-type' => 'error'
          );
            return redirect()->back()->with($notification);
        }
        $checkuser->password = bcrypt($request->password);
            $checkuser->save();
            $notification = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'
          );
            return redirect()->route('dangnhap')->with($notification);
      }
     }
}
