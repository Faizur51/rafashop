<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
class AdminEditBannerComponent extends Component
{

    use WithFileUploads;
    public $top_title;
    public $slug;
    public $title;
    public $link;
    public $start_date;
    public $end_date;
    public $image;
    public $status;

    public $banner_id;
    public $newimage;


    public function generateSlug(){
        $this->slug = Str::slug($this->top_title);
    }



    public function mount($banner_slug){

        $banner=Banner::where('slug',$banner_slug)->first();
        $this->top_title=$banner->top_title;
        $this->slug=$banner->slug;
        $this->title=$banner->title;
        $this->link=$banner->link;
        $this->start_date=$banner->start_date;
        $this->end_date=$banner->end_date;
        $this->image=$banner->image;
        $this->status=$banner->status;
        $this->banner_id=$banner->id;

    }

 public function updateBanner(){
     $this->validate([
         'top_title'=>'required',
         'title'=>'required',
         'link'=>'required',
         'start_date'=>'required',
         'end_date'=>'required',
         'image'=>'required',
         'status'=>'required',
     ]);

     $banner=Banner::find($this->banner_id);
     $banner->top_title=$this->top_title;
     $banner->title=$this->title;
     $banner->link=$this->link;
     $banner->start_date=$this->start_date;
     $banner->end_date=$this->end_date;
     $banner->status=$this->status;

     if($this->newimage){
         unlink('frontend/assets/images/banner/'.$banner->image);
         $imageName=Carbon::now()->timestamp.'.'.$this->newimage->extension();
         //$this->newimage->storeAs('slider',$imageName);

         $img = Image::make($this->newimage);
         $img->resize(600,255);
         $img->save('frontend/assets/images/banner/'.$imageName);
         $banner->image=$imageName;
     }

     $banner->save();

     session()->flash('message','Banner has been Updated successfully');
 }


    public function render()
    {
        return view('livewire.admin.admin-edit-banner-component');
    }
}
