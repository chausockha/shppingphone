<?php 
namespace App\Services ;
use DB;

/**
 * 
 */
class ProCessView 
{
	public static function view($key , $id){
		
		$ipAddress =get_client_ip();
 //dump($ipAddress);
		$timeNow = time();
		$throttleTime = 60 *60 ;
 		$key = $key . '_'. md5($ipAddress) . '_'. $id;

		if (\Session::exists($key)) {
			$timeBefore = \Session::get($key);

			if ($timeBefore + $throttleTime > $timeNow) {
				return false ; 
			}

		
		}
	\Session::put($key, $timeNow);
			\DB::table('product')->where('id',$id)->increment('pro_view');
			//
	}
}


 