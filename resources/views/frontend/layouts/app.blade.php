<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('document_FE/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('document_FE/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('document_FE/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('document_FE/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('document_FE/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('document_FE/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('document_FE/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('document_FE/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('document_FE/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('document_FE/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('document_FE/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('document_FE/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <script src="{{ asset('document_FE/js/jquery.js') }}"></script>
</head><!--/head-->

<body>
    <?php
        $uri = $_SERVER["REQUEST_URI"];
        $uriArray = explode('/', $uri);
    ?>
	<header id="header"><!--header-->
    @include('frontend.layouts.header')
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
    <?php
    if($uriArray[1] !="account" && $uriArray[1] !="login_member"&& $uriArray[1] !="addcart" && $uriArray[1] !="checkout" && $uriArray[1] !="signup_member" ){
    ?>
    @include('frontend.layouts.slider')
    <?php
    }
    ?>
	</section><!--/slider-->
	
	<section>
	<div class="container">
    
    <?php
    if($uriArray[1] !="account" && $uriArray[1] !="login_member" && $uriArray[1] !="addcart"&& $uriArray[1] !="checkout"&& $uriArray[1] !="signup_member" ){
        
    ?>

    @include('frontend.layouts.menu-left')
    <?php
    }
    ?>
 
    	@yield('content')
	</div>
	</section>
	<br>
	<footer id="footer"><!--Footer-->
	@include('frontend.layouts.footer')
	</footer><!--/Footer-->
	

  
   
	<script src="{{ asset('document_FE/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('document_FE/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('document_FE/js/price-range.js') }}"></script>
    <script src="{{ asset('document_FE/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('document_FE/js/main.js') }}"></script>
</body>
</html>