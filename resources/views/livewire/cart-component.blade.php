<div>
    <style>
        .fi-rs-trash:hover{
            color:red !important;
        }
        .fi-rs-cross-small:hover{
            color:red !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>

        <section class="mt-10 mb-10">
            @if(Cart::instance('cart')->count()>0)
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>Success| {{Session::get('success_message')}}</strong>
                                </div>
                            @endif
                                @if(Cart::instance('cart')->count()>0)
                            <table class="table shopping-summery text-center">
                                <thead class="bg-light">
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td class="image product-thumbnail">
                                        @if(strlen($item->model->image)<30)
                                        <img src="{{asset('frontend/assets/images/product')}}/{{$item->model->image}}" alt="#">
                                        @else
                                            <img src="{{$item->model->image}}" alt="#">
                                        @endif
                                    </td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{substr(ucwords($item->model->name),0,25)}}</a></h5>
                                    </td>
                                    <td class="price" data-title="Price"><span>&#2547; {{$item->model->regular_price}} </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">{{$item->qty}}</span>
                                            <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')" ><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>&#2547; {{$item->subtotal}} </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="#" class="text-muted" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                    @endforeach
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted" wire:click.prevent="clearAll()"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                                @else
                                    <h1>Cart item not found</h1>
                                @endif
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn" href="/"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>


                        @php
                            $cart=Cart::instance('cart')->content()->pluck('id');
                        @endphp

                               <div class="row mb-50">
                                  <div class="col-lg-6 col-md-12">
                                    @if(session()->has('coupon_message'))
                                     <div class="alert alert-info">
                                         <p>{{session()->get('coupon_message')}}</p>
                                     </div>
                                     @endif
                                   <div class="mb-30 mt-5">
                                    <div class="heading_s1 mb-3">
                                        <h4>Apply Coupon</h4>
                                    </div>
                                    <div class="total-amount">
                                        <div class="left">
                                            <div class="coupon">
                                                <form action="#" wire:submit.prevent="applyCouponCode">
                                                    <div class="form-row row justify-content-center">
                                                        <div class="form-group col-lg-6">
                                                            <input class="font-medium" name="coupon" placeholder="Enter Your Coupon"  wire:model="couponCode">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <button  class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Apply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                     </div>
                                    </div>
                                  </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">

                                        @if(Session::has('coupon'))
                                            <table class="table ">
                                                <tbody>
                                                <tr>
                                                    <td class="cart_total_label bg-light">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{Cart::instance('cart')->subtotal()}}</span></td>
                                                </tr>

                                                <tr>
                                                    <td class="cart_total_label bg-light">Discount:Coupon Code:{{Session::get('coupon')['code']}}</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{number_format($discount,2)}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label bg-light">Subtotal with Discount</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{number_format($subtotalAfterDiscount,2)}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label bg-light">Tax({{config('cart.tax')}}%)</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{number_format($taxAfterDiscount,2)}}</span></td>
                                                </tr>

                                                <tr>
                                                    <td class="cart_total_label bg-light">Total</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">&#2547; {{number_format($totalAfterDiscount,2)}}</span></strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @else
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td class="cart_total_label bg-light">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{Cart::instance('cart')->subtotal()}}</span></td>
                                                </tr>

                                                <tr>
                                                    <td class="cart_total_label bg-light">Tax</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{Cart::instance('cart')->tax()}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label bg-light">Shipping</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label bg-light">Total</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">&#2547; {{Cart::instance('cart')->total()}}</span></strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endif

                                    </div>
                                    <a href="#" class="btn" wire:click.prevent="checkout"> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
               <div class="text-center" style="padding: 5px 0">
                 <h1>Your Cart is empty</h1>
                   <p>Add items to it now!</p>
                   <img src="{{asset('frontend\assets\images\cart/cart1.jpeg')}}" alt="" >
                   <br>
                   <a href="/" class="btn btn-primary ">Shop Now</a>
               </div>
            @endif
        </section>
    </main>
</div>
