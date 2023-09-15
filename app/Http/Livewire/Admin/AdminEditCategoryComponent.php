<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $category_id;
    public $category_slug;
    public $newimage;


    public $scategory_id;
    public $scategory_slug;


    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function mount($category_slug,$scategory_slug=null)
    {

        if($scategory_slug){
            $scategory=Subcategory::where('slug',$this->scategory_slug)->first();

            $this->scategory_id=$scategory->id;
            $this->name=$scategory->name;
            $this->slug=$scategory->slug;
            $this->category_id=$scategory->category_id;

        }else{
            //$this->category_slug=$category_slug;
            $category = Category::where('slug',$this->category_slug)->first();
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->image = $category->image;
            $this->category_id = $category->id;
        }

    }

    public function updateCategory()
    {

        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);


        if($this->scategory_id){
            $scategory=Subcategory::find($this->scategory_id);
            $scategory->name=$this->name;
            $scategory->slug=$this->slug;
            $scategory->category_id=$this->category_id;
            $scategory->save();
        }else{
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            if ($this->newimage) {
                unlink('frontend/assets/images/category/' . $category->image);
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                //$this->newimage->storeAs('category', $imageName);
                $img = Image::make($this->newimage);
                $img->resize(440,440);
                $img->save('frontend/assets/images/category/'.$imageName);
                $category->image = $imageName;

            }

            $category->save();
        }

        session()->flash('message', 'Category has been Updated successfully');

    }


    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-edit-category-component',['categories'=>$categories]);
    }
}
