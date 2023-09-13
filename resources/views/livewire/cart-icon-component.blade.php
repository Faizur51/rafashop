<div>
    <style>

        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background-color: #be0101;
            border-radius: 20px;
            box-shadow: inset 0 3px 4px 0 #0000004d
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

    </style>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{route('shop.cart')}}">
            <img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-cart.svg">
            @if(Cart::instance('cart')->count()>0)
            <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
            @endif
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2 overflow-auto bg-light" style="max-height: 500px">
            <ul>
                @foreach(Cart::instance('cart')->content() as $item)
                <li>
                    <div class="shopping-cart-img">
                        <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                            @if(strlen($item->model->image)<30)
                                <img src="{{asset('frontend/assets/images/product')}}/{{$item->model->image}}" alt="#">
                            @else
                                <img src="{{$item->model->image}}" alt="#">
                            @endif
                        </a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{ucwords(substr($item->model->name,0,20))}}</a></h4>
                        <h4><span>{{$item->qty}} × </span>&#2547; {{$item->model->regular_price}}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    @if(session()->has('coupon'))
                        <h4>Total <span>&#2547; {{session()->get('checkout')['total']}}</span></h4>
                    @else
                        <h4>Total <span>&#2547; {{Cart::instance('cart')->total()}}</span></h4>
                    @endif
                </div>
                <div class="shopping-cart-button">
                    <a href="{{route('shop.cart')}}" class="outline">View cart</a>
                    <a href="#" wire:click.prevent="checkout">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
