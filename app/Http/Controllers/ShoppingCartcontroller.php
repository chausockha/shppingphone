<?php

namespace App\Http\Controllers;
 use Cart;
  use Shoppingcart;
  use App\Order;
  use Carbon\Carbon;
  use App\Transaction;
use Illuminate\Http\Request;
use App\Product ; 
use toastr;
use Illuminate\Support\Facades\Auth;
// use Gloudemans\Shoppingcart\Contracts\Buyable;
class ShoppingCartcontroller extends Controller
{
    public function addproduct(Request $request, $id){
    		$product = product::select('id','pro_name','pro_price','pro_sale','pro_avatar','pro_number')->find($id);
    		if (!$product) return redirect('/');
    		$price = $product->pro_price;
    		if ($product->pro_sale) 
    			$price = $price *(100 - $product->pro_sale )/100;
        //kiểm tra số lượng
    		  if ($request->ajax()) {
            $product = Product::find($id);

           if ($product->pro_number == 0 ) {
                return \response([
                      'error' =>true ,
                        ]);
            }else{ Cart::add([
                
         'id' => $id,
         'name' => $product->pro_name, 
         'quantity' => 1, 
         'price' =>$price, 
         'attributes' => array('avatar' => $product->pro_avatar,
                    'sale'=>$product->pro_sale,
                    'price_old' => $product->pro_price,)
        ]);
                    return \response(['messages1'=>'Thêm giỏ hàng thành công ',
                    
                        ]);
          }
          }
            
      //       if(isset($id)){
    		// Cart::add([
                
    		//  'id' => $id,
    		//  'name' => $product->pro_name, 
    		//  'quantity' => 1, 
    		//  'price' =>$price, 
    		//  'attributes' => array('avatar' => $product->pro_avatar,
    		//  						'sale'=>$product->pro_sale,
    		//  						'price_old' => $product->pro_price,)
    		// ]);
        
    		}
      //   $notification = array(
      //       'message' => 'Mua hàng thành công!',
      //       'alert-type' => 'success'
      //     );
    		// return redirect()->back()->with($notification);
        

    //}
    public function getlistShopingcart(){

    	 $product = Cart::getcontent();
    	return view('home.cart',compact('product'));
    }

   

        public function updateCart(Request $request, $key){
            if ($request->ajax()) {
                //lấy tham số 
                $quantity = $request->qty ??1;
               $idproduct = $request->idproduct;
               $productid = product::find($request->idproduct);
               //kiểm tra tồn tại sp
               if(!$productid) return \response(['messages'=>'không tồn tại sản phẩm cần update']);
               //kt số lượng sp
               if($productid->pro_number <  $quantity){

                     return \response(['messages'=>'số lượng cập nhật không đủ',
                      'error' =>true ,
                        ]);
                 }
                 Cart::update($key, array(   
                   'quantity' =>  $quantity , 
                  
                  ));
                return \response(['messages' =>'Cập nhật thành công ',
                                  'totalItem' => number_format($productid->pro_price * $quantity,0,',','.' ),
                                  'totalmoney' =>\Cart::getSubTotal(0),
                                   ]);

            
            
        }}
  
              
    
    public function getFormpay(){
    	$product = Cart::getcontent();
    	return view('home.pay',compact('product'));
    }
    public function delete(Request $re,$id){
      if ($re->ajax()) {
        // $id= $re->id;
        \Cart::remove($id);
        return response(['messages'=>'Xóa thành công']);
      }
    }
    public function saveinfoshoppingcart(Request $request){
    	$totalmoney =str_replace(',','', \Cart::getSubTotal(0,3)) ;
    	// dd($totalmoney);
      $tr_status = 1 ;
    	$transaction = Transaction::insertGetId([
    			'tr_user_id'=> get_data_user('web','id'),
    			'tr_total'  => (int)$totalmoney,
    			'tr_note'   => $request->note,
          'tr_status' =>$tr_status,
    			'tr_address'   => $request->address,
    			'tr_phone'   => $request->phone,
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
    	]);
    	if ($transaction) {
    		$product = Cart::getcontent();
    		foreach($product as $value){
    			Order::insert([
    				'or_transaction_id'=>$transaction,
    				'or_product_id'=> $value->id,
    				'or_qty' =>$value->quantity,
    				'or_price' =>$value->attributes->price_old,
    				'or_sale' =>$value->attributes->sale,
    			]);
    		}
    	}
       $notification = array(
            'message' => 'Thanh toán thành công ',
            'alert-type' => 'success'
          );
    	\Cart::clear();
    	return redirect()->route('index')->with($notification);
    }
}
