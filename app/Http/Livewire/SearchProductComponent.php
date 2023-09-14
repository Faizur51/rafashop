<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class SearchProductComponent extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';
    public $pageSize=12;
    public $orderby='Default sorting';


    public $q;
    public $search_term;

    public $min_value=0;
    public $max_value=100000;



    public function mount(){
        $this->fill(request()->only('q'));
        $this->search_term= '%'.$this->q.'%';
    }

    //item add into the cart
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item added into the cart');
        return redirect()->route('shop.cart');
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
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name','like',$this->search_term)->orderBy('regular_price','asc')->paginate($this->pageSize);

        }else if($this->orderby=='Price: High to Low')
        {
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name','like',$this->search_term)->orderBy('regular_price','desc')->paginate($this->pageSize);
        }
        else if($this->orderby=='Short buy newness'){
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name','like',$this->search_term)->orderBy('created_at','desc')->paginate($this->pageSize);
        }
        else{
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name','like',$this->search_term)->paginate($this->pageSize);
        }

        $categories=Category::orderBy('name','asc')->get();
        $nproducts=Product::latest()->take(4)->get();
        return view('livewire.search-product-component',['products'=>$products,'categories'=>$categories,'nproducts'=>$nproducts]);

    }
}
