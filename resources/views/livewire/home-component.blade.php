<div>

    <style>
        .load{
            font-family: Roboto-Medium;
            margin: 0 auto;
            display: block;
            width: 387px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            font-size: 14px;
            border: 1px solid #f85606;
            text-transform: uppercase;
            cursor: pointer;
        }
    </style>

    <main class="main" >
        <section class="home-slider position-relative pt-50" wire:ignore>
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @foreach($sliders as $slider)
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{ucwords($slider->top_title)}}</h4>
                                    <h2 class="animated fw-900">{{ucwords($slider->title)}}</h2>
                                    <h1 class="animated fw-900 text-brand">{{ucwords($slider->sub_title)}}</h1>
                                    <p class="animated">{{ucwords($slider->offer)}}</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="{{$slider->link}}"> Shop Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    @if(strlen($slider->image)<30)
                                   <img class="animated slider-1-1" src="{{asset('frontend/assets/images/slider')}}/{{$slider->image}}" alt="">
                                    @else
                                        <img class="animated slider-1-1" src="{{$slider->image}}" alt="">
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-1.png" alt="">
                            <h4 class="bg-1">Free Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-2.png" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-3.png" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-4.png" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-5.png" alt="">
                            <h4 class="bg-5">Happy Sell</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-6.png" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                        </li>
                    </ul>
                    <a href="#" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach($fproducts as $fproduct)

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                           @if(strlen($fproduct->image)<30)
                                             <a href="{{route('product.details',['slug'=>$fproduct->slug])}}">
                                                <img class="default-img" src="{{asset('frontend/assets/images/product')}}/{{$fproduct->image}}" alt="">
                                            </a>
                                             @else
                                                <a href="{{route('product.details',['slug'=>$fproduct->slug])}}">
                                                    <img class="default-img" src="{{$fproduct->image}}" alt="" style="height: 270px" >
                                                </a>
                                            @endif

                                        </div>
                                        {{--<div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                        </div>--}}
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop.html">{{ucwords($fproduct->category->name)}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',['slug'=>$fproduct->slug])}}">{{substr(ucwords($fproduct->name),0,30)}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            @php
                                            $loss=$fproduct->sale_price-$fproduct->regular_price;
                                            $percent=($loss/$fproduct->sale_price)*100;
                                            @endphp
                                            <span>
                                                <span>{{intval($percent)}}%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>&#2547; {{$fproduct->regular_price}} </span>
                                            @if($fproduct->sale_price)
                                            <span class="old-price">&#2547; {{$fproduct->sale_price}}</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$fproduct->id}},'{{$fproduct->name}}',{{$fproduct->regular_price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0)" wire:click="loadMore" class="btn btn-primary btn-sm load">LOAD MORE</a>
                    </div>
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <section class="banner-2 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="{{asset('frontend')}}/assets/imgs/banner/banner-4.png" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                        <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                        <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>



        <section class="popular-categories section-padding mt-15 mb-25" wire:ignore>
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        @foreach($pcategories as $pcategory)

                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">

                                @if(strlen($pcategory->image)<30)
                                    <a href="{{route('product.category',['category_slug'=>$pcategory->slug])}}"><img src="{{asset('frontend/assets/images/category')}}/{{$pcategory->image}}" alt=""></a>
                                @else
                                    <a href="{{route('product.category',['category_slug'=>$pcategory->slug])}}"><img src="{{$pcategory->image}}" alt=""></a>
                                @endif

                            </figure>
                            <h5><a href="{{route('product.category',['category_slug'=>$pcategory->slug])}}">{{ucwords($pcategory->name)}}</a></h5>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="banners mb-15">
            <div class="container">
                <div class="row">

                  @foreach($banners as $banner)
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            @if(strlen($banner->image)<30)
                            <img src="{{asset('frontend/assets/images/banner')}}/{{$banner->image}}" alt="">
                            @else
                                <img src="{{$banner->image}}" alt="">
                            @endif
                            <div class="banner-text">
                                <span>{{$banner->top_title}}</span>
                                <h4>Save {{$banner->title}}</h4>
                                <a href="{{$banner->link}}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <section class="section-padding" wire:ignore>
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @foreach($lproducts as $lproduct)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    @if(strlen($lproduct->image)<30)
                                    <a href="{{route('product.details',['slug'=>$lproduct->slug])}}">
                                        <img class="default-img" src="{{asset('frontend/assets/images/product')}}/{{$lproduct->image}}" alt="">
                                    </a>
                                   @else
                                    <a href="{{route('product.details',['slug'=>$lproduct->slug])}}">
                                        <img class="default-img" src="{{$lproduct->image}}" alt="" style="height: 190px">
                                    </a>
                                 @endif
                                </div>
                               {{-- <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                </div>--}}
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{route('product.details',['slug'=>$lproduct->slug])}}">{{substr(ucwords($lproduct->name),0,20)}}</a></h2>
                                @php
                                    $loss=$lproduct->sale_price-$lproduct->regular_price;
                                    $percent=($loss/$lproduct->sale_price)*100;
                                @endphp
                                <div class="rating-result" title="90%">
                                    <span>{{intval($percent)}}%</span>
                                </div>
                                <div class="product-price">
                                    <span>&#2547; {{$lproduct->regular_price}} </span>
                                    <span class="old-price">&#2547; {{$lproduct->sale_price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding" wire:ignore>
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('frontend')}}/assets/imgs/banner/brand-1.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('frontend')}}/assets/imgs/banner/brand-2.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('frontend')}}/assets/imgs/banner/brand-3.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('frontend')}}/assets/imgs/banner/brand-4.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('frontend')}}/assets/imgs/banner/brand-5.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('frontend')}}/assets/imgs/banner/brand-6.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('frontend')}}/assets/imgs/banner/brand-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
