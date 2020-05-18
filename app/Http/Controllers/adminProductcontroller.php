<?php

namespace App\Http\Controllers;
use App\Category ;
use App\Product;
use Illuminate\Http\Request;

use Validator ; 
use Illuminate\Support\MessageBag ;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class adminProductcontroller extends Controller
{
    public function sanpham(request $request){
    		$product = product::with('category:id,c_name');
    		if($request->name) $product->where('pro_name','like','%'.$request->name.'%');
    		if($request->cate) $product->where('pro_category_id',$request->cate); 
    			$product = $product->orderByDesc('id')->paginate(10);
    		$category=category::all();
            $query = $request->query();
                return view('admin.sanpham',compact('product','category','query'));
            }

      //kiem tra sl trong kho 
      public function kt_sl(Request $request,$id){
            $sp = product::find($id);
            if($sp->pro_number == 0){
               $qty2= $sp->id; 
             $qty = product::Where('pro_number','0')->count('id');
             
             return \response([
                      'error' =>true,
                     'qty' =>$qty,
                        ]);
        }
         //kiem tra sl
            
        }

    public function themmoisanpham(){
    	$category = category::all();

    	return view('admin.themmoisanpham',compact('category'));
    }
    public function edit($id){
    	$product = product::find($id);
    	$category = category::all();
    	 // dd($product);
    	return view('admin.updatesanpham',compact('product','category'));
    }
    public function update(Request $request, $id){
    	$this->inserOrupdate($request,$id);
    	return redirect()->back();
    }
    public function delete_sanpham(Request $request,$action,$id){
                    if ($action) {
                     $product = product::find($id); 
                     switch ($action) {
                         case 'delete':
                               $product ->delete();
                             break;   
                         case 'active':
                               $product ->pro_active = $product->pro_active ? 0:1;
                             break;    
                         case 'hot':
                               $product ->pro_hot = $product->pro_hot ? 0:1;
                             
                             break;            
                     }
                     $product->save();
                 }
                 return redirect()->back();
             }
              public function delete($id){
                     $product = Product::find($id); 
                    $product->delete();
                   
                 return redirect()->back();
          
}
    
    public function store(Request $request){
            	$this->validate($request,
            		[ 
            			'pro_name'=>'required|unique:product,pro_name',
            			'pro_category_id'=>'required',
                        'pro_price'=>'required',
                        'pro_content'=>'required',
                        'pro_description'=>'required'
            		],
            		[
            			'required'=>'Không được để trống',
            			'unique'=>'Tên sản phẩm đã tồn tại'
            		]
            	);
                 $this->inserOrupdate($request );
                 // dd($request);
                  $notification = array(
                'message' => 'Thêm mới thành công',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
               

                    }
    public function inserOrupdate(request $request , $id=''){
    		$product = new product();
    		if($id) $product = product::find($id);

    		$product->pro_name =$request->pro_name;
            $product->pro_number = $request->pro_number;
    		$product->pro_category_id=$request->pro_category_id;
    		$product->pro_price = $request->pro_price;
    		$product->pro_sale = $request->pro_sale;
    		$product->pro_description = $request->pro_description;
    		$product->pro_content = $request ->pro_content;
    		$product->pro_title_seo =$product->pro_title_seo =$request->pro_title_seo? $request->pro_title_seo : $request->pro_name;
    		$product->pro_description_seo = $request->pro_description_seo; 
    		 if (isset($request->avatar)) {
            $fileName = $request->avatar;
            $product->pro_avatar=$fileName;
        }
    		$product->save();
    }
    public function updatesanpham(Request $request){
        $this->validate($request,
                    [ 
                        'pro_name'=>'required',
                        'pro_category_id'=>'required',
                        'pro_price'=>'required',
                        'pro_content'=>'required',
                        'pro_description'=>'required',
                        'pro_number'=>'required'
                    ],
                    [
                        'pro_description.required'=>'Không được để trống',
                        
                        'pro_name.required'=>'Không được để trống',
                        'pro_name.required'=>'Không được để trống',
                        'pro_price.required'=>'Không được để trống',
                        'pro_content.required'=>'Không được để trống',
                        'pro_number.required' =>'Không được để trống'
                    ]
                );
    	   $product = Product::find($request->id );
            
            $product->pro_number =$request->pro_number;
    	   	$product->pro_name =$request->pro_name;
    		$product->pro_category_id=$request->pro_category_id;
    		$product->pro_price = $request->pro_price;
    		$product->pro_sale = $request->pro_sale;
    		$product->pro_description = $request->pro_description;
    		$product->pro_content = $request ->pro_content;
    		$product->pro_title_seo =$product->pro_title_seo =$request->pro_title_seo? $request->pro_title_seo : $request->pro_name;
    		$product->pro_description_seo = $request->pro_description_seo; 
    		if (isset($request->avatar)) {
            $fileName = $request->avatar;
            $product->pro_avatar=$fileName;
        }
    		$product->save();
             $notification = array(
                'message' => 'Cập nhật thành công',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
    		
    }
}
