<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class UserFavorite extends Model
{
    protected $table= 'user_favorite';
    protected $guarded = ['*'];
 

  public function product(){
        return $this->belongsToMany(User::class,'user_favorite','uf_product_id','uf_user_id');
    }
}
