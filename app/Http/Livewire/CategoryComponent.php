<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class CategoryComponent extends Component
{
    use WithPagination;

    public $pageSize=12;
    public $orderby='Default sorting';

    public $slug;

    //item add into the cart
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added into the cart');
        return redirect()->route('shop.cart');
    }


    public function changePageSize($size){
        $this->pageSize=$size;
    }

    public function changeOrderBy($order){

        $this->orderby=$order;
    }


    public function mount($slug){
        $this->slug=$slug;
    }



    public function render()
    {

        $category=Category::where('slug',$this->slug)->first();


        if($this->orderby=='Price: Low to High')
        {
            $products=Product::where('category_id',$category->id)->orderBy('regular_price','asc')->paginate($this->pageSize);

        }else if($this->orderby=='Price: High to Low')
        {
            $products=Product::where('category_id',$category->id)->orderBy('regular_price','desc')->paginate($this->pageSize);
        }
        else if($this->orderby=='Short buy newness'){

            $products=Product::where('category_id',$category->id)->orderBy('created_at','desc')->paginate($this->pageSize);
        }
        else{
            $products=Product::where('category_id',$category->id)->paginate($this->pageSize);
        }

        $categories=Category::orderBy('name','asc')->get();

        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category->name]);

    }
}
