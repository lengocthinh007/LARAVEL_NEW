<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\USer;

class Transaction extends Model
{
     protected $table = 'transaction';
     protected $primaryKey = 'id';
     protected $guarded = [];
     const STATUS_DONE = 1;
	 const STATUS_DEFAULT = 0;
     public function user()
     {
     	return $this->belongsTo(User::class,'user_id');
     }
}
