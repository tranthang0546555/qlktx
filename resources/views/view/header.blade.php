<!DOCTYPE html>
	<html lang="vi" class="no-js">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="img/fav.png">
		<meta name="author" content="colorlib">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta charset="UTF-8">
		<title>Home</title>

		{{-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">  --}}
		<link href="https://fonts.googleapis.com/css?family=Gelasio|Oswald|Roboto+Condensed&display=swap" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('view/css/header.css')}}">
			<link rel="stylesheet" href="{{asset('view/css/linearicons.css')}}">
			<link rel="stylesheet" href="{{asset('view/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('view/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('view/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('view/css/nice-select.css')}}">							
			<link rel="stylesheet" href="{{asset('view/css/animate.min.css')}}">
			<link rel="stylesheet" href="{{asset('view/css/jquery-ui.css')}}">			
			<link rel="stylesheet" href="{{asset('view/css/owl.carousel.css')}}">
			<link rel="stylesheet" href="{{asset('view/css/main.css')}}">
			<style>
				@import url('https://fonts.googleapis.com/css?family=Gelasio|Oswald|Roboto+Condensed&display=swap');
			</style>
		</head>
		<body>	
			  <header id="header" id="home">
		  		<div class="header-top">
		  			<div class="container">
				  		<div class="row align-items-center">
				  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
					      	<div class="menu-social-icons">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>	    				  					
				  			</div>
				  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
								<a class="btns" href="tel:+84 333333333">+84 333333333</a>
				  				<a class="btns" href="mailto:support@gmail.com">support@gmail.com</a>		
				  				<a class="icons" href="tel:+84 333333333">
				  					<span class="lnr lnr-phone-handset"></span>
				  				</a>
				  				<a class="icons" href="mailto:support@gmail.com">
				  					<span class="lnr lnr-envelope"></span>
				  				</a>		
				  			</div>
				  		</div>			  					
		  			</div>
				</div>
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
			    		<a href="{{ url('/') }}"><img src="{{asset('view/img/logo - Copy.png')}}" alt="" title="" /></a>		
						<nav id="nav-menu-container">
							<ul class="nav-menu">
							  <li class="menu-active"><a href="{{ url('/') }}">TRANG CH???</a></li>
							  <li><a href="{{ route('thongtin') }}">TH??NG TIN</a></li>
							  <li><a href="{{route('view.quychequydinh')}}">QUY CH??? - QUY ?????NH</a></li>
							  <li><a href="#">TH??NG B??O</a>
							  	<ul>
							      <li><a href="{{route('home')}}">Th??ng b??o chung</a></li>
							      <li><a href="#">Th??ng b??o c??ng t??c sinh vi??n</a></li>					              
							    </ul>
							  </li>
							  <li class="menu-has-children"><a href="">T??C V???</a>
							    <ul>
							      <li><a href="{{route('view.tacvu.dangki')}}">????ng k?? l??u tr??</a></li>
							      <li><a href="#">Bi???u m???u</a></li>
							      <li class="#"><a href="">Tra c???u</a>
							        <ul>
							          <li><a href="#">Ph??ng - gi?????ng</a></li>
							          <li><a href="#">T??m ki???m sinh vi??n ??ang l??u tr??</a></li>
							        </ul>
							      </li>					              
							    </ul>
							  </li>			          	          							  			          	          
							  <li><a href="{{ route('lienhe') }}">LI??N H???</a></li>
							  <li class="menu-has-children"><a href="{{ url('/login/sv') }}">????NG NH???P</a>
							    <ul>
							      <li><a href="{{ route('user.get.login') }}">SINH VI??N</a></li>
							      <li><a href="{{ route('admin.get.login') }}">QU???N L??</a></li>				              
							    </ul>
							  </li>	
							</ul>
						</nav><!-- #nav-menu-container -->		
			    	</div>
			    </div>
			  </header><!-- #header -->
			  
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								{{$url ?? ''}}	
							</h1>	
							{{-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.html"> Menu</a></p> --}}
						</div>	
					</div>
				</div>
			</section>