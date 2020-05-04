<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Rating;
use App\Model\Product;
use App\User;
use Carbon\Carbon;

class RatingController extends Controller
{
    public function saverating(Request $request,$id){
      	if($request->ajax())
      	{
          $rating = new Rating;
          $rating->product_id=$id;
          $rating->number=$request->number;
          $rating->content=$request->content;
          $rating->user_id=get_data_user('web');
          $rating->save();


      		// Rating::insert([
      		// 	'product_id' => $id,
      		// 	'number' => $request->number,
      		// 	'content' => $request->content,
      		// 	'user_id' => get_data_user('web'),
      		// 	'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
      		// ]);
      		$products = Product::find($id);
      		$products->pro_total_number += $request->number; 
      		$products->pro_total_rating += 1; 
      		$products->save();
      		 // return response()->json(['code'=>'1']);
      		  $result = array();
            if($rating->id)
            {
              $name = User::select('name')->where('id',$rating->user_id)->get();
                  $result[] = array(
                  'name'=>get_data_user('web','name'),
                  'number' => $rating->number,
                  'content' => $rating->content,
                  'created_at' => $rating->created_at->format('Y-m-d H:i:s'),

              );
            }
            return json_encode($result);
      	}
    	
    }
}
