<?php

namespace App\Http\Controllers\VNPAY;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class VNPAYController extends Controller
{
    
     public function create(Request $request)
    {
        session(['cost_id' => 12]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/doan-3/VNPAY/return";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        $vnp_BankCode = $request->bank_code;

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_BankCode" => $vnp_BankCode,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function return(Request $request)
		{
		    if($request->vnp_ResponseCode == "00") {
		        $notification = array(
                'message' => 'Đã thanh toán phí dịch vụ',
                'alert-type' => 'success'
               );
                 Cart::destroy();
		        return redirect('cart/complete')->with($notification);
		    }
		     $notification = array(
                'message' => 'Lỗi trong quá trình thanh toán phí dịch vụ',
                'alert-type' => 'error'
               );
		    return redirect('cart/complete')->with($notification);
		}
}
