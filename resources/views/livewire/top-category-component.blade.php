<div>
    <div class="main-categori-wrap d-none d-lg-block">
        <a class="categori-button-active" href="#">
            <span class="fi-rs-apps"></span> Browse Categories
        </a>
        <div class="categori-dropdown-wrap categori-dropdown-active-large" style="z-index: 10">
            <ul>
                  @foreach($categories as $category)

                <li class="{{count($category->subCategories) >0 ? 'has-children':''}}">
                    <a href="{{route('product.category',['category_slug'=>$category->slug])}}"><i class="surfsidemedia-font-tshirt"></i>{{ucwords($category->name)}}</a>
                    <div class="dropdown-menu">
                        <ul class="mega-menu d-lg-flex">
                            <li class="mega-menu-col col-lg-7">
                                <ul class="d-lg-flex">
                                    <li class="mega-menu-col col-lg-6">
                                        <ul>
                                                @foreach($category->subCategories as $scategory)
                                            <li><a class="dropdown-item nav-link nav_item" href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}">{{ucwords($scategory->name)}}</a></li>
                                                @endforeach

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            @if(count($category->subCategories) >0)
                            <li class="mega-menu-col col-lg-5">
                                <div class="header-banner2">
                                    @if(strlen($category->image)<30)
                                    <img src="{{asset('frontend/assets/images/category')}}/{{$category->image}}" alt="menu_banner1">
                                    @else
                                        <img src="{{$category->image}}" alt="menu_banner1">
                                    @endif
                                    {{--<div class="banne_info">
                                        <h6>10% Off</h6>
                                        <h4>New Arrival</h4>
                                        <a href="#">Shop now</a>
                                    </div>--}}
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

                @endforeach
                <li>
                    <ul class="more_slide_open" style="display: none;">
                        <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Beauty, Health</a></li>
                        <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Bags and Shoes</a></li>
                        <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Consumer Electronics</a></li>
                        <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Automobiles & Motorcycles</a></li>
                    </ul>
                </li>
            </ul>
            <div class="more_categories">Show more...</div>
        </div>
    </div>
</div>
