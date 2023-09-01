<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSettingComponent extends Component
{
    use WithFileUploads;

    public $phone;
    public $mobile;
    public $email;
    public $address;
    public $facebook;
    public $youtube;
    public $twitter;
    public $instagram;

public function mount(){
    $setting=Setting::find(1);

    if($setting){

        $this->phone=$setting->phone;
        $this->mobile=$setting->mobile;

        $this->email=$setting->email;

        $this->address=$setting->address;

        $this->facebook=$setting->facebook;

        $this->youtube=$setting->youtube;

        $this->twitter=$setting->twitter;

        $this->instagram=$setting->instagram;

    }
}

public function updated($fields){

    $this>$this->validateOnly($fields,[
        'phone' => 'required',
        'mobile' => 'required',
        'email' => 'required',
        'address' => 'required',
        'facebook' => 'required',
        'youtube' => 'required',
        'twitter' => 'required',
        'instagram' => 'required',

    ]);
}
    public function saveSetting()
    {

        $this->validate([
            'phone' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',

        ]);


        $setting=Setting::find(1);
        if(!$setting){
            $setting=new Setting();
        }

        $setting->phone = $this->phone;
        $setting->mobile = $this->mobile;
        $setting->email = $this->email;
        $setting->address = $this->address;
        $setting->facebook = $this->facebook;
        $setting->youtube = $this->youtube;
        $setting->twitter = $this->twitter;
        $setting->instagram = $this->instagram;

        $setting->save();

        session()->flash('message', 'Setting has been added successfully');

    }


    public function render()
    {
        return view('livewire.admin.admin-setting-component');
    }
}
