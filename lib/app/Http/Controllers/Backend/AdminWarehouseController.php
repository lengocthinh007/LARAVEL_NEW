<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Transaction;

class AdminWarehouseController extends Controller
{
     public function kho(Request $request){
        $data = Product::select('id','name','price','cate_id','pro_total_rating','pro_total_number','created_at','pro_active','pro_hot','pro_sale','image','pro_number');
        $colum='id';
         $data1 = $data->orderBy($colum,'ASC')->get();
          $data2 = $data->where('pro_pay','>',0)->orderBy('pro_pay','DESC')->get();
        return view('backend.kho.index',compact('data1','data2'));
    }

     public function tongquang(){
       
        $Transaction=Transaction::addselect('id','pay_type','total','address','phone','created_at','status')->get();
        $totaltransaction =Transaction::select('id')->count();
        $totaltransactiondone =Transaction::where('status',Transaction::STATUS_DONE)->select('id')->count();

        $moneyDay = Transaction::whereDay('updated_at',date('d'))
        ->where('status',Transaction::STATUS_DONE)
        ->sum('total');

        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
        ->where('status',Transaction::STATUS_DONE)
        ->sum('total');

         $moneyYear = Transaction::whereYear('updated_at',date('Y'))
        ->where('status',Transaction::STATUS_DONE)
        ->sum('total');

        $datamoney = [
            [
                'name'=>'Doanh thu ngày',
                'y'=> (int)$moneyDay,
                'drilldown' => 'Doanh thu ngày'
            ],
            [
                'name'=>'Doanh thu tháng',
                'y'=> (int)$moneyMonth,
                'drilldown' => 'Doanh thu tháng'
            ],
            [
                'name'=>'Doanh thu năm',
                'y'=> (int)$moneyYear,
                'drilldown' => 'Doanh thu năm'
            ]
        ];
        $viewdata=[
            'datamoney'=>json_encode($datamoney),
             'Transaction'=> $Transaction,
            'totaltransaction'=>$totaltransaction,
            'totaltransactiondone'=>$totaltransactiondone
        ];
       return view ('Backend.Home.index',$viewdata);
    }
}
