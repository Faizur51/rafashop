
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
                                            <div class="card-header d-flex justify-content-between">
                                                <h5 class="mb-0">Order List!</h5>
                                                <div>
                                                    <a href="#" wire:click.prevent="excelDownload" class="btn btn-danger btn-sm">Excel</a>
                                                    <a href="{{route('admin.exportPDF')}}"  class="btn btn-danger btn-sm">Coupon PDF</a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
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
                                                                <td>{{ucwords($order->subtotal)}}</td>
                                                                <td>{{ucwords($order->discount)}}</td>
                                                                <td>{{ucwords($order->tax)}}</td>
                                                                <td> &#2547; {{$order->total}}</td>
                                                                <td>&#2547; {{$order->firstname.$order->lastname}}</td>
                                                                <td>{{$order->mobile}}</td>
                                                                <td>{{$order->address}}</td>
                                                                <td>{{$order->city}}</td>
                                                                <td>{{$order->District}}</td>
                                                                <td>{{$order->thana}}</td>
                                                                <td>{{$order->status}}</td>
                                                               <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn-small"> <i class="fi-rs-eye"></i></a></td>
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


