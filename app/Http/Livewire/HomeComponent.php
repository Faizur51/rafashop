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
        //session()->flash('success_message','Item added into the cart');
        //return redirect()->route('shop.cart');
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()
            ->progressBar(false)
            ->layout('topRight')
            ->addInfo('Item added into the cart.');

    }

    public function render()
    {
        //top slider
        $sliders=HomeSlider::orderBy('id','desc')->where('status',1)->get();

         //populer category
        $pcategories=Category::orderBy('id','desc')->get();

        //letest product/New product
        $lproducts=Product::orderBy('id','desc')->get()->take(10);

        //feature product
        $fproducts=Product::orderBy('id','desc')->where('featured',1)->get();

        //latest slider/center slider
        $lsliders=HomeSlider::orderBy('id', 'desc')->where('status',1)->skip(0)->take(3)->get();

        return view('livewire.home-component',['sliders'=>$sliders,'pcategories'=>$pcategories,'lproducts'=>$lproducts,'fproducts'=>$fproducts,'lsliders'=>$lsliders]);
    }
}
