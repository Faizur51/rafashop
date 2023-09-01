<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $top_category;
    public $popular_category;
    public $image;
    public $status;


    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function updated($fields){

        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'top_category' => 'required',
            'popular_category' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);
    }

    public function addCategory()
    {

        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'top_category' => 'required',
            'popular_category' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);


        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->top_category = $this->top_category;
        $category->popular_category = $this->popular_category;
        $category->status = $this->status;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('category', $imageName);


        $category->image = $imageName;

        $category->save();

        session()->flash('message', 'Category has been added');

        $this->reset();

    }


    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
