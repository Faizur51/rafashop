<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartIconComponent extends Component
{

    protected $listeners=['refreshComponent'=>'$refresh'];

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-component','refreshComponent');
        session()->flash('success_message','Cart deleted success');

    }

    public function checkout(){
        if(Auth::check()){
            return redirect()->route('shop.checkout');
        }else{
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
