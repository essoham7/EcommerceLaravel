
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="description" content="Bootstrap e-commerce html template similar to Alibaba">
<meta name="keywords" content="Online template, shop, theme, template, html, css, bootstrap 4">
@yield('extra-meta')

<title>Website title - bootstrap alistyle html template</title>

@yield('extra-script')

<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">



<!-- jQuery -->
<script src=" {{ asset('js/jquery-2.0.0.min.js') }} " type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src=" {{ asset('js/bootstrap.bundle.min.js')}} " type="text/javascript"></script>
<link href=" {{ asset('css/bootstrap.css?v=2.0')}} " rel="stylesheet" type="text/css"/>

<!-- Style essoham -->
<link href=" {{ asset('css/style.css')}} " rel="stylesheet" type="text/css"/>


<!-- Font awesome 5 -->
<link href="{{ asset('fonts/css/all.min.css')}}" type="text/css" rel="stylesheet">
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" type="text/css" rel="stylesheet"> --}}

<!-- custom style -->
<link href="{{ asset('css/ui.css?v=2.0')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/responsive.css?v=2.0')}}" rel="stylesheet" type="text/css" />

<!-- laravel -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

<!-- custom javascript -->
<script src="{{ asset('js/script.js?v=2.0')}}" type="text/javascript"></script>

</head>
<body>





<header class="section-header">
<section class="header-main border-bottom">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-2 col-lg-3 col-md-12">
				<a href="{{ url('/') }}" class="brand-wrap">
					<img class="logo" src="images/logo.png?v=2.0">
				</a> <!-- brand-wrap.// -->
			</div>
			<div class="col-xl-6 col-lg-5 col-md-6">

                @include('partials.search')
            </div> <!-- col.// -->

			<div class="col-xl-4 col-lg-4 col-md-6">

                @auth

                <div class="widgets-wrap float-md-right">
					<div class="widget-header mr-3">
						<a href="#" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-user"></i>
								<span class="notify">3</span>
							</div>
							<small class="text"> My profile </small>
						</a>
                    </div>

					<div class="widget-header mr-3">
						<a href="#" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-comment-dots"></i>
								<span class="notify">1</span>
							</div>
							<small class="text"> Message </small>
						</a>
                    </div>

					<div class="widget-header mr-3">
						<a href="#" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-store"></i>
							</div>
							<small class="text"> Orders </small>
						</a>
                    </div>

                @endauth


					<div class="widget-header">
						<a href="{{ route('cart.index')}}" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-shopping-cart"></i>
							<span class="notify">{{ Cart::count() }}</span>
							</div>
							<small class="text"> Cart </small>
						</a>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->

<nav class="navbar navbar-main navbar-expand-lg border-bottom">
<div class="container">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="main_nav">
	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bars text-muted mr-2"></i> Demo pages </a>
			<div class="dropdown-menu dropdown-large">
				<nav class="row">
					<div class="col-6">
						<a href="page-index-1.html">Home page 1</a>
						<a href="page-index-2.html">Home page 2</a>
						<a href="page-category.html">All category</a>
						<a href="page-listing-large.html">Listing list</a>
						<a href="page-listing-grid.html">Listing grid</a>
						<a href="page-shopping-cart.html">Shopping cart</a>
						<a href="page-detail-product.html">Product detail</a>
						<a href="page-content.html">Page content</a>
						<a href="page-user-login.html">Page login</a>
						<a href="page-user-register.html">Page register</a>
					</div>
					<div class="col-6">
						<a href="page-profile-main.html">Profile main</a>
						<a href="page-profile-orders.html">Profile orders</a>
						<a href="page-profile-seller.html">Profile seller</a>
						<a href="page-profile-wishlist.html">Profile wishlist</a>
						<a href="page-profile-setting.html">Profile setting</a>
						<a href="page-profile-address.html">Profile address</a>
						<a href="rtl-page-index-1.html">RTL home page</a>
						<a href="page-components.html" target="_blank">More components</a>
					</div>
				</nav> <!--  row end .// -->
			</div> <!--  dropdown-menu dropdown-large end.// -->
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ route('products.index') }}">{{ __('Shop') }}</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="#">Trade shows</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="#">Services</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="#">Sell with us</a>
		</li>
	</ul>
	<ul class="navbar-nav ml-md-auto">
       @include('partials.auth')
		</ul>
	</div> <!-- collapse .// -->
