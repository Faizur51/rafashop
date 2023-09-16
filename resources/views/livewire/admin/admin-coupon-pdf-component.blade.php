<div>
    <style>
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            text-align: left;
        }
    </style>

    <table>
        <tr>
            <th>ID</th>
            <th>Code </th>
            <th>Slug </th>
            <th>Type</th>
            <th>Value</th>
            <th>Cart Value</th>
            <th>Expiry Date</th>
        </tr>
        @foreach($coupons as $coupon)
        <tr>
            <td>{{$coupon->id}}</td>
            <td>{{$coupon->code}}</td>
            <td>{{$coupon->slug}}</td>
            <td>{{$coupon->type}}</td>
            <td>{{$coupon->value}}</td>
            <td>{{$coupon->cart_value}}</td>
            <td>{{$coupon->expiry_date}}</td>
        </tr>
        @endforeach
    </table>
</div>
