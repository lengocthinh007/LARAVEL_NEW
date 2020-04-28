<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('public/Backend/')}}/">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>@yield('title')</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' href='../fontawesome/css/all.min.css'>
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="datatables/dataTables.bootstrap4.css">
	<script type="text/javascript" src="../editor/ckeditor/ckeditor.js"></script>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link href="../toastr/toastr.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../formupload/css/style.css">
	@yield('link')
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Quản lí</span> Tài khoản</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<?php
				$avatar = get_data_user('web','avatar');
				?>
				@if($avatar != null)
				<img src="{{asset('public/Avatar/'.$avatar)}}" class="img-responsive" alt="">
				@else
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
				@endif
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">{{ get_data_user('web','name') }}</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li
			class="{{\Request::route()->getName()=='home'?'active':''}}" 
			><a href="{{asset('User/home')}}"> Tổng Quang</a></li>
			<li
			class="{{\Request::route()->getName()=='admin.cate.list'?'active':''}}" 
			><a href="{{asset('User/infor')}}">Thông Tin</a></li>
			<li
			class="{{\Request::route()->getName()=='admin.cate.pro'?'active':''}}"
			><a href="{{asset('User/password')}}">Password</a></li>
		
			<li><a href="{{asset('dang-xuat')}}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row" style="margin-bottom: 10px">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">@yield('title')</li>
			</ol>
		</div><!--/.row-->
		
		@include('errors.note2')
	    @if(get_data_user('web','active')==1)
        <p class="alert alert-danger">Tài khoản của bạn chưa kích hoạt. Hãy check địa chỉ email của bạn để kích hoạt</p>
        @endif	

		
		@yield('main')
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../toastr/toastr.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/myscript.js"></script>
<script src="datatables/jquery.dataTables.js"></script>
<script src="datatables/dataTables.bootstrap4.js"></script>
 @yield('script')
<script src="../formupload/js/app.js"></script>
</body>
</html>
