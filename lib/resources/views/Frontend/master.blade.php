<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- 40432:14-->
<head>
        <base href="{{asset('public/Frontend/')}}/">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
       <!--  <link rel="stylesheet" href="css/material-design-iconic-font.min.css"> -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
       <!--  <link rel="stylesheet" href="css/fontawesome-stars.css"> -->
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="css/slick.css">
        <!-- Animate CSS -->
        <!-- <link rel="stylesheet" href="css/animate.css"> -->
        <!-- Jquery-ui CSS -->
        <!-- <link rel="stylesheet" href="css/jquery-ui.min.css"> -->
        <!-- Venobox CSS -->
       <!--  <link rel="stylesheet" href="css/venobox.css"> -->
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="css/nice-select.css">
        <!-- Magnific Popup CSS -->
      <!--   <link rel="stylesheet" href="css/magnific-popup.css"> -->
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
        <link rel='stylesheet' href='../fontawesome/css/all.min.css'>
        @yield('link')
        <!-- Modernizr js -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <link href="../toastr/toastr.min.css" rel="stylesheet">
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Telephone :</span><a href="#">(+123) 123 321 345</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        @if(Auth::check())
                                        <li>
                                            <div class="ht-setting-trigger"><span>{{ get_data_user('web','name') }}</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="{{asset('User/home')}}">My Account</a></li>
                                                    <li><a href="{{asset('cart/show')}}">Checkout</a></li>
                                                    <li><a href="{{asset('dang-xuat')}}">Thoát</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endif
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                        @if(!Auth::check())
                                        <li>
                                           <a href="{{asset('dang-ky')}}"> <span class="currency-selector-wrapper">Đăng Ký</span></a>
                                          
                                        </li>
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                        <li>
                                            <a href="{{asset('dang-nhap')}}"><span class="language-selector-wrapper">Đăng Nhập</span></a>
                                           
                                        </li>
                                        @endif
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.html">
                                        <img width="190px" height="60px" src="images/menu/logo/1.PNG" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="{{asset('tim-kiem')}}" method="get" class="hm-searchbox">
                                    <select name="cate" class="nice-select select-search-category">
                                        <option value="">All</option>                      
                                       <?php cate_parent($caten,0,"--",\Request::get('cate')); ?>
                                    </select>
                                    <input name="k" type="text" placeholder="Enter your search key ..." value="{{\Request::get('k')}}">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                       
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span style="font-weight: bold;" class="item-text">{{Cart::subtotal(0,'.','.')}} đ
                                                    <span class="cart-item-count">{{Cart::count()}}</span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                    @foreach(Cart::content() as $item)
                                                    <li>
                                                        <a href="{{asset('Details/'.$item->id.'/'.$item->options->alias)}}" class="minicart-product-image">
                                                            <img src="{{asset('public/HinhDetails/small/'.$item->options->img)}}" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="{{asset('Details/'.$item->id.'/'.$item->options->alias)}}">{{$item->name}}</a></h6>
                                                            <span>{{number_format($item->price,0,',','.')}} đ x {{$item->qty}}</span>
                                                        </div>
                                                        <a href="{{asset('cart/delete/'.$item->rowId)}}" class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </li>
                                                     @endforeach
                                                </ul>
                                                <p class="minicart-total">Tổng Tiền: <span>{{Cart::subtotal(0,'.','.')}} đ</span></p>
                                                <div class="minicart-button">
                                                    <a href="{{asset('cart/show')}}" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Xem Giỏ Hàng</span>
                                                    </a>
                                                    <a href="{{asset('thanh-toan')}}" class="li-button li-button-fullwidth">
                                                        <span>Thanh Toán</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li><a href="{{asset('/')}}">Trang Chủ</a></li>
                                    <?php
                                    $menu_1 = DB::table('cates')->where('parent_id',0)->get();
                                    ?>
                                    @foreach($menu_1 as $menu_1)
                                            <li class="dropdown-holder"><a href="{{asset('loaisanpham/'.$menu_1->id.'/'.$menu_1->alias)}}">{!! $menu_1->name !!}</a>
                                    <?php
                                    $tam = DB::table('cates')->where('parent_id',$menu_1->id);
                                    $menu_2 = $tam->get();
                                    $dem = $tam->count();
                                    ?>
                                        @if($dem!=0)
                                                <ul class="hb-dropdown">
                                   
                                        @foreach($menu_2 as $menu_2)
                                                    <li><a href="{{asset('loaisanpham/'.$menu_2->id.'/'.$menu_2->alias)}}">{!! $menu_2->name !!}</a></li>
                                        @endforeach
                                                </ul>
                                        @endif
                                            </li>
                                    @endforeach        
                                     <li><a href="{{asset('lien-he')}}">Liên Hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Li's Breadcrumb Area -->
            @yield('main')
            <!-- Error 404 Area End -->
            <!-- Begin Footer Area -->
            <div class="footer">
                <!-- Begin Footer Static Top Area -->
               
                <!-- Footer Static Top Area End Here -->
                <!-- Begin Footer Static Middle Area -->
                <div class="footer-static-middle">
                    <div class="container">
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row">
                                <!-- Begin Footer Logo Area -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                        <img width="200px" height="70px" src="images/menu/logo/1.PNG" alt="Footer Logo">
                                        <p class="info">
                                           Chúng tôi là một nhóm các nhà thiết kế và nhà phát triển tạo ra Mẫu HTML & Wooc Commerce chất lượng cao, Shopify Theme.
                                        </p>
                                    </div>
                                    <ul class="des">
                                       
                                        <li>
                                            <span>Phone: </span>
                                            <a href="#">(+123) 123 321 345</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto://info@yourdomain.com">info@yourdomain.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Sản Phẩm</h3>
                                        <ul>
                                            <li><a href="#">Giảm Giá</a></li>
                                            <li><a href="#">Sản Phẩm Mới</a></li>
                                            <li><a href="#">Bán Chạy</a></li>
                                            <li><a href="#">Liên Hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Công Ty</h3>
                                        <ul>
                                            <li><a href="#">Giới Thiệu</a></li>
                                            <li><a href="#">Thông báo pháp lý</a></li>
                                            <li><a href="#">Về chúng tôi</a></li>
                                            <li><a href="#">Liên Hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-4">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Follow Us</h3>
                                        <ul class="social-link">
                                            <li class="twitter">
                                                <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                   <i class="fab fa-twitter-square"></i>
                                                </a>
                                            </li>
                                            <li class="rss">
                                                <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="RSS">
                                                    <i class="fa fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                   <i class="fab fa-google"></i>
                                                </a>
                                            </li>
                                            <li class="facebook">
                                                <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Begin Footer Newsletter Area -->
                                    <div class="footer-newsletter">
                                        <h4>Đăng Ký Nhận Bản Tin</h4>
                                        <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email" />
                                                <button  class="btn" id="mc-submit">Subscribe</button>
                                              </div>
                                           </div>
                                        </form>
                                    </div>
                                    <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
                
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
      <!--   <script src="js/ajax-mail.js"></script> -->
        <!-- Meanmenu js -->
        <script src="js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
      <!--   <script src="js/wow.min.js"></script> -->
        <!-- Slick Carousel js -->
        <script src="js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
       <!--  <script src="js/jquery.magnific-popup.min.js"></script> -->
        <!-- Isotope js -->
      <!--   <script src="js/isotope.pkgd.min.js"></script> -->
        <!-- Imagesloaded js -->
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
      <!--   <script src="js/jquery.mixitup.min.js"></script> -->
        <!-- Countdown -->
        <script src="js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
       <!--  <script src="js/waypoints.min.js"></script> -->
        <!-- Barrating -->
       <!--  <script src="js/jquery.barrating.min.js"></script> -->
        <!-- Jquery-ui -->
       <!--  <script src="js/jquery-ui.min.js"></script> -->
        <!-- Venobox -->
       <!--  <script src="js/venobox.min.js"></script> -->
        <!-- Nice Select js -->
        <script src="js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="js/main.js"></script>
        <script type="text/javascript" src="../toastr/toastr.min.js"></script>
        @yield('script')
    </body>

<!-- 40432:14-->
</html>
