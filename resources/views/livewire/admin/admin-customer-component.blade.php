<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto mt-50 mb-50">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content dashboard-content">
                        <div class="card">
                            @if(session()->has('message'))
                                <div class="alert alert-success">{{session()->get('message')}}</div>
                            @endif
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="mb-0">Customer List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" style="border-bottom: 1px solid #dee2e6">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>District</th>
                                            <th>Thana</th>
                                            <th>Status</th>
                                            <th class="text-center" colspan="2">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{ucwords($order->firstname.' '.$order->lastname)}}</td>
                                                <td>{{ucwords($order->email)}}</td>
                                                <td>{{ucwords($order->mobile)}}</td>

                                                <td>{{$order->address}}</td>
                                                <td>{{$order->city}}</td>
                                                <td>{{$order->district}}</td>
                                                <td>{{$order->thana}}</td>

                                                <td>{{$order->status ==1 ?'Active':'Inactive'}}</td>
                                                {{--<td><a href="{{route('admin.banner.edit',['banner_slug'=>$order->slug])}}" class="btn-small">Edit</a></td>--}}
                                               {{-- <td><button type="button" wire:click="deleteId({{ $order->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></td>--}}
                                                <td></td>
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

