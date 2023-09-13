<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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


    public function deleteSubcategory($id){
       $scategory=Subcategory::find($id);
       $scategory->delete();
        session()->flash('message', 'Sub Category has been deleted successfully');
    }



    public function render()

    {
        $categories =  Category::orderBy('created_at', 'desc')->paginate(7);
        return view('livewire.admin.admin-category-component', ['categories' => $categories]);
    }



}

