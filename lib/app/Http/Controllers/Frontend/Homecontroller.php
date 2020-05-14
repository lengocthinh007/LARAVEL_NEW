<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;

class Homecontroller extends Controller
{
    public function getHome(){
    	$products = Product::where('pro_active',Product::STATUS_PUBLIC)->orderBy('id','DESC')->take(6)->get();
    	$pro_pay = Product::where('pro_active',Product::STATUS_PUBLIC)->orderBy('pro_pay','DESC')->take(6)->get();
    	$pro_popu = Product::where('pro_active',Product::STATUS_PUBLIC)->orderBy('pro_total_number','DESC')->take(6)->get();
    	$pro_laptop = Product::where('pro_active',Product::STATUS_PUBLIC)->where('cate_id',4)->orderBy('id','DESC')->take(6)->get();
    	$pro_audio = Product::where('pro_active',Product::STATUS_PUBLIC)->where('cate_id',5)->orderBy('id','DESC')->take(6)->get();
    	$cate_home = Category::with('products')->limit(3)->get();
    	$viewdata = [
    		'products'=>$products,
    		'pro_pay'=>$pro_pay,
    		'pro_popu'=>$pro_popu,
    		'pro_laptop'=>$pro_laptop,
    		'pro_audio'=>$pro_audio,
    		'cate_home'=>$cate_home
    	];
    	return view ('frontend.Home',$viewdata);
    }
}
