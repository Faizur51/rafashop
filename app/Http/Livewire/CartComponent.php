<?php

namespace App\Http\Livewire;

use App\Models\Coupon;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    protected $listeners=['refreshComponent'=>'$refresh'];
     public $couponCode;

     public  $discount;
     public $subtotalAfterDiscount;
     public $taxAfterDiscount;
     public $totalAfterDiscount;
    public function increaseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function decreaseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');
    }


    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','Cart deleted success');

    }

    public function clearAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function applyCouponCode(){

        $coupon=Coupon::where('code',$this->couponCode)->where('cart_value','<=',Cart::instance('cart')->total())->first();

        if(!$coupon){
            session()->flash('coupon_message','Coupon code is invalid');
            return;
        }else{
            session()->put('coupon',[
                'code'=>$coupon->code,
                'type'=>$coupon->type,
                'value'=>$coupon->value,
                'cart_value'=>$coupon->cart_value,
                'expiry_date'=>$coupon->expiry_date,
            ]);
            session()->flash('coupon_message','Coupon code found ');
        }

    }


    public function checkout(){
        if(Auth::check()){
            return redirect()->route('shop.checkout');
        }else{
            return redirect()->route('login');
        }
    }

  public function calculateDiscounts(){

        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] =='fixed'){
                 $this->discount=session()->get('coupon')['value'];
            }else{
                $this->discount=Cart::instance('cart')->subtotal()*session()->get('coupon')['value']/1010;
            }
            $this->subtotalAfterDiscount=Cart::instance('cart')->subtotal()-$this->discount;
            $this->taxAfterDiscount=($this->subtotalAfterDiscount*config('cart.tax'))/100;
            $this->totalAfterDiscount=$this->subtotalAfterDiscount+$this->taxAfterDiscount;
        }
  }

public function setAmmountForCheckout(){

        if(!Cart::instance('cart')->count()>0){
           session()->forget('checkout');
           return;
        }

        if(session()->has('coupon')){

            session()->put('checkout',[
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'tax'=>$this->taxAfterDiscount,
                'total'=>$this->totalAfterDiscount
            ]);
        }else{
            session()->put('checkout',[
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'tax'=>Cart::instance('cart')->tax(),
                'total'=>Cart::instance('cart')->total()
            ]);
        }
}


    public function render()
    {
        if(session()->has('coupon')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else{
                $this->calculateDiscounts();
            }
        }

        $this->setAmmountForCheckout();

        return view('livewire.cart-component');
    }
}
