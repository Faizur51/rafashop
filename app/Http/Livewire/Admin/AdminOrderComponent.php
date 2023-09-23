<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
class AdminOrderComponent extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateOrderStatus($order_id,$status){
        $order=Order::find($order_id);
        $order->status=$status;
        if($status=='cancel'){
            $order->cancel_date=DB::raw('CURRENT_DATE');
        }
        else if($status=='processed'){
            $order->processed_date=DB::raw('CURRENT_DATE');
        }
        else if($status=='shipping'){
            $order->shipping_date=DB::raw('CURRENT_DATE');
        }
        else if($status=='delivery'){
            $order->delivery_date=DB::raw('CURRENT_DATE');
        }
        $order->save();

        noty()->progressBar(false)->layout('topRight')->addInfo('Order status has been updated successfully.');
    }


    public function render()
    {

        $orders=Order::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.admin-order-component',['orders'=>$orders]);
    }
}
