<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
class AdminAddBannerComponent extends Component
{
    use WithFileUploads;

    protected $listeners=['setStartDate','setEndDate'];

    public $top_title;
    public $slug;
    public $title;
    public $link;
    public $start_date;
    public $end_date;
    public $status;

   public $startdate;
   public $enddate;

   public $image;


    public function generateSlug(){
        $this->slug=Str::slug($this->top_title);
    }

public function setStartDate($data){
  $this->startdate=$data;
}

    public function setEndDate($data){
        $this->enddate=$data;
    }

public function updated($fields){

        $this->validateOnly($fields,[
            'top_title' => 'required',
            'title' => 'required',
            'link' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required',
        ]);
}

    public function addBanner(){
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'link' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required',
        ]);

        $banner=new Banner();
        $banner->top_title=$this->top_title;
        $banner->slug=$this->slug;
        $banner->title=$this->title;
        $banner->link=$this->link;
        $banner->start_date=$this->start_date;
        $banner->end_date=$this->end_date;

        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();

        //$this->image->storeAs('slider',$imageName);
        $img = Image::make($this->image);
        $img->resize(600,255);
        $img->save('frontend/assets/images/banner/'.$imageName);
        $banner->image=$imageName;

        $banner->save();

        session()->flash('message', 'Banner has been added');

        $this->reset();
    }



    public function render()
    {
        return view('livewire.admin.admin-add-banner-component');
    }
}
