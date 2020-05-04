<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Rating;
use App\Model\Product_img;
use DB;
class ProductDetailController extends Controller
{
     public function getdetails($id){
    	$products = Product::where(
    		'pro_active', Product::STATUS_PUBLIC
    	)->find($id);
    	$imgdetails =  Product_img::select('id','image')->where('product_id',$id)->get();
        $cate = Category::select('name')->where('id',$products->cate_id)->first();
    	$pro_care = Product::where(
    		'pro_active', Product::STATUS_PUBLIC,
    	)->where('cate_id',$products->cate_id)->where('id','<>',$id)->get();

        $listrating = Rating::with('user:id,name')
        ->where('product_id',$id)->orderBy('id','DESC')->paginate(10);

        $rating = Rating::groupBy('number')
        ->where('product_id',$id)
        ->select(DB::raw('count(number) as total'),DB::raw('sum(number) as sum'))
        ->addSelect('number')
        ->get()->toArray();
        $arrayrating = [];
        if(!empty($rating))
        {
            for($i=1;$i<=5;$i++)
            {
                $arrayrating[$i]=[
                    'total' => 0,
                    'sum' => 0,
                    'number' => 0                
                ];
                foreach($rating as $item) {
                    if($item['number']==$i)
                    {
                        $arrayrating[$i]=$item;
                        continue;
                    }
                }
            }
        }
        
    	$viewdata = [
    		'products'=>$products,
    		'imgdetails'=>$imgdetails,
    		'pro_care'=>$pro_care,
            'cate'=>$cate,
            'arrayrating'=>$arrayrating,
            'listrating' => $listrating,
    	];
    	return view ('Frontend.Details',$viewdata);
    }
}
