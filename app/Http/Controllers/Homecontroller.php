<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Rating;
use App\Order;
use App\Transaction ;
use Illuminate\Http\Request;
use DB;
use App\Services\ProCessView; 
class Homecontroller extends Controller
{
    public function trangchu(){
    	$producthot  = product::where([
    		'pro_hot'=>product::HOT_ON,
    		'pro_active' => product::STATUS_PUBLIC
    	])->paginate(10);

       //kiểm tra người dùng đăng nhập
      if (get_data_user('web')) {
        $transaction = Transaction::where([
          'tr_user_id' =>get_data_user('web','id'),
          'tr_status' => Transaction::STATUS_DONE,
        ])->pluck('id');
        // dd($transaction);
        $productsuggest= [];
        if (!empty($transaction)) {
          $listid = Order::whereIn('or_transaction_id',$transaction)->distinct()->pluck('or_product_id');
          
          if (!empty($listid)) {
            $listidcategory = Product::whereIn('id',$listid)->distinct()->pluck('pro_category_id');
            if ($listidcategory) {
              $productsuggest = Product::whereIn('pro_category_id',$listidcategory)->limit(100)->get();
            }
          }

          
        }

      }else{
        $product = product::paginate(10);
        return view('home.index',compact('producthot','product'));
      }
      
      
$product = product::all();
        // 
    	return view('home.index',compact('producthot','product','productsuggest'));
    }
    public function danhmuc(request $request){
    	$product = product::paginate(5);
    		// if($request->name) $product->where('pro_name','like','%'.$request->name.'%');
    		// if($request->cate) $product->where('pro_category_id',$request->cate); 
    		// 	$product = $product->orderByDesc('id')->paginate(10);
    		 $category=category::all();
      //       $url = $request->segment(2);
      //       $url = preg_split('/(-)/i', $url);
            // if ($id = array_pop($url)) {
            //     $product= Product::where([
            //         'pro_category_id'=>$id,
            //         'pro_active'=>Product::STATUS_PUBLIC,
            //     ]);
                 
                
              
           
            return view('home.category',compact('product','category'));
    	 }
    


    public function chitiet($id){

        $producthot = product::find($id);
        ProCessView::view('producthot',$id);
         $rating = Rating::with('user:id,name')->where('ra_product_id',$id)->orderBy('id','DESC')->limit(5)->get();
        
        // 
        // dd($value->ra_content);

        
        
        $ratingdashboard = Rating::groupBy('ra_number')
          ->where('ra_product_id',$id)
          ->select(DB::raw('count(ra_number) as total'),DB::raw('sum(ra_number) as sum'))
          ->addSelect('ra_number')
          ->get()->toArray();

          $arrayRating = [];
          if (!empty($ratingdashboard)) {
              for ($i=1; $i <=5 ; $i++) { 
                $arrayRating[$i] = [
                  "total" => 0,
                  "sum" => 0,
                  "ra_number"=> 0 ,
                ];
                foreach ($ratingdashboard as $value) {
                  if ($value['ra_number'] ==$i) {
                     $arrayRating[$i] = $value;
                     continue;
                  }
                }
              }

           } //dd($ratingdashboard);
    
    	return view('home.productdetails',compact('producthot','rating','arrayRating'));

    }

    //listt danh giá sản phẩm 
      public function getListRaiting($id){
        if ($id) {
           $ratingdashboard = Rating::groupBy('ra_number')
          ->where('ra_product_id',$id)
          ->select(DB::raw('count(ra_number) as total'),DB::raw('sum(ra_number) as sum'))
          ->addSelect('ra_number')
          ->get()->toArray();
          $arrayRating = [];
          if (!empty($ratingdashboard)) {
              for ($i=1; $i <=5 ; $i++) { 
                $arrayRating[$i] = [
                  "total" => 0,
                  "sum" => 0,
                  "ra_number"=> 0 ,
                ];
                foreach($ratingdashboard as $value) {
                  if($value['ra_number'] == $i) {
                     $arrayRating[$i] = $value;
                     continue;
                  }
                }
              }

           }
          $product = product::find($id);
           $rating = Rating::with('user:id,name')->where('ra_product_id',$id)->orderBy('id','DESC')->paginate(5);
          $viewData = [
            'product'=>$product,
            'rating'=>$rating,
            'arrayRating'=>$arrayRating
          ];
          return view('component.view-all-raiting',$viewData);
        }
        return redirect()->back();
      }


