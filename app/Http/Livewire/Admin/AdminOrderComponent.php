<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
class AdminOrderComponent extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $orders=Order::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.admin-order-component',['orders'=>$orders]);
    }
}
