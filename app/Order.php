<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table= '_orders';
    protected $guarded = ['*'];

    public function product(){
    	return $this->belongsTo('App\product','or_product_id');
    }
}
