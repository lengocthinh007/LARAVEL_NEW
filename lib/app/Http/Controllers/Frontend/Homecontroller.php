<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use DB;
class Homecontroller extends Controller
{
    public function getHome(){
    	$pro_new = Product::where('pro_active',Product::STATUS_PUBLIC)->orderBy('id','DESC')->take(6)->get();
    	$pro_pay = Product::where('pro_active',Product::STATUS_PUBLIC)->orderBy('pro_pay','DESC')->take(6)->get();
    	$pro_popu = Product::where('pro_active',Product::STATUS_PUBLIC)->orderBy('pro_total_number','DESC')->take(6)->get();
    	$pro_laptop = Product::where('pro_active',Product::STATUS_PUBLIC)->where('cate_id',4)->orderBy('id','DESC')->take(6)->get();
    	$pro_audio = Product::where('pro_active',Product::STATUS_PUBLIC)->where('cate_id',5)->orderBy('id','DESC')->take(6)->get();

       $categories = Category::select('id')->take(3)->get();
       $productsArray = array();
        foreach($categories as $category) {
                $products = Product::where('cate_id', $category->id)->get();
                if(sizeof($products)) {
                    $products = $products->take(3);
                    $productsArray[$category->id] = $products;
                }
            }
     
            	$viewdata = [
    		'pro_new'=>$pro_new,
    		'pro_pay'=>$pro_pay,
    		'pro_popu'=>$pro_popu,
    		'pro_laptop'=>$pro_laptop,
    		'pro_audio'=>$pro_audio,
    		'categories'=>$productsArray
    	];
    	return view ('frontend.Home',$viewdata);
    }
}
