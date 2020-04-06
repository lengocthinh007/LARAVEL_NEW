<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
     protected $primaryKey = 'id';
     protected $guarded = [];
      public function products()
     {
     	return $this->belongsTo(Product::class,'product_id');
     }
}
