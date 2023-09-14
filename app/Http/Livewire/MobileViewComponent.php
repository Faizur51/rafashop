<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Setting;
use Livewire\Component;

class MobileViewComponent extends Component
{
    public function render()
    {
        $categories=Category::orderBy('id','desc')->get();
        $setting=Setting::find(1);
        return view('livewire.mobile-view-component',['categories'=>$categories,'setting'=>$setting]);
    }
}
