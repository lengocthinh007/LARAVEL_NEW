@extends('Frontend.master')
@section('title','Product details')
@section('main')
<style type="text/css">
    .list_star i:hover{
        cursor: pointer;
    }
    .list_text{
        display: inline-block;
    margin-left: 10px;
    position: relative;
    background: #52b858;
    color: #fff;
    padding: 2px 8px;
    box-sizing: border-box;
    font-size: 12px;
    border-radius: 2px;
    display: none;
    }
    .list_text:after{
        right: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(82,184,88,0);
    border-right-color: #52b858;
    border-width: 6px;
    margin-top: -6px;
    }
    a {
        text-decoration: none !important;
    }
    .list_star .rating_active{
        color:#fd9727;
    }




  .stars-outer {
  position: relative;
  display: inline-block;
  margin-bottom: 5px;
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}

.stars-outer::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #ccc;
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #f8ce0b;
}



.hideContent {
    overflow: hidden;
    line-height: 1em;
    height: 10em;
}

.showContent {
    line-height: 1em;
    height: auto;
}
.showContent{
    height: auto;
}
.show-more {
    padding: 10px 0;
    text-align: center;
}
</style>   
  <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Single Product</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    @if(isset($imgdetails))
                                    @foreach($imgdetails as $item)
                                    <div class="lg-image">
                                        <img src="{{asset('public/HinhDetails/large/'.$item->image)}}" alt="product image">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">
                                    @if(isset($imgdetails))
                                    @foreach($imgdetails as $item)
                                    <div class="sm-image"><img src="{{asset('public/HinhDetails/small/'.$item->image)}}" alt="product image thumb"></div>
                                    @endforeach
                                    @endif
                                  
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content sp-normal-content pt-60">
                                <div class="product-info">
                                    <h2>{{$products->name}}</h2>
                                    <span class="product-details-ref">Thương hiệu: {{$cate->name}}</span>
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
                        [ {{$age}} điểm / {{$products->pro_total_rating}} lượt]
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
                                  
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Mổ tả sản phẩm</span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Đánh Giá</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description content hideContent" >
                                <span>{!! $products->pro_content !!}</span>
                            </div>
                            <div class="show-more">
                                    <a href="#">Hiển Thị Thêm</a>
                             </div>
                        </div>
                    
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
            <!-- hiển thị đánh giá -->
             <div class="component_rating_content" style="display: flex;align-items: center;position: relative;border-radius: 5px;border: 1px solid #dedede">
                <div class="rating_item" style="width: 20%">
                    <span class="fa fa-star" style="font-size: 100px;color: #fd9727;display: block;text-align: center;margin: 0 auto">
                    </span>
                    <b style="top: 50%;left: 10%;transform: translateX(-50%) translateY(-50%);position: absolute;color: white;font-size: 20px">{{$age}}
                    </b>
                </div>
                    <div class="list_rating" style="width: 60%;padding: 20px">
                        <?php
                        $i=1;
                        if($arrayrating==null)
                        {
                            $arrayrating=[1,2,3,4,5];
                        }
                        ?>
                        @foreach($arrayrating as $key => $arrayrating)
                        <?php
                        $itemage=0;
                        if($products->pro_total_rating !=0)
                        $itemage = round(($arrayrating['total'] / $products->pro_total_rating)*100);
                        ?>
                <div class="item_rating" style="display: flex;align-items: center;">
                        <div style="width: 10%">
                                {{$i++}}<span class="fa fa-star"></span>
                        </div>
                        <div style="width: 70%;margin:0 20px">
                             <span style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px;background-color: #e9e9e9">
                                <b style="width: {{$itemage}}%;background-color: #fd9727;display: block;border-radius: 5px;height: 100%">
                                </b>
                             </span>
                        </div>
                        <div style="width: 20%">
                                <a href="">{{$arrayrating['total']}} Đánh giá ({{$itemage}}%)</a>
                        </div>
                        </div>
                        @endforeach
                    </div>
                <div style="width: 20%">
                      @if(Auth::check())
                         <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Đánh Giá Của Bạn!</a>
                         </div>
                       @else
                       <div class="review-btn">
                                        <a class="review-links" href="{{asset('dang-nhap')}}">Đăng nhập để đánh giá</a>
                         </div>
                       @endif
                </div>
                
            </div>
           <!--  Hien danh gia -->

         <!--   Comemnt -->
          <div id="comment" class="component_list_rating" style="margin-top: 30px">
                @foreach($listrating as $item)
                <div class="rating_item" style="margin-bottom: 20px">
                    <div>
                        <span>{{isset($item->user->name)?$item->user->name:''}}</span>
                        <a href="" style="color:#2ba832"><i class="fas fa-check"></i>  Đã mua hàng tại web</a>
                    </div>
                    <p style="margin-bottom: 0px">
                        <span>
                             <div class="stars-outer">
                                <div class="stars-inner" style="width: {{($item->number/5)*100}}%"></div>
                            </div>
                        </span>
                         {{$item->content}}
                         <div>
                        <span><i class="fas fa-eye"></i>  {{$item->created_at}}</span>
                    </div>
                    </p>
                    </div>
                @endforeach
                
            </div>
       <!--   comment -->

                                   
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">Đánh Giá Của Bạn!</h3>
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                           <div class="li-review-product">
                                                               <img src="{{asset('public/Hinh/'.$products->image)}}" alt="Li's Product">
                                                               <div class="li-review-product-desc">
                                                                   <p class="li-product-name">{{$products->name}}</p>
                                                                   <p>
                                                                       <span>{!!$products->description!!}</span>
                                                                   </p>
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">GỬI NHẬN XÉT CỦA BẠN</h3>
                                                                    <form method="post" id="comment_form">
                                                                            <p class="your-opinion">
                                                                                <label>Chọn đánh giá</label>
                                                                                <br>
                   <span style="margin-right: 15px;font-size: 15px" class="list_star">
                        @for($i=1;$i<=5;$i++)
                        <i class="fa fa-star" data-key="{{$i}}"></i>
                        @endfor
                    </span>
                    <span class="list_text">Tốt</span>
                    <input type="hidden" value="" class="number_rating">
                                                                            </p>
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Viết nhận xét của bạn vào bên dưới:</label>
                                                                                <textarea id="ra_content" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                            
                                                                                <div class="feedback-btn pb-15">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Đóng</a>
                                                                                    <a href="{{asset('ajax/danh-gia/'.$products->id)}}" class="js_rating_product" >Gửi</a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Sản Phẩm liên quan:</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                      @if(isset($pro_care))
                                      @foreach($pro_care as $item)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{asset('Details/'.$item->id.'/'.$item->alias)}}">
                                                    <img src="{{asset('public/Hinh/'.$item->image)}}" alt="Li's Product Image">
                                                </a>
                                                @if($item->pro_sale)
                                                <span class="sticker">- {{$item->pro_sale}}%</span>
                                                @endif
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{$cate->name}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                 <?php
                     $age = 0;
                     $star = 0;
                      if($item->pro_total_rating !=0)
                      {
                        $age = round($item->pro_total_number / $item->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                   <div class="stars-outer">
                        <div class="stars-inner" style="width: {{$star}}%"></div>
                   </div>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">{{$item->name}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{!! number_format($item->price,0,',','.') !!} VNĐ</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                        <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                     @endforeach
                                     @endif
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
@stop
@section('script')
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
    //danh gia
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            let liststar = $(".list_star .fa");
            listratingtext = {
                    1 : 'Không Thích',
                    2 : 'Tạm Được',
                    3 : 'Bình Thường',
                    4 : 'Rất Tốt',
                    5 : 'Tuyệt Vời Quá',
                }

            liststar.mouseover(function(){
            let $this = $(this);
            let number = $this.attr('data-key');
            $(".number_rating").val(number);
            liststar.removeClass('rating_active')

            $.each(liststar, function(key,value){
                if(key+1 <= number)
                {
                    $(this).addClass('rating_active');
                }
            });

            $(".list_text").text('').text(listratingtext[$this.attr('data-key')]).show();
            });
        });
      
        $(".js_rating_product").click(function(e){
            event.preventDefault();
            let content = $("#ra_content").val();
            let number = $(".number_rating").val();
            let url = $(this).attr('href');
            if(content && number)
            {
                  $.ajax({
                    url: url,
                    type:"post",
                    data : {
                    number : number,
                    content: content
                 },
                    success:function(data){

                            $('#comment_form')[0].reset();
                            $('#mymodal').modal('hide');
                              var html = '';
                       if(data!='')
                         {
                           $.each (JSON.parse(data), function (key, item){
                            html +=  '<div class="rating_item" style="margin-bottom: 20px">';
                            html+= '<div><span>'+item['name']+'</span>';
                            html+=' <a href="" style="color:#2ba832"><i class="fas fa-check"></i>  Đã mua hàng tại web</a>';
                            html+='</div><p style="margin-bottom: 0px"><span><div class="stars-outer">';
                            html+=' <div class="stars-inner" style="width:'+(item['number']/5)*100+'%"></div></div>';
                            html+=' </span>'+item['content']+'<div><span><i class="fas fa-eye"></i> '+item['created_at'].replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3")+'</span></div></p></div>';
                            });

                         }
                        $('#comment').prepend(html);
                    },error:function(){ 
                        alert("error!!!!");
                    }
                });
            }
            else
            {
                alert('Chưa nhập nội dung hoặc đánh giá');
            }
        });

 $(".show-more a").on("click", function(e) {
    e.preventDefault();
    var $this = $(this); 
    var $content = $this.parent().prev("div.content");
    var linkText = $this.text().toUpperCase(); 
    
    if(linkText === "HIỂN THỊ THÊM"){
        linkText = "Thu gọn";
        $content.switchClass("hideContent", "showContent", 400);
    } else {
        linkText = "Hiển Thị Thêm";
        $content.switchClass("showContent", "hideContent", 400);
    };

    $this.text(linkText);
});
</script>
@include('errors.front')
@stop