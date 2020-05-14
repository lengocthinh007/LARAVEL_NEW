@extends('Frontend.master')
@section('title','Home')
@section('main') 
<style type="text/css">
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
  font-size: 12px
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #f8ce0b;
  font-size: 12px
}
</style> 
  <!-- Static Top Area End Here -->
            <!-- product-area start -->
            <div class="product-area pt-55 pb-25 pt-xs-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Hàng Mới</span></a></li>
                                   <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bán Chạy</span></a></li>
                                   <li><a data-toggle="tab" href="#li-featured-product"><span>Nổi Bật</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                	 @if(isset($products))
                                     @foreach($products as $item)
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
                                                 <?php
                                                 $cate_name = DB::table('cates')->select('name')->where('id',$item->cate_id)->first();
                                                 ?>
                                                            <a href="product-details.html">{{$cate_name->name}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                    <?php
                      $age = 0;
                      $star=0;
                      if($item->pro_total_rating)
                      {
                        $age = round($item->pro_total_number / $item->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                     <div class="stars-outer">
                            <div class="stars-inner" style="width:{{$star}}%"></div>
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
                                                        <li class="add-cart active"><a href="{{asset('cart/add/'.$item->id)}}">Chọn Mua</a></li>
                                                       <li><a href="{{asset('details/'.$item['id'])}}" data-key="{{$item['id']}}" class="quick-view-btn js_review"><i class="fa fa-eye"></i></a></li>
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
                        <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                  	 @if(isset($pro_pay))
                                     @foreach($pro_pay as $item)
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
                                                 <?php
                                                 $cate_name = DB::table('cates')->select('name')->where('id',$item->cate_id)->first();
                                                 ?>
                                                            <a href="product-details.html">{{$cate_name->name}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                    <?php
                      $age = 0;
                      $star=0;
                      if($item->pro_total_rating)
                      {
                        $age = round($item->pro_total_number / $item->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                     <div class="stars-outer">
                            <div class="stars-inner" style="width:{{$star}}%"></div>
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
                                                        <li class="add-cart active"><a href="{{asset('cart/add/'.$item->id)}}">Chọn Mua</a></li>
                                                       <li><a href="{{asset('details/'.$item['id'])}}" data-key="{{$item['id']}}" class="quick-view-btn js_review"><i class="fa fa-eye"></i></a></li>
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
                        <div id="li-featured-product" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                 	 @if(isset($pro_popu))
                                     @foreach($pro_popu as $item)
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
                                                 <?php
                                                 $cate_name = DB::table('cates')->select('name')->where('id',$item->cate_id)->first();
                                                 ?>
                                                            <a href="product-details.html">{{$cate_name->name}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                    <?php
                      $age = 0;
                      $star=0;
                      if($item->pro_total_rating)
                      {
                        $age = round($item->pro_total_number / $item->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                     <div class="stars-outer">
                            <div class="stars-inner" style="width:{{$star}}%"></div>
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
                                                        <li class="add-cart active"><a href="{{asset('cart/add/'.$item->id)}}">Chọn Mua</a></li>
                                                       <li><a href="{{asset('details/'.$item['id'])}}" data-key="{{$item['id']}}" class="quick-view-btn js_review"><i class="fa fa-eye"></i></a></li>
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
                    </div>
                </div>
            </div>
            <!-- product-area end -->
            <!-- Begin Li's Static Banner Area -->
            <div class="li-static-banner li-static-banner-4 text-center pt-20">
                <div class="container">
                    <div class="row">
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-6">
                            <div class="single-banner pb-sm-30 pb-xs-30">
                                <a href="#">
                                    <img src="images/banner/2_3.jpg" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-6">
                            <div class="single-banner">
                                <a href="#">
                                    <img src="images/banner/2_4.jpg" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Static Banner Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Laptop</span>
                                </h2>
                              
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                   @if(isset($pro_laptop))
                                     @foreach($pro_laptop as $item)
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
                                                 <?php
                                                 $cate_name = DB::table('cates')->select('name')->where('id',$item->cate_id)->first();
                                                 ?>
                                                            <a href="product-details.html">{{$cate_name->name}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                    <?php
                      $age = 0;
                      $star=0;
                      if($item->pro_total_rating)
                      {
                        $age = round($item->pro_total_number / $item->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                     <div class="stars-outer">
                            <div class="stars-inner" style="width:{{$star}}%"></div>
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
                                                        <li class="add-cart active"><a href="{{asset('cart/add/'.$item->id)}}">Chọn Mua</a></li>
                                                       <li><a href="{{asset('details/'.$item['id'])}}" data-key="{{$item['id']}}" class="quick-view-btn js_review"><i class="fa fa-eye"></i></a></li>
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
            <!-- Li's Laptop Product Area End Here -->
            <!-- Begin Li's TV & Audio Product Area -->
            <section class="product-area li-laptop-product li-tv-audio-product pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Audio</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @if(isset($pro_audio))
                                     @foreach($pro_audio as $item)
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
                                                 <?php
                                                 $cate_name = DB::table('cates')->select('name')->where('id',$item->cate_id)->first();
                                                 ?>
                                                            <a href="product-details.html">{{$cate_name->name}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                    <?php
                      $age = 0;
                      $star=0;
                      if($item->pro_total_rating)
                      {
                        $age = round($item->pro_total_number / $item->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                     <div class="stars-outer">
                            <div class="stars-inner" style="width:{{$star}}%"></div>
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
                                                        <li class="add-cart active"><a href="{{asset('cart/add/'.$item->id)}}">Chọn Mua</a></li>
                                                       <li><a href="{{asset('details/'.$item['id'])}}" data-key="{{$item['id']}}" class="quick-view-btn js_review"><i class="fa fa-eye"></i></a></li>
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
            <!-- Li's TV & Audio Product Area End Here -->
            <!-- Begin Li's Static Home Area -->
          
            <!-- Li's Static Home Area End Here -->
            <!-- Begin Group Featured Product Area -->
            <div class="group-featured-product pt-60 pb-40 pb-xs-25">
                <div class="container">
                    <div class="row">
                        <!-- Begin Featured Product Area -->
                        @if($cate_home)
					    @foreach($cate_home as $cate)
                        <div class="col-lg-4">
                            <div class="featured-product">
                                <div class="li-section-title">
                                    <h2>
                                        <span>{{$cate->name}}</span>
                                    </h2>
                                </div>
                                <div class="featured-product-active-2 owl-carousel">
                                    <div class="featured-product-bundle">
                                    	@if($cate->products)
					                    @foreach($cate->products as $item)
                                        <div class="row">
                                            <div class="group-featured-pro-wrapper">
                                                <div class="product-img">
                                                    <a href="{{asset('Details/'.$item->id.'/'.$item->alias)}}">
                                                        <img alt="" src="{{asset('public/Hinh/'.$item->image)}}">
                                                    </a>
                                                </div>
                                                <div class="featured-pro-content">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                 <?php
                                                 $cate_name = DB::table('cates')->select('name')->where('id',$item->cate_id)->first();
                                                 ?>
                                                            <a href="{{asset('Details/'.$item->id.'/'.$item->alias)}}">{{$cate_name->name}}</a>
                                                        </h5>
                                                    </div>
                                                    <div class="rating-box">
                      <?php
                      $age = 0;
                      $star=0;
                      if($item->pro_total_rating)
                      {
                        $age = round($item->pro_total_number / $item->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                     <div class="stars-outer">
                            <div class="stars-inner" style="width:{{$star}}%"></div>
                        </div>
                                                    </div>
                                                    <h4><a class="featured-product-name" href="single-product.html">{{$item->name}}</a></h4>
                                                    <div class="featured-price-box">
                                                        <span class="new-price">{!! number_format($item->price,0,',','.') !!} VNĐ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                          				@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                         @endforeach
                         @endif
                        <!-- Featured Product Area End Here -->
                        <!-- Begin Featured Product Area -->
                       
                        <!-- Featured Product Area End Here -->
                    </div>
                </div>
            </div>

             <!--   Modal -->
              <div class="modal fade modal-wrapper" id="myModalorder" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="md_content">
                        
                    </div>
                </div>
            </div>   
@stop
@section('script')
<script type="text/javascript">

    $(function(){
    $('.js_review').click(function(event){
      event.preventDefault();
      let $this = $(this);
      let url = $this.attr('href');
      $("#md_content").html('');
      $("#myModalorder").modal('show');
     $.ajax({
        url: url,
      }).done(function(result) {
        if(result)
        {
          $("#md_content").append(result);
          // Hieu ung slide
             Detail();   
             qty();         
          // Hieu ung slide
        }
      });
    }); 
  });
</script> 
@stop