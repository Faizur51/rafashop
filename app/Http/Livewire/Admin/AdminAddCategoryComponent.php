<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;

    public $category_id;

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function updated($fields){

        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
        ]);
    }

    public function addCategory()
    {

        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
        ]);



        if($this->category_id){
           $scategory=new Subcategory();
           $scategory->name=$this->name;
           $scategory->slug=$this->slug;
           $scategory->category_id=$this->category_id;
           $scategory->save();

        }else{
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('category', $imageName);
            $category->image = $imageName;
            $category->save();
        }

        session()->flash('message', 'Category has been added');

        $this->reset();

    }


    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-add-category-component',['categories'=>$categories]);
    }
}
