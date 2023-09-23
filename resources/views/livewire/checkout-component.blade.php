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
        <section class="mt-10 mb-10">
            <div class="container">
                <form wire:submit.prevent="placeOrder">

                    <div class="row">
                        <div class="col-md-6 card">
                            <div class="mt-10 mb-20">
                                <h4>Billing Details</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="firstname" placeholder="First Name" type="text" wire:model="firstname">
                                        @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="lastname" placeholder="Your Last Name" type="text" wire:model="lastname">
                                        @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" wire:ignore>
                                <input  type="text" name="mobile" placeholder="Phone Number" wire:model="mobile" id="mobile">
                                @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group" wire:ignore>
                                <input  type="email" name="cname" placeholder="Email Address" wire:model="email" id="email">
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
                                            <select class="form-control" wire:model="division_id" wire:change="changeDistrict">
                                                <option value="">Select Division</option>
                                                @foreach($divisions as $division)
                                                <option value="{{$division->id}}">{{$division->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('division_id') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="col-sm-md-2">
                                        <div class="custom_select">
                                            <select class="form-control" wire:model="district_id">
                                                <option value="">Select District </option>
                                                @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('district_id') <span class="text-danger">{{$message}}</span> @enderror
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
                                        @error('thana') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="ship_detail">
                                <div class="form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress" value="1" wire:model="ship_to_defferent">
                                            <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>Ship to a different address?</span></label>
                                        </div>
                                    </div>
                                </div>
                               @if($ship_to_defferent)
                                <div id="" class="different_address in">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="s_firstname" placeholder="First Name" type="text" wire:model="s_firstname">
                                                @error('s_firstname') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="s_lastname" placeholder="Your Last Name" type="text" wire:model="s_lastname">
                                                @error('s_lastname') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input  type="text" name="s_phone" placeholder="Mobile Number" wire:model="s_mobile">
                                        @error('s_mobile') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input  type="email" name="s_email" placeholder="Email Address" wire:model="s_email">
                                        @error('s_email') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input  type="text" name="s_address" placeholder="Present Address" wire:model="s_address">
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
                                    </div>
                                </div>
                                @endif
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
                                                        <a href="#">{{ucwords($item->model->name)}}</a>
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
                                            <label class="form-check-label" for="exampleRadios3">Cash On Delivery</label>
                                        </div>

                                        <div class="custome-radio">
                                            <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios5" value="bkash" wire:model="paymentmode">
                                            <label class="form-check-label" for="exampleRadios5">Bkash</label>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios4" value="card" wire:model="paymentmode">
                                            <label class="form-check-label" for="exampleRadios4">Online Payment</label>
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
                                    <input class="form-check-input" type="checkbox"  value="1" wire:model="disabled" id="exampleRadios40">
                                    <label class="form-check-label mb-10" for="exampleRadios40" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">I have read and agree to the website terms and conditions,Return & Refund Policy</label>
                                </div>
                               <button type="submit" wire:click="checkoutModal" class="btn btn-primary action-btn small hover-up" {{ $disabled == 0 ?'disabled':'' }}>Place Order</button>

                             {{--   <a aria-label="Quick view"  class="btn btn-primary action-btn small hover-up"  type="submit" data-bs-toggle="modal" data-bs-target="#quickViewModal">Place Order</a>--}}

                            </div>
                        </div>
                     </div>
                </form>
            </div>
       </section>

        @if($paymentmode=='card')
            @livewire('modal-checkout-component')
        @endif
   </main>
</div>


