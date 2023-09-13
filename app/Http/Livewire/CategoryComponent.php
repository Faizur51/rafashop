<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class CategoryComponent extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';
    public $pageSize=12;
    public $orderby='Default sorting';

    public $category_slug;

    public $scategory_slug;



    public $min_value=0;
    public $max_value=100000;




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


    public function mount($category_slug,$scategory_slug=null){
        $this->category_slug=$category_slug;
        $this->scategory_slug=$scategory_slug;
    }



    public function render()
    {

        $category_id=null;
        $category_name="";
        $filter="";

        if($this->scategory_slug){
            $scategory=Subcategory::where('slug',$this->scategory_slug)->first();
            $category_id=$scategory->id;
            $category_name=$scategory->name;
            $filter="sub";
        }else{
            $category=Category::where('slug',$this->category_slug)->first();
            $category_id=$category->id;
            $category_name=$category->name;
            $filter="";
        }




        if($this->orderby=='Price: Low to High')
        {
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where($filter.'category_id',$category_id)->orderBy('regular_price','asc')->paginate($this->pageSize);

        }else if($this->orderby=='Price: High to Low')
        {
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where($filter.'category_id',$category_id)->orderBy('regular_price','desc')->paginate($this->pageSize);
        }
        else if($this->orderby=='Short buy newness'){

            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where($filter.'category_id',$category_id)->orderBy('created_at','desc')->paginate($this->pageSize);
        }
        else{
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where($filter.'category_id',$category_id)->paginate($this->pageSize);
        }

        $categories=Category::orderBy('name','asc')->get();
        $nproducts=Product::latest()->take(4)->get();
        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name,'nproducts'=>$nproducts]);

    }
}
