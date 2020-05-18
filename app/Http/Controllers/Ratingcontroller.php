<?php

namespace App\Http\Controllers;
use App\Rating;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Ratingcontroller extends Controller
{
    public function SaveRating(Request $request,$id){
    	if ($request->ajax() ) 
    	{
    		Rating::insert([
    			'ra_product_id' => $id,
    			'ra_number' =>$request->number,
    			'ra_content' =>$request->content,
    			'ra_user_id' =>get_data_user('web','id'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
    		]);
    		$product =  product::find($id);
    		$product->pro_total_number += $request->number;
    		$product->pro_total_rating +=1;
    		$product->save();
    		return \response()->json(['code'=>'1']);
    		
    	}
    }
    public function danhgia(){
        $rating = Rating::with('user:id,name','product:id,pro_name')->paginate(5);
        
        
        return view('admin.danhgia',compact('rating'));
    }
    public function delete($id){
        $rating= rating::find($id);
        $rating->delete();
        $notification = array(
                'message' => ' Xóa thành công ',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
       
    }
   

    
}
