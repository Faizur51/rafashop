<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class AdminCouponPdfComponent extends Component
{

    public function exportPDF(){
        $coupons=Coupon::all();
        $pdf = Pdf::loadView('livewire.admin.admin-coupon-pdf-component',['coupons'=>$coupons]);
        return $pdf->download('invoice'.rand(1,9999).'.pdf');
    }

    public function render()
    {
        $coupons=Coupon::all();
        return view('livewire.admin.admin-coupon-pdf-component',['coupons'=>$coupons]);
    }


}
