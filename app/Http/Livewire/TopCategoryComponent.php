<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class TopCategoryComponent extends Component
{
    public function render()
    {

        $categories=Category::orderBy('id','desc')->get();
        return view('livewire.top-category-component',['categories'=>$categories]);
    }
}
