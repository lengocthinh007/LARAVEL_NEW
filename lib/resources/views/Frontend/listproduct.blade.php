@extends('Frontend.master')
@section('title','List product')
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
  <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-1 order-lg-2">
                            <!-- Begin Li's Banner Area -->
                            <div class="single-banner shop-page-banner">
                                
                                    <img src="images/bg-banner/2.jpg" alt="Li's Static Banner">
                                
                            </div>
                            <!-- Li's Banner Area End Here -->
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <!-- shop-item-filter-list start -->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                          
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                  
                                </div>
                                <!-- product-select-box start -->
                                <div class="product-select-box">
                                    <div class="product-short">
                                        <p>Sắp xếp:</p>
                                        <form id="form_order" method="get">
                                        <select class="nice-select orderby" name="orderby">
                                            <option value="md" {{Request::get('orderby')=='md'||Request::get('orderby')?'selected':''}}>
                                                    <li class="shop_sorting_button" >Mặc định</li>
                                            </option>
                                            <option  value="desc" {{Request::get('orderby')=='desc'?'selected':''}}>
                                            <li class="shop_sorting_button">Mới Nhất</li>
                                            </option>
                                            <option value="asc" {{Request::get('orderby')=='asc'?'selected':''}}>
                                            <li class="shop_sorting_button" >Sản phẩm cũ</li>
                                            </option>
                                            <option value="price_max" {{Request::get('orderby')=='price_max'?'selected':''}}>
                                            <li class="shop_sorting_button" >Giá tăng dần</li>
                                            </option>
                                            <option value="price_min" {{Request::get('orderby')=='price_min'?'selected':''}}>
                                            <li class="shop_sorting_button" >Giá giảm dần</li>
                                            </option>
                                        </select>
                                    </form>
                                    </div>
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                           
                @if(!$products->isEmpty())
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                @if(isset($products))
                                                @foreach($products as $item)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="{{asset('Details/'.$item->id.'/'.$item->alias)}}">
                                                                <img width="50px" src="{{asset('public/Hinh/'.$item->image)}}" alt="Li's Product Image">
                                                            </a>
                                                @if($item->pro_sale)
                                                <span class="sticker">- {{$item->pro_sale}}%</span>
                                                @endif
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h1 class="manufacturer">
                                                                        <a href="{{asset('Details/'.$item->id.'/'.$item->alias)}}">Đánh Giá</a>
                                                                    </h1>
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
                                                                <h4><a class="product_name" href="{{asset('Details/'.$item->id.'/'.$item->alias)}}">{!! doimau($item->name,$key) !!}</a></h4>
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
                <?php
                  $pagination = paginate($products->currentPage(),$products->lastPage());
                ?>
                                    <div class="paginatoin-area">
                                        <div class="row">
                        <?php
                        $page    = $products->currentPage();
                        $total   = $products->total();
                        $perPage = $products->perPage();
                        $lastNumber  = $page * $perPage;
                        if ($lastNumber > $total) {
                           $lastNumber = $total;
                        }
                        $currentShowing =$lastNumber>$total ? $total :$lastNumber;
                        // $showingStarted = ($showingTotal - $perPage)+1;
                        $showingStarted = $page * $perPage - ($perPage - 1);
                        $tableInfo = "Showing $showingStarted to $lastNumber of $total";
                        ?>
                                            <div class="col-lg-6 col-md-6 pt-xs-15">
                                                <p>{{$tableInfo}}</p>
                                            </div>
                                         
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box pt-xs-20 pb-xs-15">
                                                    @if($pagination[0] != $products->currentPage())
                                                    <li><a href="{!! $products->appends($query)->url($products->currentPage()-1) !!}" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                                    </li>
                                                    @endif
                                                    @foreach($pagination as $i)
                                                    <li class="paginate_button page-item {!! ($i==$products->currentPage())?'active':'' !!}"><a href="{!! $products->appends($query)->url($i) !!}">{{$i}}</a></li>
                                                    @endforeach
                                                    @if($pagination[count($pagination) - 1] != $products->currentPage())
                                                    <li>
                                                      <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                  @else
                  <h3 style="text-align: center;margin-top: 50px">Không Tìm Thấy !</h3>
                  @endif
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                                <div class="sidebar-title">
                                    <h2>Thương Hiệu</h2>
                                </div>
                                <!-- category-sub-menu start -->
                                <div class="category-sub-menu">
                                    <ul>
                                    <?php
                                    $menu_1 = DB::table('cates')->where('parent_id',0)->get();
                                    ?>
                                    @foreach($menu_1 as $menu_1)
                                        <li class="has-sub"><a href="{{asset('loaisanpham/'.$menu_1->id.'/'.$menu_1->alias)}}">{!! $menu_1->name !!}</a>
                                             <?php
                                            $tam = DB::table('cates')->where('parent_id',$menu_1->id);
                                            $menu_2 = $tam->get();
                                            $dem = $tam->count();
                                            ?>
                                            <ul>
                                                 @foreach($menu_2 as $menu_2)
                                                <li><a href="{{asset('loaisanpham/'.$menu_2->id.'/'.$menu_2->alias)}}">{!! $menu_2->name !!}</a></li>
                                                 @endforeach
                                            </ul>
                                        </li>
                                     @endforeach  
                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box">
                                <div class="sidebar-title">
                                    <h2>Lọc</h2>
                                </div>
                                <!-- btn-clear-all start -->
                                 <button id="reseturl" class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                                <!-- btn-clear-all end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area">
                                    <h5 class="filter-sub-titel">Khoảng Giá</h5>
                                    <div class="categori-checkbox">
                                    
                                            <ul>
                                <li>
                                    <a class="{{Request::get('price')==1?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>1])}}">Dưới 1.000.000</a>
                                </li>
                                <li>
                                    <a class="{{Request::get('price')==2?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>2])}}">1.000.000 - 3.000.000</a>
                                </li>
                                <li>
                                    <a class="{{Request::get('price')==3?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>3])}}">3.000.000 - 5.000.000</a></li>
                                <li>
                                    <a class="{{Request::get('price')==4?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>4])}}">5.000.000 - 7.000.000</a></li>
                                <li>
                                    <a class="{{Request::get('price')==5?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>5])}}">7.000.000 - 10.000.000</a></li>
                                <li>
                                    <a class="{{Request::get('price')==6?'acti':''}}" href="{{request()->fullUrlWithQuery(['price'=>6])}}">Lớn hơn 10.000.000</a>
                                </li>
                                            </ul>
                                
                                    </div>
                                 </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                            
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                              
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                              
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                              
                                <!-- filter-sub-area end -->
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!-- category-sub-menu start -->
                       
                        </div>
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
        $('.orderby').change(function(){
            $("#form_order").submit();
        });
    });

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
     $('#reseturl').click(function(){
      var uri = window.location.href.toString();
        if (uri.indexOf("?") > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
            location.reload();
        }
  });
</script> 
@include('errors.front')
@stop