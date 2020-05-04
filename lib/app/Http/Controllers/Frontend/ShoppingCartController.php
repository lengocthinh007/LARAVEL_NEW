<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use Cart;
use App\Model\Transaction;
use App\Model\Order;
use Carbon\Carbon;

class ShoppingCartController extends Controller
{
	
     public function thanhtoan()
      {
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        return view('Frontend.thanhtoan',$data);
      }

       public function savethanhtoan(Request $request)
     {
        $totalMoney = str_replace(',','',Cart::subtotal(0,3));
        $TransactionID = Transaction::insertGetId([
          'user_id' => get_data_user('web'),
          'total' => (int)$totalMoney,
          'note' => $request->note,
          'address' => $request->address,
          'phone' => $request->phone_number,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
        if($TransactionID)
        {
            $products = Cart::content();
            foreach ($products as $product) 
              {
              Order::insert([
                'transaction_id'=>$TransactionID,
                'product_id'=>$product->id,
                'qty'=>$product->qty,
                'price'=>$product->options->price_old,
                'sale'=>$product->options->sale,
                ]);
              }
          }
        Cart::destroy();
        return redirect('/');
      }

     public function getcart(Request $request,$id) // Add Cart
    {
        $product = Product::select('name','alias','id','price','pro_sale','image','pro_number')->find($id);
        $price=$product->price;
        if($product->pro_sale)
        {
          $price=$price * (100 - $product->pro_sale)/100;
        }
        $num =  Order::select('qty')
			    ->join('transaction', 'transaction.id', '=', 'order.transaction_id')
			    ->where('product_id', $id)
			    ->where('transaction.status',0)
			    ->get();
	    $dem=0;
			    foreach ($num as $value) {
			    	$dem = $dem + $value;
			    }
        if($request->qty > ($product->pro_number-$dem))
        {
        	$notification = array(
                'message' => 'Sản Phẩm Tạm Hết Hàng!',
                'alert-type' => 'error'
            );
           return back()->with($notification);
        }


        if(!$product) return redirect('/');
        Cart::add([
          'id' => $id,
          'name' => $product->name,
          'qty' => $request->qty ? $request->qty : 1,
          'price' => $price,
          'weight' => 550,
          'options' => [
              'img' => $product->image,
              'sale'=>$product->pro_sale,
              'price_old'=>$product->price,
               'alias'=>$product->alias,
                      ]
        ]);
        return redirect('cart/show');
    }
     public function getshow()  // Show Cart
      {
      	$data['total'] = Cart::total(0,'.','.');
        $data['items'] = Cart::content();
      	return view('frontend.cart',$data);
      }

      public function getdelete($id)
       {
          if($id=='all')
          {
            Cart::destroy();
          }
          else
          {
            Cart::remove($id);
          }
          return back();
       }

      public function getupdate(Request $request)
       {
       	Cart::update($request->rowId,$request->qty);
       }
}
