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
                                <h5 class="mb-0">Review List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" style="border-bottom: 1px solid #dee2e6">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Display</th>
                                            <th>Rating</th>
                                            <th style="width: 500px">Comment</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Product ID</th>

                                            <th class="text-center" colspan="2">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($reviews as $review)
                                            <tr>
                                                <td>{{$review->id}}</td>
                                                <td>
                                                    <div class="product-rate d-inline-block">
                                                        @if($review->rating==5)
                                                            <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                        @elseif($review->rating==4)
                                                            <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                        @elseif($review->rating==3)
                                                            <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                        @elseif($review->rating==2)
                                                            <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                        @elseif($review->rating==1)
                                                            <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{$review->rating}}</td>
                                                <td>{{$review->comment}}</td>
                                                <td>{{$review->orderItem->order->firstname.' '.$review->orderItem->order->lastname}}</td>
                                                <td>{{$review->orderItem->order->mobile}}</td>
                                                <td>{{$review->orderItem->product_id}}</td>

                                                {{--<td><a href="{{route('admin.banner.edit',['banner_slug'=>$order->slug])}}" class="btn-small">Edit</a></td>--}}
                                                {{-- <td><button type="button" wire:click="deleteId({{ $order->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></td>--}}
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    {{ $reviews->links() }}

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

