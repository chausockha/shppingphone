<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Transaction;
use Hash;
class adminUsercontroller extends Controller
{
    public function user(Request $request){
    	$user = User::whereRaw(1);
    	$user = $user->orderBy('id','DESC')->paginate(10);

    	return view('admin.thanhvien',compact('user'));
    }
     public function delete($id){
                     $user = User::find($id); 
 					$user->delete();
            $notification = array(
                'message' => ' Xóa thành công ',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);       
                
}	
	public function update(){
		$user =	User::find(get_data_user('web'));
		return view('home.infor',compact('user'));
	}
	public function post_update(Request $request){
		$user = User::where('id',get_data_user('web'))->update($request->except('_token'));
		 $notification = array(
                'message' => ' Cập nhật thông tin thành công ',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
		
	}

	public function updatepw(){
		return view('home.updatepw');
	}
	public function post_updatepw(Request $request){
		$this->validate($request,[
            'password_old' =>'required',
            'password' => 'required',
            
            'password_confirm'=>'required|same:password',
            
        ],
          [
            'password_old.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'password_confirm.same' =>'Mật khẩu nhập lại không đúng',
            'password_confirm.required'=>'Không được để trống',
        ]);
		if (Hash::check($request->password_old,get_data_user('web','password'))) {
			$user =User::find(get_data_user('web'));
			$user->password = bcrypt($request->password);
			$user->save();
			 $notification = array(
                'message' => ' Cập nhật thành công ',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
			
		}
		 $notification = array(
                'message' => ' Mật khẩu không đúng',
                'alert-type' => 'error'
                     );
                return redirect()->back()->with($notification);
		

	}
	
}
