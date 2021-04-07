
<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{ asset('document_FE/images/home/logo.png') }}" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<?php if(Auth::check()){ ?>
								<li><a href="{{url('/account')}}"><i class="fa fa-user"></i> Account</a></li>
								<?php } ?>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{url('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="{{url('/addcart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								
								<?php if(Auth::check()){ ?>
									<?php $users = Auth::user() ?>
									<li><a href="{{ url('/logout_member/') }}"><?php echo $users->name ; ?> <i class="fa fa-lock"></i> logout</a></li>
									
								<?php }else{ ?>
								<li><a href="{{ url('/login_member/') }}"><i class="fa fa-lock"></i> login </a></li>
								<li><a href="{{ url('/signup_member') }}"><i class="fa fa-lock"></i>signup</a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{url('/index')}}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{url('/home_product')}}">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="{{url('/addcart')}}">Cart</a></li> 
										<li><a href="{{ url('/login_member/') }}">Login</a></li> 
										
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="/blogs_index">Blog List</a></li>
										<li><a href="/blogs_single/{id}">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<?php if(Auth::check()){ ?>
								<li><a href="{{url('/account')}}">Account</a></li>
								<?php } ?>
								<li><a href="contact-us.html">Contact</a></li>
								<li><a href="{{url('/search_advanced')}}"> Search Advanced</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
						<form method="get" action="{{url('/search')}}" >
						@csrf
							<input type="text" name="search" placeholder="Search"/>
							<button type="submit" class="btn btn-default" >Search</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
		
