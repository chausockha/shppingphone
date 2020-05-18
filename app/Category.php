<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'categories';
   protected $guarded=['*'];
   const STATUS_PUBLIC =1 ;
   const STATUS_PRIVATE =0 ;

    protected $status = [
    1=> [
        'name'=>'Public',
        'class'=> 'label-danger'
      ],
      0 => [
        'name'=>'Private' ,
        'class'=>'label-default'
      ]
    ];

    protected $home = [
    1=> [
        'name'=>'Public',
        'class'=> 'label-primary'
      ],
      0 => [
        'name'=>'Private' ,
        'class'=>'label-default'
      ]
    ];
    public function getstatus(){
    	return array_get($this->status,$this->c_active,'[N\A]'); 
    }


     public function gethome(){
      return array_get($this->home,$this->c_home,'[N\A]'); 
    }
}
