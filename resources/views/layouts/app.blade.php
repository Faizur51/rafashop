<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Surfside Media</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend')}}/assets/imgs/theme/favicon.ico">

    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/main.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/custom.css">

    @livewireStyles

</head>

<body>
<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li>
                                <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> English <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/flag-fr.png" alt="">Français</a></li>
                                    <li><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/flag-dt.png" alt="">Deutsch</a></li>
                                    <li><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/flag-ru.png" alt="">Pусский</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Get great devices up to 50% off <a href="shop.html">View details</a></li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today <a href="shop.html">Shop now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        @auth
                            <ul>
                            <li><i class="fi-rs-key"></i>{{auth()->user()->name}}  /
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();"> Logout</a>
                                </form>
                            </li>
                           </ul>
                          @else
                            <ul>
                                <li><i class="fi-rs-key"></i><a href="{{route('login')}}">Log In </a>  / <a href="{{route('register')}}">Sign Up</a></li>
                            </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="header-right">
                    @livewire('search-component')
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img class="svgInject" alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count blue">4</span>
                                </a>
                            </div>
                             @livewire('cart-icon-component')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{asset('frontend')}}/assets/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    @livewire('top-category-component')
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="active" href="/">Home </a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="{{route('shop')}}">Shop</a></li>
                                <li><a href="blog.html">Blog </a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                                <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                    @auth
                                        @if(auth()->user()->utype =='ADMIN')
                                    <ul class="sub-menu">
                                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                        <li><a href="{{route('admin.home.slider')}}">Manage HomeSlider</a></li>
                                        <li><a href="{{route('admin.category')}}">Manage Categories</a></li>
                                        <li><a href="{{route('admin.product')}}">Manage Products</a></li>
                                        <li><a href="{{route('admin.coupon')}}">Manage Coupons</a></li>
                                        <li><a href="{{route('admin.banner')}}">Manage Banner</a></li>
                                        <li><a href="{{route('admin.order')}}">Manage Orders</a></li>
                                        <li><a href="{{route('admin.customer')}}">Manage Customers</a></li>
                                        <li><a href="{{route('admin.review')}}">Manage Review</a></li>
                                        <li><a href="{{route('admin.setting')}}">Settings</a></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                        @else
                                            <ul class="sub-menu">
                                                <li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                                            </ul>
                                        @endif
                                    @endauth
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> 01717578265 </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.php">
                                <img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-heart.svg">
                                <span class="pro-count white">4000</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="cart.html">
                                <img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-cart.svg">
                                <span class="pro-count white">1000</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-3.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-4.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="cart.html">View cart</a>
                                        <a href="shop-checkout.php">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@livewire('mobile-view-component')

{{$slot}}

@livewire('footer-component')
<!-- Vendor JS-->
<script src="{{asset('frontend')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/slick.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/wow.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery-ui.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/select2.min.js"></script>

<script src="{{asset('frontend')}}/assets/js/plugins/waypoints.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/counterup.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/images-loaded.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/isotope.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/scrollup.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.elevatezoom.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>


<!-- Template  JS -->
<script src="{{asset('frontend')}}/assets/js/main.js?v=3.3"></script>
<script src="{{asset('frontend')}}/assets/js/shop.js?v=3.3"></script>



@stack('scripts')
@livewireScripts

<script>
    window.addEventListener('show-modal',function (){
          $('#showModal').modal('show')
    })
</script>




</body>

</html>
