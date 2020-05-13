@if($products)
 <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                   <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                           @if(isset($imgdetails))
                                           @foreach($imgdetails as $item)
                                            <div class="lg-image">
                                                <img src="{{asset('public/HinhDetails/large/'.$item->image)}}">
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">     @if(isset($imgdetails))
                                             @foreach($imgdetails as $item)                                    
                                            <div class="sm-image"><img src="{{asset('public/HinhDetails/small/'.$item->image)}}" alt="product image thumb"></div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>{{$products->name}}</h2>
                                           
                                            <div class="rating-box pt-20">
                                                   <?php
                     $age = 0;
                     $star = 0;
                      if($products->pro_total_rating !=0)
                      {
                        $age = round($products->pro_total_number / $products->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                   <div class="stars-outer">
                        <div class="stars-inner" style="width: {{$star}}%"></div>
                   </div>
                                            </div>
                                            <div class="price-box pt-20">
                                        @if($products->pro_sale)
                                        <span style="" class="new-price new-price-2">{!! number_format($products->price * (100 - $products->pro_sale)/100,0,',','.') !!} VNĐ</span>
                                        <p style="text-decoration: line-through;">{!! number_format($products->price,0,',','.') !!} VNĐ</p>
                                        @else
                                        <span style="" class="new-price new-price-2">{!! number_format($products->price,0,',','.') !!} VNĐ</span>
                                        @endif
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>{!!$products->description!!}
                                                    </span>
                                                </p>
                                            </div>
                                         
                                            <div class="single-add-to-cart">
                                                <form action="{{asset('cart/add/'.$products->id)}}" class="cart-quantity">
                                                    <div class="quantity">
                                                        <label>Số lượng</label>
                                                        <div class="cart-plus-minus">
                                                            <input name="qty" class="cart-plus-minus-box" value="1" type="text">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Chọn Mua</button>
                                                </form>
                                            </div>
                                            <div class="product-additional-info pt-25">
                                              
                                                <div class="product-social-sharing pt-25">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endif