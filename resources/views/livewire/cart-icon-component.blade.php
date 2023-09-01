<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{route('shop.cart')}}">
            <img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-cart.svg">
            @if(Cart::instance('cart')->count()>0)
            <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
            @endif
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                @foreach(Cart::instance('cart')->content() as $item)
                <li>
                    <div class="shopping-cart-img">
                        <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-3.jpg"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{substr($item->model->name,0,10)}}...</a></h4>
                        <h4><span>{{$item->qty}} × </span>${{$item->model->regular_price}}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    @if(session()->has('checkout'))
                        <h4>Total <span>Tk {{session()->get('checkout')['total']}}</span></h4>
                    @else
                        <h4>Total <span>Tk {{Cart::instance('cart')->total()}}</span></h4>
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
