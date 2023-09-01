<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public $deleteId = '';


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }


    public function delete()
    {
        $product = Product::find($this->deleteId);

        if($product->image){
            unlink('frontend/assets/images/product/'.$product->image);
        }
       if($product->images){
           $images=explode(',',$product->images);
           foreach ($images as $image){
               if($image){
                   unlink('frontend/assets/images/product/'.$image);
               }

           }
       }
       $product->delete();
       session()->flash('message','Product has been updated successfully');

    }


    public function render()

    {
        $products = Product::orderBy('id','desc')->paginate(7);
        return view('livewire.admin.admin-product-component', ['products' => $products]);
    }



}


