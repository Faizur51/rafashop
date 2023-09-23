<div class="container pt-5">

    <style>
        .hh-grayBox {
            background-color: #F8F8F8;
            margin-bottom: 20px;
            padding: 35px;
            margin-top: 20px;
        }
        .pt45{padding-top:45px;}
        .order-tracking{
            text-align: center;
            width: 25%;
            position: relative;
            display: block;
        }
        .order-tracking .is-complete{
            display: block;
            position: relative;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            border: 0px solid #AFAFAF;
            background-color: #f7be16;
            margin: 0 auto;
            transition: background 0.25s linear;
            -webkit-transition: background 0.25s linear;
            z-index: 2;
        }
        .order-tracking .is-complete:after {
            display: block;
            position: absolute;
            content: '';
            height: 14px;
            width: 7px;
            top: -2px;
            bottom: 0;
            left: 5px;
            margin: auto 0;
            border: 0px solid #AFAFAF;
            border-width: 0px 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
        }
        .order-tracking.completed .is-complete{
            border-color: #27aa80;
            border-width: 0px;
            background-color: #27aa80;
        }
        .order-tracking.completed .is-complete:after {
            border-color: #fff;
            border-width: 0px 3px 3px 0;
            width: 7px;
            left: 11px;
            opacity: 1;
        }
        .order-tracking p {
            color: #A4A4A4;
            font-size: 16px;
            margin-top: 8px;
            margin-bottom: 0;
            line-height: 20px;
        }
        .order-tracking p span{font-size: 14px;}
        .order-tracking.completed p{color: #000;}
        .order-tracking::before {
            content: '';
            display: block;
            height: 3px;
            width: calc(100% - 40px);
            background-color: #f7be16;
            top: 13px;
            position: absolute;
            left: calc(-50% + 20px);
            z-index: 0;
        }
        .order-tracking:first-child:before{display: none;}
        .order-tracking.completed:before{background-color: #27aa80;}

    </style>

    <main class="main">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>My Order</h5>
                    <div class="d-flex">
                        <a href="{{route('admin.order')}}" class="btn btn-success btn-sm ml-5">Manage Order</a>
                    </div>
                </div>
            </div>
            <div class="card-bodyn">
                @if($order->status !=='cancel')
                    <div class="col-12 col-md-12 hh-grayBox pt45 pb20">
                        @if($order->status=='ordered')
                            <div class="row justify-content-between">
                                <div class="order-tracking {{$order->status=='ordered' ?'completed':''}}">
                                    <span class="is-complete"></span>
                                    <p>Ordered<br><span>{{Carbon\Carbon::parse($order->created_at)->format('d F Y g:i A')}}</span></p>
                                </div>
                                <div class="order-tracking">
                                    <span class="is-complete"></span>
                                    <p>Processed<br></p>
                                </div>

                                <div class="order-tracking">
                                    <span class="is-complete"></span>
                                    <p>Shipping<br></p>
                                </div>
                                <div class="order-tracking">
                                    <span class="is-complete"></span>
                                    <p>Delivered<br></p>
                                </div>
                            </div>
                        @elseif($order->status=='processed')
                            <div class="row justify-content-between">
                                <div class="order-tracking completed">
                                    <span class="is-complete"></span>
                                    <p>Ordered<br><span>{{Carbon\Carbon::parse($order->created_at)->format('d F Y g:i A')}}</span></p>
                                </div>
                                <div class="order-tracking {{$order->status=='processed' ?'completed':''}}">
                                    <span class="is-complete"></span>
                                    <p>Processed<br><span>{{Carbon\Carbon::parse($order->processed_date)->format('d F Y g:i A')}}</span></p>
                                </div>
                                <div class="order-tracking">
                                    <span class="is-complete"></span>
                                    <p>Shipping<br></p>
                                </div>
                                <div class="order-tracking">
                                    <span class="is-complete"></span>
                                    <p>Delivered<br></p>
                                </div>
                            </div>
                        @elseif($order->status=='shipping')
                            <div class="row justify-content-between">
                                <div class="order-tracking completed">
                                    <span class="is-complete"></span>
                                    <p>Ordered<br><span>{{Carbon\Carbon::parse($order->created_date)->format('d F Y g:i A')}}</span></p>
                                </div>

                                <div class="order-tracking completed">
                                    <span class="is-complete"></span>
                                    <p>Processed<br><span>{{Carbon\Carbon::parse($order->processed_date)->format('d F Y g:i A')}}</span></p>
                                </div>
                                <div class="order-tracking {{$order->status=='shipping' ?'completed':''}}">
                                    <span class="is-complete"></span>
                                    <p>Shipping<br><span>{{Carbon\Carbon::parse($order->shipping_date)->format('d F Y g:i A')}}</span></p>
                                </div>
                                <div class="order-tracking">
                                    <span class="is-complete"></span>
                                    <p>Delivered<br></p>
                                </div>
                            </div>
                        @elseif($order->status=='delivery')
                            <div class="row justify-content-between">
                                <div class="order-tracking completed">
                                    <span class="is-complete"></span>
                                    <p>Ordered<br><span>{{Carbon\Carbon::parse($order->created_at_date)->format('d F Y g:i A')}}</span></p>
                                </div>

                                <div class="order-tracking completed">
                                    <span class="is-complete"></span>
                                    <p>Processed<br><span>{{Carbon\Carbon::parse($order->processed_date)->format('d F Y g:i A')}}</span></p>
                                </div>
                                <div class="order-tracking completed">
                                    <span class="is-complete"></span>
                                    <p>Shipping<br><span>{{Carbon\Carbon::parse($order->shipping_date)->format('d F Y g:i A')}}</span></p>
                                </div>
                                <div class="order-tracking {{$order->status=='delivery' ?'completed':''}}">
                                    <span class="is-complete"></span>
                                    <p>Delivered<br><span>{{Carbon\Carbon::parse($order->delivery_date)->format('d F Y g:i A')}}</span></p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="card col-md-5">
                        <div class="mt-25 mb-25">
                            <h4>Information</h4>
                        </div>
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex animated animated" style="visibility: visible;">
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">Billing Address</h5>
                                <h5 class="font-sm text-grey-50">Name:{{ucwords($order->firstname.' '.$order->lastname)}}</h5>
                                <p class="font-sm text-grey-50">Mobile:{{$order->mobile}}</p>
                                <p class="font-sm text-grey-50">Email:{{$order->email}}</p>
                                <p class="text-grey-3">Address:{{ucwords($order->address)}}</p>
                                <p class="text-grey-3">City:{{ucwords($order->city)}}</p>
                                <p class="text-grey-3">District:{{ucwords($order->district)}}</p>
                                <p class="text-grey-3">Thana:{{ucwords($order->thana)}}</p>
                            </div>
                        </div>

                        @if($order->shipping_different)
                            <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex animated animated" style="visibility: visible;">
                                <div class="pl-30">
                                    <h5 class="mb-5 fw-500">Shipping Address</h5>
                                    <p class="font-sm text-grey-5">Name:{{$order->shipping->firstname.' '.$order->shipping->lastname}}</p>
                                    <p class="font-sm text-grey-5">Mobile:{{$order->shipping->mobile}}</p>
                                    <p class="font-sm text-grey-5">Email:{{$order->shipping->email}}</p>
                                    <p class="font-sm text-grey-5">Address:{{$order->shipping->address}}</p>
                                    <p class="font-sm text-grey-5">City:{{$order->shipping->city}}</p>
                                    <p class="font-sm text-grey-5">District:{{$order->shipping->district}}</p>
                                    <p class="font-sm text-grey-5">Thana:{{$order->shipping->thana}}</p>
                                </div>
                            </div>
                        @endif

                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex animated animated" style="visibility: visible;">
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">Transaction</h5>
                                <p class="font-sm text-grey-5">Order ID:{{$order->transaction->order_id}}</p>
                                <p class="font-sm text-grey-5">Order Mode:{{ucwords($order->transaction->mode)}}</p>
                                <p class="font-sm text-grey-5">Order Status:{{ucwords($order->transaction->status)}}</p>
                                <p class="font-sm text-grey-5">Order Created:{{$order->transaction->created_at}}</p>
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
