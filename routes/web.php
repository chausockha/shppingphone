<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 

Route::group(['prefix'=>'admin'],function (){

	Route::get('tongquan','admincontroller@tongquan')->name('tongquan');
	Route::get('danhmuc', 'admincontroller@danhmuc')->name('danhmuc');
	route::get('themmoidanhmuc','admincontroller@themmoidanhmuc')->name('themmoidanhmuc');
	Route::post('themmoi','admincontroller@store')->name('themmoi');
	Route::get('editdanhmuc/{id}','admincontroller@edit_danhmuc')->name('editdanhmuc');
	Route::post('updatedanhmuc','admincontroller@updatedanhmuc')->name('updatedanhmuc');
	 Route::get('changestatus_c/{action}/{id}','admincontroller@delete_danhmuc')->name('changestatus_c');
	Route::get('deletedanhmuc/{id}','admincontroller@delete')->name('deletedanhmuc');
	//san pham
	Route::get('sanpham','adminProductcontroller@sanpham')->name('sanpham');
	Route::get('kt-sl/{id}','adminProductcontroller@kt_sl')->name('kt-sl');;
	Route::get('themmoisanpham','adminProductcontroller@themmoisanpham')->name('themmoisanpham');
	Route::post('store','adminProductcontroller@store')->name('store');
	Route::get('editsanpham/{id}','adminProductcontroller@edit')->name('editsanpham');
	Route::post('updatesanpham','adminProductcontroller@updatesanpham')->name('updatesanpham');
	 Route::get('changestatus/{action}/{id}','adminProductcontroller@delete_sanpham')->name('changestatus');
	Route::get('deletesanpham/{id}','adminProductcontroller@delete')->name('deletesanpham');
	//Đơn hàng
	Route::get('donhang','adminTransactioncontroller@donhang')->name('donhang');
	Route::get('view/{id}','adminTransactioncontroller@viewOrder')->name('view');
	Route::get('deletedonhang/{id}','adminTransactioncontroller@delete')->name('deletedonhang');
	Route::get('active/{action}/{id}','adminTransactioncontroller@actionTransaction')->name('active');	
	//thành viên
	Route::get('thanhvien','adminUsercontroller@user')->name('thanhvien');
	Route::get('deletethanhvien/{id}','adminUsercontroller@delete')->name('deletethanhvien');

	//đánh giá 
	Route::get('danhgia','Ratingcontroller@danhgia')->name('danhgia');
	Route::get('deletedanhgia/{id}','Ratingcontroller@delete')->name('deletedanhgia');
	
	//Login Admin
	Route::get('getloginadmin','AdminAuthcontroller@getLogin')->name('getloginadmin');
	Route::post('postlogin','AdminAuthcontroller@postLogin')->name('postlogin');
	Route::get('logout','AdminAuthcontroller@LogOut')->name('logout');

});


Route::group(['prefix'=>'/'],function(){

	Route::get('index','Homecontroller@trangchu')->name('index');
	Route::get('/danhmucsanpham','Homecontroller@danhmuc')->name('danhmucsanpham');
	Route::get('chitiet/{id}','Homecontroller@chitiet')->name('chitiet');
	route::get('get-raiting/{id}','Homecontroller@getListRaiting')->name('get-raiting');

	//đăng ký-đăng xuất thành viên
	Route::get('dangky','Registercontroller@dangky')->name('dangky');
	Route::post('postdangky','Registercontroller@postdangky')->name('postdangky');
	Route::get('dangnhap','Logincontroller@dangnhap')->name('dangnhap');
	Route::post('postdangnhap','Logincontroller@postdangnhap')->name('postdangnhap');
	Route::get('dangxuat','Logincontroller@Logout')->name('dangxuat');

	//Lấy lại mật khẩu
	Route::get('lay-lai-mk','Logincontroller@getformresetpassword')->name('lay-lai-mk');
	Route::post('postresetpassword','Logincontroller@postresetpassword')->name('postresetpassword');

	Route::get('getlinkresetpassword','Logincontroller@passwordreset')->name('getlinkresetpassword');
	Route::post('getlinkresetpassword','Logincontroller@SaveResetPassword')->name('getlinkresetpassword');

	//mua hàng
	Route::get('add/{id}','ShoppingCartcontroller@addproduct')->name('add');
	Route::get('danhsach','ShoppingCartcontroller@getlistShopingcart')->name('danhsach');
	Route::get('delete/{id}','ShoppingCartcontroller@delete')->name('delete');
	 Route::get('qtynew/{id}/{qty}','ShoppingCartcontroller@getlistShopingcart1')->name('qtynew');
	 Route::get('updatecart1/{key}','ShoppingCartcontroller@updateCart')->name('updatecart1');
	 //thanh toan
	 Route::get('payment','Paymentcontroller@store')->name('payment');
	 Route::get('create','Paymentcontroller@create')->name('create');
//resource
	//xu ly danh muc su dụng ajax
	Route::get('getdanhmuc/{value}','Homecontroller@danhmuc_sp')->name('getdanhmuc');
	Route::get('getmoney/{value}','Homecontroller@Sp_money')->name('getmoney');
	Route::get('getgia/{value}/{id1}','Homecontroller@Sp_gia')->name('getgia');
	Route::post('view-product','Homecontroller@renderProductView')->name('view-product');

	//cap nhat thong tin khach hang
	Route::get('infor','adminUsercontroller@update')->name('infor');
	Route::post('postinfor','adminUsercontroller@post_update')->name('postinfor');

	Route::get('updatepw','adminUsercontroller@updatepw')->name('updatepw');
	Route::post('postpw','adminUsercontroller@post_updatepw')->name('postpw');
	//favorite 
	Route::post('favorite/{idproduct}','UserFavoriteController@addFavorite')->name('favorite');
	Route::get('Viewfavorite','UserFavoriteController@index')->name('Viewfavorite');
	// Route::get('slyeuthich','UserFavoriteController@count')->name('slyeuthich');
	Route::get('deletefavorite/{idfavorite}','UserFavoriteController@deletefavorite')->name('deletefavorite');
	Route::get('thanhtoan','ShoppingCartcontroller@getFormpay')->name('thanhtoan');
	// tim kiem san pham
	Route::get('search','Homecontroller@Search')->name('search');
});

Route::group(['prefix'=>'giohang','middleware'=>'CheckLoginuser'],function(){
	
	Route::post('postthanhtoan','ShoppingCartcontroller@saveinfoshoppingcart')->name('postthanhtoan');
});
Route::group(['prefix'=>'ajax','middleware'=>'CheckLoginuser'],function(){
Route::post('postrating/{id}','Ratingcontroller@SaveRating')->name('postrating');

});


	