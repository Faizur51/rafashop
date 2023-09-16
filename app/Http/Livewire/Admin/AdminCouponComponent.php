<?php

namespace App\Http\Livewire\Admin;

use App\Exports\CouponsExport;
use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
class AdminCouponComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $deleteId;

    public function deleteId($id){
        $this->deleteId=$id;
    }

    public function delete(){
        $coupon=Coupon::find($this->deleteId);
        $coupon->delete();
        noty()->progressBar(false)->layout('topRight')->addInfo('Coupon deleted Successfully.');
    }

    public function excelDownload(){
        return Excel::download(new CouponsExport, 'coupons.xlsx');
    }

    public function render()
    {
        $coupons=Coupon::orderBy('created_at','desc')->paginate(7);
        return view('livewire.admin.admin-coupon-component',compact('coupons'));
    }
}
