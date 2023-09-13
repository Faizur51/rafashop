<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
class UserDashboardComponent extends Component
{
    use WithFileUploads;
  public $name;
  public $email;
    public $image;
  public $mobile;
  public $city;
  public $district;
  public $thana;
  public $zipcode;
  public $newimage;


  public $current_password;
  public $password;
  public $password_confirmation;



public function mount(){

    $userProfile=Profile::where('user_id',Auth::user()->id)->first();
    if(!$userProfile){
        $profile=new Profile();
        $profile->user_id=Auth::user()->id;
        $profile->save();
    }

    $user=User::find(Auth::user()->id);


    $this->name=$user->name;
    $this->email=$user->email;


    $this->image=$user->profile->image;
    $this->mobile=$user->profile->mobile;
    $this->city=$user->profile->city;
    $this->district=$user->profile->district;
    $this->thana=$user->profile->thana;
    $this->zipcode=$user->profile->zipcode;


}

public function updateProfile(){
    $user=User::find(Auth::user()->id);
    $user->name=$this->name;
    $user->save();
    $user->profile->mobile=$this->mobile;

    if($this->newimage)
    {
       if($this->image){
           unlink('frontend/assets/images/profile/'.$user->profile->image);
       }
       $imageName=Carbon::now()->timestamp.'.'.$this->newimage->extension();
        $img = Image::make($this->newimage);

        $img->resize(1200,735);
        $img->save('frontend/assets/images/profile/'.$imageName);

        $user->profile->image=$imageName;
    }
    $user->profile->city=$this->city;
    $user->profile->district=$this->district;
    $user->profile->thana=$this->thana;
    $user->profile->zipcode=$this->zipcode;

    $user->profile->save();
    noty()
        ->progressBar(false)
        ->layout('topRight')
        ->addInfo('Profile update successfully.');
}


public function updated($fields){

    $this->validateOnly($fields,[
        'current_password'=>'required',
        'password'=>'required|min:8|confirmed|different:current_password'
    ]);
}
public function changePassword(){
    $this->validate([
        'current_password'=>'required',
        'password'=>'required|min:8|confirmed|different:current_password'
    ]);
    if(Hash::check($this->current_password,Auth::user()->password)){
        $user=User::findOrFail(Auth::user()->id);
        $user->password=Hash::make($this->password);
        $user->save();
        noty()
            ->progressBar(false)
            ->layout('topRight')
            ->addInfo('Change Password successfully.');
        $this->reset();
    }else{
        noty()
            ->progressBar(false)
            ->layout('topRight')
            ->addInfo('Password does not match our record.');
    }
}

    public function render()
    {
        $userProfile=Profile::where('user_id',Auth::user()->id)->first();
        if(!$userProfile){
            $profile=new Profile();
            $profile->user_id=Auth::user()->id;
            $profile->save();
        }

        $user=User::find(Auth::user()->id);

        return view('livewire.user.user-dashboard-component',['user'=>$user]);
    }
}
