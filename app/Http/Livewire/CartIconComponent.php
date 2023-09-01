<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartIconComponent extends Component
{

    protected $listeners=['refreshComponent'=>'$refresh'];



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
