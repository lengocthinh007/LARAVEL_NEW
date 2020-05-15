<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class Product extends Model
{
    protected $table = 'products';
     protected $primaryKey = 'id';
     protected $guarded = [''];
     const STATUS_PUBLIC = 1;
	const STATUS_PRIVATE = 0;
       const HOT_ON = 1;
     const HOT_OFF = 0;
     protected $status = [
     	1=>[
     		'name'=>'Public',
     		'class'=>'label-info'
     	],
     	0=>[
     		'name'=>'Private',
     		'class'=>'label-danger'
     	]
     ];
      protected $hot = [
     	1=>[
     		'name'=>'Nổi Bật',
     		'class'=>'label-info'
     	],
     	0=>[
     		'name'=>'Không',
     		'class'=>'label-danger'
     	]
     ];
     public function getstatus()
     {
     	return  Arr::get($this->status,$this->pro_active,'[N/A]');
     }
      public function gethot()
     {
     	return  Arr::get($this->hot,$this->pro_hot,'[N/A]');
     }
    
}
