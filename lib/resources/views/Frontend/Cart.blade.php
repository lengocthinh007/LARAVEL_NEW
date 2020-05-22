@extends('Frontend.master')
@section('title','Cart')
@section('link')
 <link rel="stylesheet" type="text/css" href="step/main.css">
@stop
@section('main') 
<style type="text/css">
    .bold {
        font-weight: bold !important;
    }
</style>
<script type="text/javascript">
   
        function updateCart(qty,rowId){
            $.get(
                '{{asset('cart/update')}}',
                {qty:qty,rowId:rowId},
                function(){
                    location.reload();
                }
                )
        }
    </script>
    <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
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
                        <div class="col-12">
                            @if(Cart::count()>=1)
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove bold">Xóa</th>
                                                <th class="li-product-thumbnail bold">Hình</th>
                                                <th width="35%" class="cart-product-name bold">Sản Phẩm</th>
                                                <th class="li-product-price bold">Giá</th>
                                                <th class="li-product-quantity bold">Số Lượng</th>
                                                <th class="li-product-subtotal bold">Thành Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                            <tr>
                                                <td class="li-product-remove"><a href="{{asset('cart/delete/'.$item->rowId)}}"><i class="fas fa-times-circle"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="{{asset('Details/'.$item->id.'/'.$item->options->alias)}}"><img src="{{asset('public/HinhDetails/small/'.$item->options->img)}}" alt="Li's Product Image"></a></td>
                                                <td class="li-product-name"><a style="color: black" href="{{asset('Details/'.$item->id.'/'.$item->options->alias)}}">{{$item->name}}</a></td>
                                                <td class="li-product-price"><span style="font-weight: normal;" class="amount">{{number_format($item->price,0,',','.')}} đ</span></td>
                                                <?php
                                                $qty = DB::table('products')->where('id', $item->id)->value('pro_number');
                                                ?>
                                                <td class="quantity">
                                                    <?php
                                                     $dem =  DB::table('order')
                                                        ->join('transaction', 'order.transaction_id', '=', 'transaction.id')
                                                        ->where('product_id',$item->id)
                                                        ->where('status',0)
                                                        ->sum('qty');
                                                    ?>
                                                        <input max="{{$qty-$dem}}" style="width: 30%;margin-left: 35%" class="form-control" type="number" value="{{$item->qty}}" onchange="updateCart(this.value,'{{$item->rowId}}')">
                                                   
                                                </td>
                                                <td class="product-subtotal"><span style="font-weight: normal;" class="amount">{{number_format($item->price*$item->qty,0,',','.')}} đ</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                              
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <ul>
                                                <li>Tổng Tiền <span>{{$total}}đ</span></li>
                                                <li style="text-align: center;"><a style="font-weight: bold;color: black" href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a></li>
                                            </ul>
                                            <a style="font-weight: bold" href="{{asset('thanh-toan')}}">Thanh Toán</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <h2 style="text-align: center;">Giỏ hàng rỗng!</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
	@stop
@section('script') 
@stop