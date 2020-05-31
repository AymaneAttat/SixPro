<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<link rel="icon" type="image/png" href="{{asset('dist/img/stor.ico')}}"/>
		<title>@yield('title','UchiStore')</title>
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}"/>
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset('dist/css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('dist/css/slick-theme.css')}}"/>
		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('dist/css/nouislider.min.css')}}"/>
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('dist/css/style.css')}}"/>
		<!-- <link type="text/css" rel="stylesheet" href="{{asset('boot/css/bootstrap.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('boot/css/bootstrap.min.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('dist/css/bootstrap-grid.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('boot/css/bootstrap-grid.min.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('boot/css/bootstrap-reboot.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('boot/css/bootstrap-reboot.min.css')}}"/> -->
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-right">
						<li><a href="/login/customer"><i class="fa fa-user-o"></i> My Account</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3"></div>
						<!-- /LOGO -->
						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<?php $cats = DB::table('categories')->where('status',1)->get(); ?>
									<select name="All Categories" class="input-select">
										<option hidden disabled selected value> All Categories </option>
										@forelse ($cats as $cat)
											<option value="{{$cat->id}}">{{ucwords($cat->name)}}</option>    
										@empty
											<option value="1">Category 01</option>
											<option value="1">Category 02</option>
										@endforelse
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ \Cart::getTotalQuantity()}}</div>
									</a>
									<div class="cart-dropdown">
										@if(count(\Cart::getContent()) > 0)
											<div class="cart-list">
												@foreach(\Cart::getContent() as $item)
													<div class="product-widget">
														<div class="product-img"><img src="/images/{{ $item->attributes->image }}" alt=""></div>
														<div class="product-body">
															<h3 class="product-name"><a href="#">{{$item->name}}</a></h3>
															<h4 class="product-price"><span class="qty">{{$item->quantity}}</span>Dh{{ \Cart::get($item->id)->getPriceSum() }}</h4>
														</div>
													</div>
												@endforeach	
											</div>
											<div class="cart-summary">
												<small>{{ \Cart::getTotalQuantity()}} Item(s) selected</small>
												<h5>Total: ${{ \Cart::getTotal() }}</h5>
												<form action="{{ route('cart.clear') }}" method="POST">
													{{ csrf_field() }}
													<button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i><a>Clear</a></button>
												</form>
											</div>
											
											<div class="cart-btns">
												<a href="{{route('cart.index')}}">View Cart</a>
												<a href="{{route('cart.checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
											</div>
										@endif
									</div>
								</div>
								<!-- /Cart -->
								<!-- Menu Toogle -->
								<div class="menu-toggle"><a href="#"><i class="fa fa-bars"></i><span>Menu</span></a></div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="/">Home</a></li>
						<li><a href="/categories">Categories</a></li>
						<li><a href="/shop">Shop</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		@include('sweetalert::alert')
		@yield('content')
		<!-- FOOTER -->
		@include('footer')
		<!-- /FOOTER -->
		<script src="{{asset('dist/js/jquery.min.js')}}"></script>
		<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('dist/js/slick.min.js')}}"></script>
		<script src="{{asset('dist/js/nouislider.min.js')}}"></script>
		<script src="{{asset('dist/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('dist/js/main.js')}}"></script>
		<!-- <script src="{{asset('boot/js/bootstrap.bundle.js')}}"></script>
		<script src="{{asset('boot/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('boot/js/bootstrap.js')}}"></script>
		<script src="{{asset('boot/js/bootstrap.min.js')}}"></script> -->
	</body>
</html>