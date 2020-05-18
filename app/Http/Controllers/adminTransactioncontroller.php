<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Transaction;
class adminTransactioncontroller extends Controller
{
    public function donhang(Request $request){
       //dd($request->all());
        $transaction = Transaction::whereRaw(1);
         $transaction = Transaction::with('user:id,name,email');
        // if($email = $request->email)
        //  $user= User::where('email','like','%'.$email.'%');
        //     $transaction->where('tr_user_id',$user->id);
            
        
            if($request->id) $transaction->where('id',$request->id);
        if( $status= $request->status) $transaction->where('tr_status',$status);
    	$transaction =$transaction->orderByDesc('id')->paginate(5);
        $query = $request->query();
    	return view('admin.donhang',compact('transaction','query'));
    	
    }
    public function viewOrder(Request $request,$id){
    	if ($request->ajax()) {
    		$orders = Order::with('product:id,pro_name,pro_avatar')->where('or_transaction_id',$id)->get();
    		$html = view('component.order',compact('orders'))->render();
    		return \response()->json($html);
    	}

    }
    public function delete($id){
        $transaction=transaction::find($id);
        $transaction->delete();
          $notification = array(
                'message' => 'Đã xóa thành công',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
        
    }
    public function actionTransaction( $action , $id){

        $transaction = transaction::find($id);
        if (isset($transaction)) {
            
      
        $orders = Order::where('or_transaction_id',$id)->get();
        if ($orders) {
            foreach($orders as $order) 
            
        //tăng biến pay sản phẩm
                $product = product::find($order->or_product_id);
            //Trừ đi số lượng sản phẩm
               
                $product->save();
        }
        //xử lý trạng thái đơn hàng
        switch ($action) {
            case 'process':
                    $transaction->tr_status= 2;
                    break;
             case 'success':
                   
                   if( $order->or_qty > $product->pro_number){
                     $notification = array(
                'message' => ' Số lượng sản phẩm không đủ ',
                'alert-type' => 'warning'
                     );
                return redirect()->back()->with($notification);
                }else {
                   $transaction->tr_status = 3;
                    $product->pro_number = $product->pro_number - $order->or_qty;
                    $product->pro_pay ++;
                    $product->save();
                break;  
                }
                    
                
                
                
            case 'cancel':
                   $transaction->tr_status = -1;
                    break;    
               
        }
         //$transaction->tr_status= transaction::STATUS_DONE;
        //update user 
        \DB::table('user')->where('id',$transaction->tr_user_id)->increment('total_pay');
         $transaction->save();
        $notification = array(
                'message' => ' Xử lý thành công ',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
       
      
        }
    }


}
