<?php

namespace App\Exports;

use App\Models\Coupon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CouponsExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'ID',
            'Code',
            'Slug',
            'Type',
            'Value',
            'Cart Value',
            'Expairy Date',
        ];
    }

    public function map($coupon): array
    {
        return [
            $coupon->id,
            $coupon->code,
            $coupon->slug,
            $coupon->type,
            $coupon->value,
            $coupon->cart_value,
            $coupon->expiry_date,
        ];
    }

    public function collection()
    {
        return Coupon::all();
    }
}
