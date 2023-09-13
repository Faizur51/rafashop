<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $deleteId = '';
    public $search="";


    public function updatingSearch()
    {
        $this->resetPage();
    }



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
        $search='%'. $this->search .'%';

        $products = Product::where('name','LIKE',$search)
            ->orWhere('stock_status','LIKE',$search)
            ->orWhere('regular_price','LIKE',$search)
            ->orWhere('sale_price','LIKE',$search)
            ->orderBy('id','desc')->paginate(8);
        return view('livewire.admin.admin-product-component', ['products' => $products]);
    }

}


