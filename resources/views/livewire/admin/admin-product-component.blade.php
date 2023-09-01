<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto mt-50 mb-50">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content dashboard-content">
                        <div class="tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Hello Rosie! </h5>
                                </div>
                                <div class="card-body">
                                    <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">{{session()->get('message')}}</div>
                                @endif
                                <div class="card-header d-flex justify-content-between">
                                    <h5 class="mb-0">Your Orders</h5>
                                    <a href="{{route('admin.product.add')}}" class="btn btn-sm">Add Product</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name </th>
                                                <th>Slug </th>
                                                <th>Short Description</th>
                                                <th>Regular Price</th>
                                                <th>Stock Status</th>
                                                <th>Featured</th>
                                                <th>Quantity</th>
                                                <th>Category Id </th>
                                                <th>Image</th>
                                              {{--  <th>Galary Image</th>--}}
                                                <th>Status</th>
                                                <th class="text-center" colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->slug}}</td>
                                                    <td>{!! $product->short_description !!}</td>
                                                    <td>{{$product->regular_price}}</td>
                                                    <td>{{$product->stock_status}}</td>
                                                    <td>{{$product->featured}}</td>
                                                    <td>{{$product->quantity}}</td>
                                                    <td>{{$product->category_id }}</td>
                                                    <td><img src="{{ asset('frontend/assets/images/product')}}/{{$product->image}}" style="width: 50px;height: 50px"></td>

                                               {{-- @php
                                                    $images=explode(',',$product->images)
                                                    @endphp

                                                    @foreach($images as $image)
                                                        @if($image)
                                                    <td><img src="{{ asset('frontend/assets/images/product')}}/{{$image}}" style="width: 50px;height: 50px"></td>
                                                        @endif
                                                    @endforeach
                                               --}}
                                                    <td>{{$product->status}}</td>
                                                    <td><a href="{{route('admin.product.edit',['product_slug'=>$product->slug])}}" class="btn-small">Edit</a></td>
                                                    <td><a  wire:click="deleteId({{ $product->id }})"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-info h6">Delete</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $products->links() }}

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
