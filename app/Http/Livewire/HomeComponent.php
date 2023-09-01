<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;
use Cart;
class HomeComponent extends Component
{


    //item add into the cart
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item added into the cart');
        return redirect()->route('shop.cart');
        //$this->emitTo('cart-icon-component','refreshComponent');

    }

    public function render()
    {
        $sliders=HomeSlider::where('status',1)->get();

        $pcategories=Category::orderBy('name','desc')->where('popular_category',1)->get()->take(8);

        $lproducts=Product::orderBy('created_at','desc')->get()->take(7);

        $fproducts=Product::where('featured',1)->get();
        return view('livewire.home-component',['sliders'=>$sliders,'pcategories'=>$pcategories,'lproducts'=>$lproducts,'fproducts'=>$fproducts]);
    }
}
