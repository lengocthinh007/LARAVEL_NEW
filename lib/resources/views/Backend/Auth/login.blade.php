 @extends('Frontend.master')
@section('title','Đăng nhập')
@section('main') 
 <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Đăng nhập - Đăng ký</li>
                        </ul>
                         @include('errors.note2')
                    </div>
                </div>
            </div>

            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form method="post" action="{{asset('dang-nhap')}}" >
                                    {{csrf_field()}}
                                <div class="login-form">
                                    <h4 class="login-title">Đăng Nhập</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email Address*</label>
                                            <input name="email" class="mb-0" type="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Password</label>
                                            <input name="password" class="mb-0" type="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input name="remember" type="checkbox" id="remember_me" value="remember_me">
                                                <label for="remember_me">Nhớ Tôi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="{{asset('lay-lai-mat-khau')}}"> Quên mật khẩu?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="register-button mt-0">Đăng nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form method="post" action="{{asset('dang-ky')}}">
                                 {{csrf_field()}}
                                <div class="login-form">
                                    <h4 class="login-title">Đăng Ký</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Tên</label>
                                            <input name="Name" class="mb-0" type="text" placeholder="Name">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Số Điện Thoại</label>
                                            <input  name="phone" class="mb-0" type="number" placeholder="Phone">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email</label>
                                            <input name="Email" class="mb-0" type="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Mật Khẩu</label>
                                            <input name="Password" class="mb-0" type="password" placeholder="Password">
                                        </div>
                                
                                        <div class="col-12">
                                            <button type="submit" class="register-button mt-0">Đăng Ký</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@stop
@section('script')
@stop