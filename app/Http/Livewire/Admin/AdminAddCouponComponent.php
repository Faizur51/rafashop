<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    protected $listeners=['setDate'];

    public $code;
    public $slug;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

   public $date1;

    public function setDate($data){
        $this->date1=$data;
    }

    public function generateSlug(){
        $this->slug=Str::slug($this->code);
    }


    public function addCoupon()
    {
        $this->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
            'cart_value' => 'required',
            'expiry_date' => 'required',
        ]);

            $coupon=new Coupon();
            $coupon->code=$this->code;
            $coupon->slug=$this->slug;
            $coupon->type=$this->type;
            $coupon->value=$this->value;
            $coupon->cart_value=$this->cart_value;
            $coupon->expiry_date=$this->date1;
            $coupon->save();

        session()->flash('message', 'Coupon has been added');

        $this->reset();

    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component');
    }
}
