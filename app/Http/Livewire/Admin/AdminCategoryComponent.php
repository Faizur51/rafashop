<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public $deleteId = '';

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }


    public function delete()
    {
        $categories = Category::find($this->deleteId);

        if($categories->image){
            unlink('frontend/assets/images/category/'.$categories->image);
        }
        $categories->delete();
        session()->flash('message', 'Category has been deleted successfully');

    }

    public function render()

    {
        $categories =  Category::orderBy('created_at', 'desc')->paginate(7);
        return view('livewire.admin.admin-category-component', ['categories' => $categories]);
    }



}

