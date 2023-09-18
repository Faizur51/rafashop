<div class="container pt-5">
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="card col-md-5">
                        <div class="mt-25 mb-25">
                            <h4>Shipping Details</h4>
                        </div>
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex animated animated" style="visibility: visible;">
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">J. Bezos </h5>
                                <p class="font-sm text-grey-50">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex animated animated" style="visibility: visible;">
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                    J. Bezos
                                </h5>
                                <p class="font-sm text-grey-5">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex animated animated" style="visibility: visible;">
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                    J. Bezos
                                </h5>
                                <p class="font-sm text-grey-5">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->orderItems as $item)
                                            <tr>
                                                <td class="image product-thumbnail">
                                                    @if(strlen($item->product->image) <30)
                                                        <img src="{{asset('frontend/assets/images/product')}}/{{$item->product->image}}" alt="#">
                                                    @else
                                                        <img src="{{$item->product->image}}" alt="#">
                                                    @endif
                                                </td>
                                                <td>
                                                    <h5><a href="#">{{ucwords($item->product->name)}}</a></h5>
                                                    <span class="product-qty">x {{$item->quantity}}</span>
                                                </td>
                                                <td>&#2547; {{$item->price*$item->quantity}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th>Subtotal</th>
                                            <td class="product-subtotal" colspan="2">&#2547; {{$item->price*$item->quantity}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax({{config('cart.tax')}}%)</th>
                                            <td class="product-subtotal" colspan="2">&#2547; {{round(($item->price*$item->quantity)*15/100)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">&#2547; {{$item->price*$item->quantity+round(($item->price*$item->quantity)*15/100)}}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>
