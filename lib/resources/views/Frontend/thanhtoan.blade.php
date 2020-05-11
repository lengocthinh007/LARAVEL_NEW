@extends('Frontend.master')
@section('title','Thanh Toán')
@section('link')
 <link rel="stylesheet" type="text/css" href="step/main.css">
 <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
@stop
@section('main') 
 <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                    <div class="row" style="margin-bottom: 50px">
                        <div class="col-md-12" style="text-align: center;">
                             <ul class="progressbar" style="margin-left: 20%">
					            <li class="active">Cart</li>
					            <li >Checkout</li>
					            <li >Thank you</li>
        					</ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <form method="post">
                            	 @csrf
                                <div class="checkbox-form">
                                    <h3>Thông Tin Khách Hàng</h3>
                                    <div class="row">
                                     
                                      
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ</label>
                                                <input required="" name="address" placeholder="" type="text">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Phone Number:</label>
                                                <input name="phone_number" placeholder="" type="number" value="{{get_data_user('web','phone')}}">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Email Address:</label>
                                                <input name="email_address" placeholder="" type="text" value="{{get_data_user('web','email')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                                <label>Ghi chú:</label>
                                                <textarea required="" name="note" id="checkout-mess" cols="30" rows="5" placeholder="Ghi chú"></textarea>
                                         </div>
                                        <div class="col-md-12">
                                        <label>Chọn Phương Thức Thanh Toán</label>
                                        <select name="pay_type" class="form-control">
                                            <option value="1">Thanh Toán Online</option>
                                            <option value="2">Thanh Toán Khi Nhận Hàng</option>
                                        </select>
                                    </div>
                                       <div class="col-md-12 order-button-payment">
                                            <input value="Đặt Hàng" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Đơn Hàng Của Bạn</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Sản Phẩm</th>
                                                <th class="cart-product-total">Thành Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	 @foreach($items as $item)
                                            <tr class="cart_item">
                                              <td class="cart-product-name"> {{$item->name}}<strong class="product-quantity"> × {{$item->qty}}</strong></td>
                                              <td class="cart-product-total"><span class="amount">{{number_format($item->price*$item->qty,0,',','.')}} đ</span></td>  
                                            </tr>
                                              @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <th>Tổng Đơn Hàng</th>
                                                <td><strong><span class="amount">{{$total}}đ</span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                          <div class="card">
                                            <div class="card-header" id="#payment-1">
                                              <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Thanh Toán Trực Tiếp
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn hàng của bạn sẽ không được giao cho đến khi tiền được xóa trong tài khoản của chúng tôi.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-2">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Thanh Toán Online
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn hàng của bạn sẽ không được giao cho đến khi tiền được chuyển trong tài khoản của chúng tôi.</p>
                                              </div>
                                            </div>
                                          </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop
@section('script')
@stop