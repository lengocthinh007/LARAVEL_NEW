@extends('Frontend.master')
@section('title','Thank You')
@section('link')
 <link rel="stylesheet" type="text/css" href="step/main.css">
 <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
@stop
@section('main') 
<link rel="stylesheet" href="css/complete.css">
<div class="container">
           <div class="row" style="margin-bottom: 4%;margin-top:4%">
                        <div class="col-md-12" style="text-align: center;">
                             <ul class="progressbar" style="margin-left: 20%">
					            <li class="active">Cart</li>
					            <li class="active">Checkout</li>
					            <li class="active">Thank you</li>
        					</ul>
                        </div>
            </div>
           <div class="row">
					<div id="wrap-inner" style="margin-left: 8% !important">
						<div id="complete">
							<p class="info">Quý khách đã đặt hàng thành công!</p>
							<p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
							<p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
							<p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
							<p>• Trụ sở chính: B8A Võ Văn Dũng - Hoàng Cầu Đống Đa - Hà Nội</p>
							<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
						</div>
						<p class="text-right return"><a href="{{asset('/')}}">Quay lại trang chủ</a></p>
					</div>		
			 </div>	
	</div>
@stop
@section('script')
@include('errors.front')
@stop