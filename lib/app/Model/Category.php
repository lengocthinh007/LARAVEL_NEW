<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'cates';
     protected $primaryKey = 'id';
     protected $guarded = [];
      public function products()
     {
     	return $this->hasMany(Product::class,'cate_id')->limit(3);
     }
}
