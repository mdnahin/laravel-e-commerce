<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @foreach(App\FavIcon::all() as $fav)
    <link rel="shortcut icon" type="image/png" href="{{ url('img').'/'.'logo'.'/'.$fav->favicon_image }}">
    @endforeach
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{ url('frontend') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            @forelse(App\Topbar::all() as $topbar)
                            <li><i class="fa fa-phone"></i> {{ $topbar->title_one }}</li>
                            <li><i class="fa fa-envelope"></i>{{ $topbar->title_two }} </li>
                            @empty
                            <li></li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                @auth
                                    <li><a href="{{ route('CartPage') }}">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                    
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endauth
                                </ul>
                            </li>
                            @guest
                            <li><a href="{{ route('login') }}"> Login/Register </a></li>
                            @else
                            <li>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     
                                        <i class="fi-power"></i> <span>Logout</span>
                                 </a>
                            </li>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                        @foreach(App\Logo::all() as $logo)
                        <img src="{{ url('/img/logo') }}/{{ $logo->logo_image }}" alt="{{ $logo->logo_image }}">
                        @endforeach
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li>
                                    <a href="{{ url('/shop') }}">Shop</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('CartPage') }}">Cart</i></a>
                                    
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>2</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ url('frontend') }}/images/cart/1.jpg" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ url('frontend') }}/images/cart/3.jpg" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li>Subtotol: <span class="pull-right">$70.00</span></li>
                                    <li>
                                        <button>Check Out</button>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>2</span></a>
                                <ul class="cart-wrap dropdown_style">
                                @php 
                                    $total=0;
                                @endphp
                                @foreach(App\Cart::all() as $cart_pro)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img style="width:70px;height:85px" src="{{ url('img/thumbnail').'/'.$cart_pro->product->product_thumbnail }}" alt="">
                                        </div>
                                        @php $total += $cart_pro->product->product_price*$cart_pro->product_quantity @endphp
                                        <div class="cart-content">
                                            <a href="{{ route('CartPage') }}">{{ $cart_pro->product->product_name }}</a>
                                            <span>QTY : {{ $cart_pro->product_quantity }}</span>
                                            <p>${{ $cart_pro->product->product_price }}</p>
                                            <a href="{{ route('DeleteCart',$cart_pro->id) }}"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                @endforeach 
                                    <li>Subtotol: <span class="pull-right">${{ $total }}</span></li>
                                    <li>
                                        <button><a href="{{ route('Checkout') }}">Check Out</a></button>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                    <ul aria-expanded="false">
                                      <li><a href="about.html">About Page</a></li>
                                      <li><a href="single-product.html">Product Details</a></li>
                                      <li><a href="cart.html">Shopping cart</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->
    @yield('content')
    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form action="{{ url('/newsletter') }}" method="post">
                            @csrf
                                <input type="text" name="subs_email" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                            @if(session('Success'))

                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ session('Success') }}</strong>
                                </div>
                            @endif

                            @if(session('Failed'))
                                <div class="alert alert-warning alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ session('Failed') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                        @php
                            $social_link=App\FooterOne::first();
                        @endphp
                            <ul class="d-flex">
                                <li><a target="_blank" href="{{ $social_link->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" href="{{ $social_link->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank" href="{{ $social_link->linkden }}"><i class="fa fa-linkedin"></i></a></li>
                                <li><a target="_blank" href="{{ $social_link->instragram }}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @php
                        $footer_items=App\FooterTwo::first();
                    @endphp
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>{{ $footer_items->footer_desc }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> {{ $footer_items->email }}</a></li>
                                <li><a href="#"><span>Tel:</span> {{ $footer_items->telephone }}</a></li>
                                <li><a href="#"><span>Adress:</span> {{ $footer_items->address }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>{!! $footer_items->copy_right  !!}-{{  date('Y') }}.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->

    <!-- jquery latest version -->
    <script src="{{ url('frontend') }}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ url('frontend') }}/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ url('frontend') }}/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{ url('frontend') }}/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ url('frontend') }}/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ url('frontend') }}/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ url('frontend') }}/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{ url('frontend') }}/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{ url('frontend') }}/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ url('frontend') }}/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{ url('frontend') }}/js/mailchimp.js"></script>
    <!-- jquery-ui.minjs -->
    <script src="{{ url('frontend') }}/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{ url('frontend') }}/js/scripts.js"></script>

    @yield('footer_js')
</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->
</html>
