
<div>
    <main class="main">
        <section class="pt-10 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">Order List!</h5>
                                                <div>
                                                    <a href="#" wire:click.prevent="excelDownload" class="btn btn-danger btn-sm">Excel</a>
                                                    <a href="{{route('admin.exportPDF')}}"  class="btn btn-danger btn-sm">Coupon PDF</a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table" style="border-bottom: 1px solid #dee2e6">
                                                        <thead>
                                                        <tr>
                                                            <th>OrderID</th>
                                                            <th>Sub Total</th>
                                                            <th>Discount</th>
                                                            <th>Tax</th>
                                                            <th>Total</th>
                                                            <th>Name</th>
                                                            <th>Mobile</th>
                                                            <th>Address</th>
                                                            <th>City</th>
                                                            <th>Districct</th>
                                                            <th>Thana</th>
                                                            <th>Status</th>
                                                            <th class="text-center" colspan="2">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{$order->id}}</td>
                                                                <td>&#2547; {{round($order->subtotal)}}</td>
                                                                <td>&#2547; {{round($order->discount)}}</td>
                                                                <td>&#2547; {{round($order->tax)}}</td>
                                                                <td>&#2547; {{round($order->total)}}</td>
                                                                <td>{{ucwords($order->firstname.' '.$order->lastname)}}</td>
                                                                <td>{{$order->mobile}}</td>
                                                                <td>{{ucwords($order->address)}}</td>
                                                                <td>{{ucwords($order->city)}}</td>
                                                                <td>{{ucwords($order->district)}}</td>
                                                                <td>{{ucwords($order->thana)}}</td>
                                                                <td>{{ucwords($order->status)}}</td>
                                                               <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn-small"> <i class="fi-rs-eye" style="font-size:18px"></i></a></td>
                                                               <td>
                                                                   <div class="dropdown">
                                                                       <a class=" dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                           <i class="fi-rs-edit-alt" style="font-size:18px"></i>
                                                                       </a>
                                                                       <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                                           <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'processed')">Processed</a></li>
                                                                           <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'shipping')">Shipping</a></li>
                                                                           <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivery')">Delivery</a></li>
                                                                           <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'cancel')">Cancel</a></li>
                                                                       </ul>
                                                                   </div>
                                                               </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                    {{ $orders->links() }}

                                                    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLabel">Modal title</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure want to delete?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-bs-dismiss="modal">Yes, Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>


