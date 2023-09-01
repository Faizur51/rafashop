<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;


class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $top_category;
    public $popular_category;
    public $image;
    public $status;
    public $category_id;

    public $newimage;


    public function mount($category_id)
    {

        $category = Category::find($category_id);
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->top_category = $category->top_category;
        $this->popular_category = $category->popular_category;
        $this->image = $category->image;
        $this->status = $category->status;
        $this->category_id = $category->id;
    }

    public function updateCategory()
    {

        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'top_category' => 'required',
            'popular_category' => 'required',
            'status' => 'required',
        ]);

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->top_category = $this->top_category;
        $category->popular_category = $this->popular_category;
        $category->status = $this->status;
        if ($this->newimage) {
            unlink('frontend/assets/images/category/' . $category->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('category', $imageName);
            $category->image = $imageName;
        }

        $category->save();

        session()->flash('message', 'Category has been Updated successfully');


    }


    public function render()
    {
        return view('livewire.admin.admin-edit-category-component');
    }
}