   public function danhmuc_sp($value){
        
               // $product = Product::select('id','pro_avatar','pro_price','pro_name')->get();
                $product = Product::where('pro_category_id',$value)->get();

                foreach ($product as  $value) {
                  if($value->pro_number == 0){
                    echo "<span style='position: absolute;background: #e91e63;color:white;border-radius: 6px;font-size: 10px;padding: 2px 6px '>Tạm hết hàng</span>";
                  }  else {
                   echo "
                            <div class='col-lg-3 col-md-3 col-sm-6'>
                                <div class='f_p_item'>
                                 <div class='f_p_img'>
                                    <a href=".route('chitiet',$value->id).">
                           
                                <img class= 'img-fluid' src=/shopping_phone/public/img/".$value->pro_avatar."> </a>
                                    <div class='p_icon'>
                                        <a class='js-favorite' href = ".route('favorite',$value->id)." >
                                        <i class='lnr lnr-heart'></i>
                                    </a>
                                    <a href=".route('add',$value->id).">
                                        <i class='lnr lnr-cart'></i>
                                    </a>
                                    </div>
                                </div>
                                <a >

                                    <h4>".$value->pro_name."</h4>
                                </a>
                                <h5 style='color: #f57224'>".number_format($value->pro_price,0,',','.')." đ</h5>
                            </div>
                        </div>";
                  }
                }
}

        public function Sp_money(Request $request ,$value){
          if ($request->ajax()) {
                $number = $request->number;
                  if ($value){
                    // $Product = Product::all();
                     $price = $value;
                    switch ($price) {
                       case '1':
                          $product = Product::where('pro_category_id',$number)->whereBetween('pro_price',[0,1000000])->get();
                            // $product = product::where('pro_price','<','1000000')->get();
                            break;
                         case '2':
                            $product=Product::where('pro_category_id',$number)->whereBetween('pro_price',[1000000,3000000])->get();
                            break;
                        case '3':
                          $product=Product::where('pro_category_id',$number)->whereBetween('pro_price',[3000000,5000000])->get();
                            break;
                        case '4':
                             $product=Product::where('pro_category_id',$number)->whereBetween('pro_price',[5000000,7000000])->get();
                            break;
                        case '5':
                              $product=Product::where('pro_category_id',$number)->whereBetween('pro_price',[7000000,10000000])->get();
                            break;    
                        case '6':
                              $product=Product::where('pro_category_id',$number)->where('pro_price','>','10000000')->get();
                            break;
                    }
                    }  
                foreach ($product as  $value) {
                  if($value->pro_number == 0){
                    echo "<span style='position: absolute;background: #e91e63;color:white;border-radius: 6px;font-size: 10px;padding: 2px 6px '>Tạm hết hàng</span>";
                  }  else {
                   echo "
                            <div class='col-lg-3 col-md-3 col-sm-6'>
                                <div class='f_p_item'>
                                 <div class='f_p_img'>
                                    <a href=".route('chitiet',$value->id).">
                           
                                <img class= 'img-fluid' src=/shopping_phone/public/img/".$value->pro_avatar."> </a>
                                    <div class='p_icon'>
                                        <a class='js-favorite' href = ".route('favorite',$value->id)." >
                                        <i class='lnr lnr-heart'></i>
                                    </a>
                                    <a href=".route('add',$value->id).">
                                        <i class='lnr lnr-cart'></i>
                                    </a>
                                    </div>
                                </div>
                                <a >
                                    <h4>".$value->pro_name."</h4>
                                </a>
                                <h5 style='color: #f57224' >".number_format($value->pro_price,0,',','.')." đ</h5>
                            </div>
                        </div>";
                   }
               }
        }
    }

