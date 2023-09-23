<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;

use Livewire\Component;
use Livewire\WithPagination;

class AdminCustomerComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $orders=Order::orderBy('created_at','desc')->paginate(7);
        return view('livewire.admin.admin-customer-component',['orders'=>$orders]);
    }
}
