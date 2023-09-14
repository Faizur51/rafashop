<div>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{asset('frontend')}}/assets/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{route('product.category',['category_slug'=>$category->slug])}}"><i class="surfsidemedia-font-dress"></i>{{ucwords($category->name)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('shop')}}">Shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Blog</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('contact')}}">Contact</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{route('login')}}">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{route('register')}}">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"> 01717578265 </a>
                    </div>
                </div>

                @if($setting)
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="{{$setting->facebook}}"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="{{$setting->twiter}}"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="{{$setting->instagram}}"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="{{$setting->youtube}}"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
                @else
                    <div class="mobile-social-icon">
                        <h5 class="mb-15 text-grey-4">Follow Us</h5>
                        <a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                        <a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                        <a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                        <a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>
