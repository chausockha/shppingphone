<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Transaction extends Model
{
     protected $table= '_transactions';
    protected $guarded = ['*'];
    const STATUS_DONE = 3;
    const STATUS_DEFAULT = 0;

     protected $status = [
    		1=> [
    			'class' =>'default',
    			'name' =>'Đã nhận đơn '
    		],
    		2 => [
    			'class' => 'info',
    			'name' =>'Đang vẫn chuyển'
    		],
    		3 => [
    			'class' => 'success',
    			'name' =>'Đã nhận hàng' 
    		],
    		-1 => [
    			'class' =>'danger',
    			'name' =>'Đã hủy' 
    		],
    ];

  
    public function getstatus(){
    	return array_get($this->status, $this->tr_status,'[N\A]');
    }

    
    public function User(){
    	return $this->belongsTo('App\User','tr_user_id');
    }
   
}
