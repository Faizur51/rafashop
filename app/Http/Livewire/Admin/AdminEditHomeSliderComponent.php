<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $image;
    public $status;
    public $slider_id;

    public $newimage;



    public function mount($slider_id){

      $slider=HomeSlider::find($slider_id);
      $this->top_title=$slider->top_title;
      $this->title=$slider->title;
      $this->sub_title=$slider->sub_title;
      $this->offer=$slider->offer;
      $this->link=$slider->link;
      $this->image=$slider->image;
      $this->status=$slider->status;
      $this->slider_id=$slider->id;
    }
    public function updateSlider(){

        $this->validate([
            'top_title'=>'required',
            'title'=>'required',
            'sub_title'=>'required',
            'offer'=>'required',
            'link'=>'required',
            'status'=>'required',
        ]);

        $slider=HomeSlider::find($this->slider_id);
        $slider->top_title=$this->top_title;
        $slider->title=$this->title;
        $slider->sub_title=$this->sub_title;
        $slider->offer=$this->offer;
        $slider->link=$this->link;
        $slider->status=$this->status;

        if($this->newimage){
            unlink('frontend/assets/images/slider/'.$slider->image);
            $imageName=Carbon::now()->timestamp.'.'.$this->newimage->extension();
            //$this->newimage->storeAs('slider',$imageName);

            $img = Image::make($this->newimage);
            $img->resize(1200,735);
            $img->save('frontend/assets/images/slider/'.$imageName);
            $slider->image=$imageName;
        }

        $slider->save();

        session()->flash('message','Slider has been Updated successfully');


    }




    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component');
    }
}
