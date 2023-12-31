<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
class AdminEditProductComponent extends Component
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
    public $category_id;
    public $images;


    public $product_id;
    public $newimage;

   public $newimages;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    public function mount($product_slug)
    {
        $product=Product::where('slug',$product_slug)->first();
        $this->name=$product->name;
        $this->slug=$product->slug;
        $this->short_description=$product->short_description;
        $this->description=$product->description;
        $this->regular_price=$product->regular_price;
        $this->sale_price=$product->sale_price;
        $this->sku=$product->sku;
        $this->stock_status=$product->stock_status;
        $this->featured=$product->featured;
        $this->quantity=$product->quantity;
        $this->image=$product->image;
        $this->category_id=$product->category_id;
        $this->images=explode(',',$product->images);
        $this->product_id=$product->id;
    }

    public function updateProduct()
    {

        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'sku' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
        ]);


        if($this->newimage){
            $this->validate([
                'image' => 'required',
            ]);
        }

        $product =Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->sku = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
//single image
        if($this->newimage){
            unlink('frontend/assets/images/product/'.$product->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            //$this->newimage->storeAs('product', $imageName);
            $img = Image::make($this->newimage);
            $img->resize(1100,1100);
            $img->save('frontend/assets/images/product/'.$imageName);
            $product->image = $imageName;
        }

//Galary image
    if($this->newimages){
          if($product->images){
               $images=explode(",",$product->images);
               foreach ($images as $image){
                  if($image){
                      unlink('frontend/assets/images/product/'.$image);
                  }
               }
          }
         $imagesname='';
          foreach ($this->newimages as $key=>$image){
              $imgName = Carbon::now()->timestamp . $key.'.'. $image->extension();
              //$image->storeAs('product', $imgName);
              $img = Image::make($image);
              $img->resize(600,600);
              $img->save('frontend/assets/images/product/'.$imgName);
              $imagesname=$imagesname.','.$imgName;
          }
         $product->images=$imagesname;

    }

        $product->save();

        session()->flash('message', 'Product has been Updated Successfully');



    }


    public function render()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories]);
    }
}