        public function Sp_gia($value,$id1){
            // $product = Product::where('pro_category_id',$id1)->get();
              $product = Product::select('id','pro_name','pro_avatar','pro_price')->get();
             switch ($value) {
                 case 'desc':
                     $product = Product::where('pro_category_id',$id1)->orderBy('id','DESC')->get();
                     // $product = $product->orderBy()
                     break;
                case 'asc':
                     $product = Product::where('pro_category_id',$id1)->orderBy('id','ASC')->get();
                     break;
                case 'price_max':
                     $product = Product::where('pro_category_id',$id1)->orderBy('pro_price','ASC')->get();
                     break;
                 case 'price_min':
                     $product = Product::where('pro_category_id',$id1)->orderBy('pro_price','DESC')->get();
                    break;
                  
                 
                 // default:
                 //     # code...
                 //     break;
             }
              foreach ($product as  $value) {
                 if($value->pro_number == 0 ){
                    echo "<span style='position: absolute;background: #e91e63;color:white;border-radius: 6px;font-size: 10px;padding: 2px 6px '>Tạm hết hàng</span>";
                  } else {
                   echo "
                            <div class='col-lg-3 col-md-3 col-sm-6'>
                                <div class='f_p_item'>
                                 <div class='f_p_img'>
                                    <a href=".route('chitiet',$value->id).">
                           
                                <img class= 'img-fluid' src=/shopping_phone/public/img/".$value->pro_avatar."> </a>
                                    <div class='p_icon'>
                                         <a class='js-favorite' href = ".route('favorite',$value->id)." >
                                        <i class='lnr lnr-heart'></i>
                                    </a>
                                    <a href=".route('add',$value->id).">
                                        <i class='lnr lnr-cart'></i>
                                    </a>
                                    </div>
                                </div>
                                <a >
                                    <h4>".$value->pro_name."</h4>
                                </a>
                                <h5 style='color: #f57224'>".number_format($value->pro_price,0,',','.')." đ</h5>
                            </div>
                        </div>";
                   }

        }
      }

        public function renderProductView(Request $request)
        {
            if ($request->ajax()) {
              $listID = $request->id;
              $product = Product::whereIn('id',$listID)->get();
              $html = view('home.product-view',compact('product'))->render();
              return \response()->json(['data'=> $html]);
            }
            
        }
        public function Search(Request $request)
        {
          if($request->ajax()){
            $tukhoa = $request->key;
            $product = Product::where('pro_name','LIKE',"%{$tukhoa}%")->limit(5)->get();
            if(sizeof($product)) {
            $output = '<ul class="dropdown-menu" style="display: block;
    
    background: #fff;
    position: absolute;
    left: 0;
    width: 345px;
    top: 59px;
    z-index: 9;
    left:50px;
    border: 1px solid #e2e2e2;
    border: solid transparent;"> ';
              foreach($product as $value)
                {
                $output .= '
                  <li style="display: block;
    background: #fff;
    overflow: hidden;
    list-style: none;
    border-bottom: 1px dotted #ccc;">
    <a style="display: block;
    overflow: hidden;
    padding: 6px;
    color: #333;
    font-size: 12px;" href='.route('chitiet',$value->id).' >

    <img style="float: left;
    width: 50px;
    height: auto;
    margin: 0 6px 0 0;" src=/shopping_phone/public/img/'.$value->pro_avatar.' >
                    <h3 style="display: block;
    width: auto;
    color: #333;
    font-size: 14px;
    font-weight: 700;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;"> '.$value->pro_name.'</h3> 
    <span style="font-size: 12px;
    color: #c70100;
    float: none;" class="price">'.number_format($value->pro_price,0,',','.').'</span>
    <h6 style="font-size: 12px;
    color: #e67e22;"> </h6>
                      
                  </a>
                  </li>
               ';
                }
              $output .= '</ul>';   
              echo $output;
          }
         
        }
        }
       
// <li>
//                     <a href="/dtdd/iphone-7-plus">
//                             <img src="https://cdn.tgdd.vn/Products/Images/42/78124/iphone-7-plus-32gb-gold-600x600-200x200.jpg">
//                         <h3>iPhone 7 Plus 32GB</h3>
//                                                                     <span class="price">10.990.000₫</span>
//                                             <cite style="font-style: normal; text-decoration: line-through">12.990.000₫</cite>
//                                         <h6 class="textkm"></h6>

//                     </a>
//                 </li>

    
}
