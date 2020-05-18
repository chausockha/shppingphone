<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ; 
use App\User ;
use App\UserFavorite ;  
use DB;
class UserFavoriteController extends Controller
{
	public function index(){
		$userID = \Auth::id();
		// $favorite = UserFavorite::whereHas('product',function($query) use ($userID){
		//  	$query->where('uf_user_id',$userID);
		//  })->paginate(10);
		$product = Product::whereHas('favorite',function($query) use ($userID){
			$query->where('uf_user_id',$userID);
		})->select('id','pro_name','pro_category_id','pro_price','pro_avatar')->paginate(10);
		return view('home.favorite',compact('product'));
	}

	

    public function addFavorite(Request $re, $id){
    	if ($re->ajax()) {
    		//kt ton tai sp
    		$product = Product::find($id);
    		if (!$product) return response(['messages' =>'Không tồn tại sản phẩm']);
            
    		$messages = 'Thêm yêu thích thành công';
    		try{
    		\DB::table('user_favorite')->insert([
    			'uf_product_id'=>$id ,
    			'uf_user_id' => \Auth::id(),
    		]); 
    			}catch(\Exception $e){
    				$messages='Sản phẩm này đã được yêu thích';
    			}
    			return response(['messages'=>$messages]);
    	}
    } 
    public function deletefavorite($idfavorite){
    	
    	$favorite = UserFavorite::where('uf_product_id',$idfavorite);
    	
    	  $favorite->delete();
           $notification = array(
            'message' => 'Hủy thành công!',
            'alert-type' => 'success'
          );
    	return redirect()->back()->with($notification);
    }
}
