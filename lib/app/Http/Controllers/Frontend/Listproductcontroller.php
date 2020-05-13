<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Product_img;
use DB;

class Listproductcontroller extends Controller
{
     public function getloaisanpham(Request $request)
    {
        $id = \Request::segment(2) ? \Request::segment(2) : $request->cate;
        $products = Product::where('pro_active',Product::STATUS_PUBLIC);
        $cateproduct=[];
        $key='';
        if($id)
        {
            $cateproduct = Category::select('name')->find($id);
            $products = Product::where([
                'cate_id'=> $id,
            ]);
        }

        if($request->k)
        {
            $key=$request->k;
            $products->where('name','like','%'.$request->k.'%');
        }
       
        if($request->price)
        {
            $price=$request->price;
            switch ($price) {
                case 1:
                    $products->where('price','<',1000000);
                    break;
                case 2:
                    $products->whereBetween('price',[1000000,3000000]);
                    break;
                case 3:
                    $products->whereBetween('price',[3000000,5000000]);
                    break;
                case 4:
                    $products->whereBetween('price',[5000000,7000000]);
                    break;
                case 5:
                    $products->whereBetween('price',[7000000,10000000]);
                    break;
                case 6:
                    $products->where('price','>',10000000);
                    break;
                
            }
        }
        if($request->orderby)
        {
            $orderby=$request->orderby;
            switch ($orderby) {
                case 'desc':
                    $products->orderBy('id','DESC');
                    break;
                case 'asc':
                    $products->orderBy('id','ASC');
                    break;
                case 'price_max':
                    $products->orderBy('price','ASC');
                    break;
                case 'price_min':
                    $products->orderBy('price','DESC');
                    break;
                default:
                   $products->orderBy('id','DESC');
                    break;
            }
        }
        $products=$products->paginate(4);
      

    	$cate = Category::select('id','alias','name')->find($id);
    	$viewdata = [
            'cateproduct'=>$cateproduct,
    		'products'=>$products,
    		'cate'=>$cate,
            'query'=>$request->query(),
            'key'=>$key,
    	];

    	return view ('frontend.listProduct',$viewdata);
    }

      public function view_details(Request $request,$id){
        if($request->ajax())
        {
            $products = Product::where(
            'pro_active', Product::STATUS_PUBLIC
            )->find($id);
            $imgdetails =  Product_img::select('id','image')->where('product_id',$id)->get();
            $html = view('Frontend.components.details',compact('products','imgdetails'))->render();
            return response()->json($html);
        }
    }
}
