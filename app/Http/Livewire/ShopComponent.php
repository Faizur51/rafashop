<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class ShopComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $pageSize=12;
    public $orderby='Default sorting';


    public $min_value=0;
    public $max_value=100000;


     //item add into the cart
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        //session()->flash('success_message','Item added into the cart');
        //return redirect()->route('shop.cart');
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->progressBar(false)->layout('topRight')->addInfo('Item added into the cart.');
    }


    public function changePageSize($size){
         $this->pageSize=$size;
    }

public function changeOrderBy($order){

        $this->orderby=$order;
}

    public function render()
    {
        if($this->orderby=='Price: Low to High')
        {
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','asc')->paginate($this->pageSize);
        }else if($this->orderby=='Price: High to Low')
        {
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','desc')->paginate($this->pageSize);
        }
       else if($this->orderby=='Short buy newness'){
           $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('created_at','desc')->paginate($this->pageSize);
       }
        else{
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->paginate($this->pageSize);
        }

        $categories=Category::orderBy('name','asc')->get();

        $nproducts=Product::latest()->take(4)->get();
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories,'nproducts'=>$nproducts]);

    }
}
