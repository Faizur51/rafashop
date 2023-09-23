<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{

    public $order_id;

    public function mount($order_id){
        $this->order_id=$order_id;

    }

  public function cancelOrder(){
        $order=Order::find($this->order_id);
        $order->status="cancel";
        $order->cancel_date=DB::raw('CURRENT_DATE');
        $order->save();
        noty()->progressBar(false)->layout('topRight')->addInfo('Order has been cancel');
  }

    public function render()
    {

        $order=Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        //$order=Order::find($this->order_id);
        return view('livewire.user.user-order-details-component',['order'=>$order]);
    }
}
