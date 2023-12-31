<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;
use Cart;
class HomeComponent extends Component
{


    public $amount=20;
    public function loadMore(){
        $this->amount+=12;
    }

    //item add into the cart
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        //session()->flash('success_message','Item added into the cart');
        //return redirect()->route('shop.cart');
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->progressBar(false)->layout('topRight')->addInfo('Item added into the cart.');

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
        //$fproducts=Product::orderBy('id','desc')->where('featured',1)->get();
        //$fproducts=Product::orderBy('id','desc')->where('featured',1)->paginate($this->amount);
        $fproducts=Product::orderBy('id','desc')->where('featured',1)->take($this->amount)->get();

        //banner
        $banners=Banner::orderBy('id','desc')->where('status',1)->take(3)->get();


        return view('livewire.home-component',['sliders'=>$sliders,'pcategories'=>$pcategories,'lproducts'=>$lproducts,'fproducts'=>$fproducts,'banners'=>$banners]);
    }
}