</div> <!-- container .// -->
</nav>

</header> <!-- section-header.// -->
 @if (session('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ session('success')}}
		</div>

 @endif

 @if (session('danger'))
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ session('danger')}}
		</div>

 @endif

 @if (count($errors) > 0)
 <div class="alert alert-danger alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
     <ul class="mb-0 mt-0">
         @foreach ($errors->all() as $error)
         <li>
            {{ $error }}
         </li>
         @endforeach
     </ul>
 </div>
@endif

 @if (request()->input('q'))

    <h6 class="padding-y-lg">{{ $products->total() }} résultat(s) pour la recherche '{{ request()->q}}' </h6>
 @endif

    @yield('store')



<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="section-subscribe padding-y-lg">
    <div class="container">

    <p class="pb-2 text-center text-white">Delivering the latest product trends and industry news straight to your inbox</p>

    <div class="row justify-content-md-center">
        <div class="col-lg-5 col-md-6">
    <form class="form-row">
            <div class="col-md-8 col-7">
            <input class="form-control border-0" placeholder="Your Email" type="email">
            </div> <!-- col.// -->
            <div class="col-md-4 col-5">
            <button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
            </div> <!-- col.// -->
    </form>
    <small class="form-text text-white-50">We’ll never share your email address with a third-party. </small>
        </div> <!-- col-md-6.// -->
    </div>


    </div>
    </section>
    <!-- ========================= SECTION SUBSCRIBE END// ========================= -->


    <!-- ========================= FOOTER ========================= -->
    <footer class="section-footer bg-secondary">
        <div class="container">
            <section class="footer-top padding-y-lg text-white">
                <div class="row">
                    <aside class="col-md col-6">
                        <h6 class="title">Categories</h6>

                         <ul class="list-unstyled">
                            @foreach (App\Category::all() as $category)
                            <li><a href="{{route('products.list',['categorie' =>$category->slug]) }}"> {{$category->name}} </a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Company</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">About us</a></li>
                            <li> <a href="#">Career</a></li>
                            <li> <a href="#">Find a store</a></li>
                            <li> <a href="#">Rules and terms</a></li>
                            <li> <a href="#">Sitemap</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Help</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">Contact us</a></li>
                            <li> <a href="#">Money refund</a></li>
                            <li> <a href="#">Order status</a></li>
                            <li> <a href="#">Shipping info</a></li>
                            <li> <a href="#">Open dispute</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Pages</h6>
                        <ul class="list-unstyled">

                            @guest

                            <li> <a href="{{ route('login') }}"> {{ __('Login') }} </a></li>

                            <li> <a href="{{ route('register') }}"> {{ __('Register') }} </a></li>
                            @endguest


                            @auth

                            <li> <a href="{{ route('home') }}"> Account Setting </a></li>
                            <li> <a href="#"> My Orders </a></li>
                            @endauth

                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Social</h6>
                        <ul class="list-unstyled">
                            <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
                            <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
                            <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
                            <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
                        </ul>
                    </aside>
                </div> <!-- row.// -->
            </section>	<!-- footer-top.// -->

            <section class="footer-bottom text-center">

                    <p class="text-white">Privacy Policy - Terms of Use - User Information Legal Enquiry Guide</p>
                    <p class="text-muted"> &copy {{date('y')}} Company name, All rights reserved </p>
                    <br>
            </section>
        </div><!-- //container -->
    </footer>
    <!-- ========================= FOOTER END // ========================= -->

    @yield('extra-js')

    </body>
    </html>
