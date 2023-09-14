<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
class AdminAddProductComponent extends Component
{

    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id ;

    public $images;
    public $color=[];
    public $size=[];

    public $scategory_id;

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }


    public function mount(){
        $this->stock_status=1;
        $this->featured=1;
    }


    public function updated($fields){

        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sale_price'=>'required|numeric',
            'sku'=>'required',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required',
            'category_id'=>'required',

        ]);
    }



    public function addProduct(){

        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sale_price'=>'required|numeric',
            'sku'=>'required',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required',
            'category_id'=>'required',
        ]);


        $product=new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->sku=$this->sku;
        $product->stock_status=$this->stock_status;
        $product->featured=$this->featured;
        $product->quantity=$this->quantity;
        $product->color=json_encode($this->color);
        $product->size=json_encode($this->size);
        $product->category_id=$this->category_id;

        if($this->scategory_id){
            $product->subcategory_id=$this->scategory_id;

        }



        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('product',$imageName);
        $product->image=$imageName;

        if($this->images){
            $imagesname='';
            foreach($this->images as $key=>$image){
                $imgName=Carbon::now()->timestamp.$key.'.'.$image->extension();
                $image->storeAs('product',$imgName);
                $imagesname=$imagesname.','.$imgName;
            }
            $product->images=$imagesname;
        }

        $product->save();

        session()->flash('message','Product has been added successfully');

        $this->reset();

    }

    public function changeSubcategory(){
        $this->scategory_id=0;
    }



    public function render()
    {
        $categories=Category::orderBy('created_at','desc')->get();

        $scategories=Subcategory::where('category_id',$this->category_id)->get();

        return view('livewire.admin.admin-add-product-component',['categories'=>$categories,'scategories'=>$scategories]);
    }
}
