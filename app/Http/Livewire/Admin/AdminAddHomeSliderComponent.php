<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $image;
    public $status;

    public function updated($fields){

        $this->validateOnly($fields,[
            'top_title'=>'required',
            'title'=>'required',
            'sub_title'=>'required',
            'offer'=>'required',
            'link'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);
    }

    public function addSlider(){

        $this->validate([
            'top_title'=>'required',
            'title'=>'required',
            'sub_title'=>'required',
            'offer'=>'required',
            'link'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);


       $slider=new HomeSlider();
       $slider->top_title=$this->top_title;
       $slider->title=$this->title;
       $slider->sub_title=$this->sub_title;
       $slider->offer=$this->offer;
       $slider->link=$this->link;
       $slider->status=$this->status;


       $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();

       //$this->image->storeAs('slider',$imageName);
        $img = Image::make($this->image);

        $img->resize(1200,735);
        $img->save('frontend/assets/images/slider/'.$imageName);

       $slider->image=$imageName;

       $slider->save();
       session()->flash('message','Slider has been added');
       $this->reset();

    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component');
    }
}
