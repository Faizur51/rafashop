
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
                                                <h5 class="mb-0">Coupon!</h5>
                                               <div>
                                                   <a href="#" wire:click.prevent="excelDownload" class="btn btn-danger btn-sm">Excel</a>
                                                   <a href="{{route('admin.exportPDF')}}"  class="btn btn-danger btn-sm">Coupon PDF</a>
                                                   <a href="{{route('admin.coupon.add')}}" class="btn btn-danger btn-sm">Add Coupon</a>
                                               </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Sl</th>
                                                            <th>Code</th>
                                                            <th>Type</th>
                                                            <th>Value</th>
                                                            <th>Cart Value</th>
                                                            <th>Expiry Date</th>
                                                            <th class="text-center" colspan="2">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($coupons as $coupon)
                                                            <tr>
                                                                <td>{{$coupon->id}}</td>
                                                                <td>{{ucwords($coupon->code)}}</td>
                                                                <td>{{ucwords($coupon->type)}}</td>
                                                                <td> &#2547; {{$coupon->value}}</td>
                                                                <td>&#2547; {{$coupon->cart_value}}</td>
                                                                <td>{{$coupon->expiry_date}}</td>
                                                             {{--   <td><a href="{{route('admin.home.slider.edit',['slider_id'=>$slider->id])}}" class="btn-small">Edit</a></td>--}}
                                                                <td><button type="button" wire:click="deleteId({{ $coupon->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                    {{ $coupons->links() }}

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


