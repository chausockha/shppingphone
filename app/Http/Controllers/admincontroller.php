<?php
use Path\To\Your\Log;
namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Rating;
use App\Transaction;
use App\Product;
use Illuminate\Support\MessageBag ;
use App\HelpersClass\Date;
class admincontroller extends Controller
{
    //DANH MỤC
         
            public function danhmuc(){
                $category = Category::select('id','c_name','c_title_seo','c_active','c_home')->get();
            	return view('admin.danhmuc',compact('category'));
            }

            public function edit_danhmuc($id){
                $category= category::find($id);
                return view('admin.updatedanhmuc',compact('category'));
            }
            public function updatedanhmuc(Request $request){
                $this->validate($request,
                    [ 
                        'name'=>'required',
                        'icon'=>'required',
                       'name'=>'unique:categories,c_name',

                        
                    ],
                    [
                        'name.required'=>'Không được để trống',
                        'name.unique'=>'Đã tồn tại'
                        
                    ]
                );
                $category= category::find($request->id);
                $category->c_name = $request->name;
                $category->c_icon =$request->icon;
                $category->c_title_seo =$request->c_title_seo? $request->c_title_seo : $request->name;
                $category->c_description_seo = $request->c_description_seo ;
                $category->save();
                  $notification = array(
                'message' => ' Cập nhật thành công ',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
              
            }
            public function inserOrupdate(Request $request, $id=''){
                $code = 1;
                try {
                    $category  = new category();
                    if($id){
                        $category = category::find('id');
                    }
                 
                $category->c_name = $request->name;
                $category->c_icon =$request->icon;
                $category->c_title_seo =$request->c_title_seo? $request->c_title_seo : $request->name;
                $category->c_description_seo = $request->c_description_seo ;
                $category->save();
                } catch (\Exception $e) {
                    $code  = 0 ;
                     Log::error("[Error inserOrupdate ]".$e->getMessage());
                }
                return $code;
                
                // return redirect()->back()->with('thanhcong','Thêm thành công');
            }

            public function themmoidanhmuc(){

            	return view('admin.themmoidanhmuc');
            }
            public function store(Request $request){
            	  $this->validate($request,
                    [ 
                        'name'=>'required',
                        'icon'=>'required',
                       'name'=>'unique:categories,c_name',

                        
                    ],
                    [
                        'name.required'=>'Không được để trống',
                        'name.unique'=>'Đã tồn tại',
                        'icon.required'=>'Không được để trống',
                        
                    ]
                );
                $this->inserOrupdate($request );
                 $notification = array(
                'message' => ' Thêm mới thành công ',
                'alert-type' => 'success'
                     );
                return redirect()->back()->with($notification);
               

                    }
            public function delete_danhmuc(Request $request,$action,$id){
                    if ($action) {
                     $category = Category::find($id); 
                     switch ($action) {
                          case 'active':
                               $category ->c_active = $category->c_active ? 0:1;
                             break;    
                         case 'hot':
                               $category ->c_hot = $category->c_hot ? 0:1;
                             break;  
                        case 'home':
                                $category ->c_home = $category->c_home ? 0:1;  
                                break;   
                     }
                     $category->save();
                 }         
              return redirect()->back();  
            }
             public function delete($id){
                     $category = Category::find($id); 
                    $category->delete();
                   
                 return redirect()->back();

}
          
             public function tongquan(){
                  $rating = Rating::with('user:id,name','product:id,pro_name')->limit(10)->get();
            
            //thống kê trạng thái đơn hàng
            //tiếp nhận
            $transactionDefault = Transaction::where('tr_status',1)->select('id')->count();
            //đang vẫn chuyển 
            $transactionprocess = Transaction::where('tr_status',2)->select('id')->count();
            //đã nhận hàng
            $transactionsuccess = Transaction::where('tr_status',3)->select('id')->count();
            //đã hủy
            $transactioncancel =Transaction::where('tr_status',-1)->select('id')->count();
            
            $statusTransaction = [
                ['hoàn tất', $transactionsuccess,false],
                ['đang vẫn chuyển', $transactionprocess,false],
                ['tiếp nhận', $transactionDefault,false],
                ['hủy bỏ', $transactioncancel,false],
            ];
          
            //thống kê ngày
            $moneyday = Transaction::whereDay('updated_at',date('d'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');

            //Thống kê tháng
            $moneymonth = Transaction::where('tr_status',3)
                ->whereMonth('created_at',date('m'))
                ->select(\DB::raw('sum(tr_total) as totalmoney'),\DB::raw('DATE(created_at) day'))
                ->groupBy('day')
                ->get()->toArray();
             // $moneymonth = Transaction::whereMonth('updated_at',date('m'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total'); 
            dd($moneymonth);
             $datamoney = [[
                "name" =>"Doanh thu ngày",
                "y" =>(int)$moneyday
             ],
             [
              "name" =>"Doanh thu tháng",
              "y" =>(int)$moneymonth
             ]];
            $transaction = Transaction::with('user:id,name')->limit(5)->orderBy('id','DESC')->get();
            //$soluongdonhang = Transaction::where('tr_user_id',get_data_user('web'))->select('id')->count('id');
            $sldh = Transaction::count('id');
            $product = Product::count('id');
            $ratings = Rating::count('id');
            $listDay = Date::getListDayInMonth();
            //dd($listDay);
             $viewdata= [
              'datamoney'=>json_encode($datamoney),
              'transaction' => $transaction,
              'product' =>$product,
              'sldh' =>$sldh,
              'ratings'=>$ratings,
              'listDay' => json_encode($listDay),
              // 'statusTransaction' => json_decode($statusTransaction),
            ] ;
         
         
             
           
           
        
            return view('admin.index',compact('rating'),$viewdata);
           }
}
