<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Transaction;
use App\Model\Order;
use App\Model\Product;
use DB;

class AdminTransactionController extends Controller
{
     public function index(){
    	$Transaction = Transaction::with('user:id,name')->paginate(10);
    	
    	$viewdata = [
    		'transaction' => $Transaction
    	];
    	return view ('Backend.Transaction.list',$viewdata);
    }
     public function vieworder(Request $request,$id){
    	if($request->ajax())
    	{
    		$orders = Order::with('products')->where('transaction_id',$id)->get();
    		$html = view('Backend.Components.order',compact('orders'))->render();
    		return response()->json($html);
    	}
    }
      public function activetransaction($id){
        $Transaction = Transaction::find($id);
        $order = Order::where('transaction_id',$id)->get();

        if($order)
        {
            foreach ($order as $item) {
                $product = Product::find($item->product_id);
                $product->pro_number =  $product->pro_number - $item->qty;
                $product->pro_pay ++;
                $product->save();
            }
        }
        DB::table('users')->where('id',$Transaction->user_id)->increment('total_pay');
        $Transaction->status = Transaction::STATUS_DONE;
        $Transaction->save();
        return redirect()->back()->with(['level'=>'success','message'=>'Xử lí thành công']);
    }
}
