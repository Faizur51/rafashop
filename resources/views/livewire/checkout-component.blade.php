<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <form wire:submit.prevent="placeOrder">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-25">
                                <h4>Billing Details</h4>
                            </div>
                            <div class="form-group">
                                <input type="text"  name="name" placeholder="Name *" wire:model="name">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input  type="text" name="cname" placeholder="Phone Number" wire:model="phone">
                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input  type="text" name="cname" placeholder="Email Address" wire:model="email">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input  type="text" name="cname" placeholder="Present Address" wire:model="address">
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="row mb-3 ">
                                <div class="col-md-4">
                                    <div class="col-sm-md-2">
                                        <div class="custom_select">
                                            <select class="form-control" wire:model="city">
                                                <option value="">Select City</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="WS">Western Samoa</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="col-sm-md-2">
                                        <div class="custom_select">
                                            <select class="form-control" wire:model="district">
                                                <option value="">Select City</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="WS">Western Samoa</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-sm-md-2">
                                        <div class="custom_select">
                                            <select class="form-control" wire:model="thana">
                                                <option value="">Select City</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="WS">Western Samoa</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="ship_detail">
                                <div class="form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                            <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>Ship to a different address?</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseAddress" class="different_address collapse in">
                                    <div class="form-group">
                                        <input type="text" name="fname" placeholder="name*" wire:model="s_name" >
                                        @error('s_name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <input  type="text" name="cname" placeholder="Mobile Number" wire:model="s_phone">
                                        @error('s_phone') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input  type="text" name="cname" placeholder="Email Address" wire:model="s_email">
                                        @error('s_email') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input  type="text" name="cname" placeholder="Present Address" wire:model="s_address">
                                        @error('s_address') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="row mb-3 ">

                                        <div class="col-md-4">
                                            <div class="col-sm-md-2">
                                                <div class="custom_select">
                                                    <select class="form-control" wire:model="s_city">
                                                        <option value="">Select City</option>
                                                        <option value="AX">Aland Islands</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="WS">Western Samoa</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="col-sm-md-2">
                                                <div class="custom_selectv">
                                                    <select class="form-control" wire:model="s_district">
                                                        <option value="">Select City</option>
                                                        <option value="AX">Aland Islands</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="WS">Western Samoa</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-sm-md-2">
                                                <div class="custom_select">
                                                    <select class="form-control" wire:model="s_thana">
                                                        <option value="">Select City</option>
                                                        <option value="AX">Aland Islands</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="WS">Western Samoa</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Order notes"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="mb-20">
                                    <h4>Your Orders</h4>
                                </div>
                                <div class="table-responsive order_table text-center">
                                    @if(session()->has('checkout'))
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(Cart::instance('cart')->content() as $item)
                                                <tr>
                                                    <td class="image product-thumbnail">
                                                        @if(strlen($item->model->image) <30)
                                                        <img src="{{asset('frontend/assets/images/product')}}/{{$item->model->image}}" alt="#">
                                                        @else
                                                        <img src="{{$item->model->image}}" alt="#">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <h5><a href="product-details.html">{{$item->model->name}}</a></h5>
                                                        <span class="product-qty">x {{$item->qty}}</span>
                                                    </td>
                                                    <td>&#2547; {{$item->subtotal()}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th>Subtotal</th>
                                                <td class="product-subtotal" colspan="2">&#2547; {{session()->get('checkout')['subtotal']}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax({{config('cart.tax')}}%)</th>
                                                <td class="product-subtotal" colspan="2">&#2547; {{session()->get('checkout')['tax']}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">&#2547; {{session()->get('checkout')['total']}}</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="payment_method">
                                    <div class="mb-25">
                                        <h5>Payment</h5>
                                    </div>
                                    <div class="payment_option d-flex justify-content-around">
                                        <div class="custome-radio">
                                            <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios3" value="cod" wire:model="paymentmode">
                                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>
                                        </div>

                                        <div class="custome-radio">
                                            <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios5" value="bkash" wire:model="paymentmode">
                                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">bkash</label>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios4" value="card" wire:model="paymentmode">
                                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Online Payment</label>
                                        </div>
                                    </div>
                                    @error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                @if($paymentmode == 'bkash')
                                    <div class="row">
                                        <div class="col-lg-12 align-self-center mb-lg-0 mb-4">
                                            <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated animated animated" style="visibility: visible;">Bkash</h6>
                                            <p>Pay securely by Credit/Debit card, Internet banking or Mobile banking through SSLCommerz.
                                                Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                        </div>
                                    </div>
                                @elseif($paymentmode == 'card')
                                    <div class="row">
                                        <div class="col-lg-12 align-self-center mb-lg-0 mb-4">
                                            <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated animated animated" style="visibility: visible;">Online Pyment</h6>
                                            <p>Pay securely by Credit/Debit card, Internet banking or Mobile banking through SSLCommerz.
                                                Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                        </div>
                                    </div>
                                @endif
                                <strong class="text-danger">Cash on delivery</strong>
                                    <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox"  id="exampleRadios40">
                                    <label class="form-check-label" for="exampleRadios40" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">I have read and agree to the website terms and conditions,Return & Refund Policy</label>
                                </div>
                                <a aria-label="Quick view"  class="btn btn-primary action-btn small hover-up"  type="submit" data-bs-toggle="modal" data-bs-target="#quickViewModal">Place Order</a>
                            </div>
                        </div>
                     </div>
                </form>
            </div>
       </section>
   </main>
</div>

{{--quick view--}}
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body" >
                <section class="mt-50 mb-50">
                    <div class="container">
                        <div class="row">
                            <table class="table shopping-summery text-center ">
                                <thead style="background-color: #f5f5f5">
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            @if(strlen($item->model->image) <30)
                                                <img src="{{asset('frontend/assets/images/product')}}/{{$item->model->image}}" alt="#">
                                            @else
                                                <img src="{{$item->model->image}}" alt="#">
                                            @endif
                                        </td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="product-details.html">{{$item->model->name}}</a></h5>
                                            {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus.</p>--}}
                                        </td>
                                        <td class="price" data-title="Price"><span>&#2547; {{$item->model->regular_price}} </span></td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <span class="qty-val">{{$item->qty}}</span>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>&#2547; {{$item->subtotal}} </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <div class="table-responsive">
                                            @if(Session::has('coupon'))
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td class="cart_total_label">Cart Subtotal></td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{Cart::instance('cart')->subtotal()}}</span></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="cart_total_label">Discount:Coupon Code:{{Session::get('coupon')['code']}}</td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{number_format($discount,2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Subtotal with Discount</td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{number_format($subtotalAfterDiscount,2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Tax({{config('cart.tax')}}%)</td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{number_format($taxAfterDiscount,2)}}</span></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="cart_total_label">Total</td>
                                                        <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">&#2547; {{number_format($totalAfterDiscount,2)}}</span></strong></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            @else
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td class="cart_total_label">Cart Subtotal</td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{Cart::instance('cart')->subtotal()}}</span></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="cart_total_label">Tax</td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{Cart::instance('cart')->tax()}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Shipping</td>
                                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Total</td>
                                                        <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">&#2547; {{Cart::instance('cart')->total()}}</span></strong></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="detail-extralink">

                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart">Confirm Order</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
