<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content dashboard-content">
                        <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">{{session()->get('message')}}</div>
                                @endif
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <input type="text" placeholder="Search Here" class="form-control" wire:model="search">
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{route('admin.product.add')}}" class="btn btn-sm">Add Product</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" style="border-bottom: 1px solid #dee2e6">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name </th>
                                                <th>Regular Price</th>
                                                <th>Sale Price</th>
                                                <th>Stock Status</th>
                                                <th>Featured</th>
                                                <th>Quantity</th>
                                                <th>Category Name</th>
                                                <th>Image</th>
                                              {{--  <th>Galary Image</th>--}}

                                                <th class="text-center" colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{ucwords($product->name)}}</td>
                                                    <td>&#2547; {{$product->regular_price}}</td>
                                                    <td>&#2547; {{$product->sale_price}}</td>
                                                    <td class="text-primary">{{($product->stock_status ==1 ? 'Instock':'Outstock')}}</td>
                                                    <td>{{$product->featured ==1 ? 'Yes':'No'}}</td>
                                                    <td>{{$product->quantity}}</td>
                                                    <td>{{ucwords($product->category->name) }}</td>
                                                    <td>
                                                        @if(strlen($product->image)<30)
                                                        <img src="{{ asset('frontend/assets/images/product')}}/{{$product->image}}" style="width: 50px;height: 50px">
                                                        @else
                                                            <img src="{{$product->image}}" style="width: 50px;height: 50px">
                                                        @endif
                                                    </td>

                                               {{-- @php
                                                    $images=explode(',',$product->images)
                                                    @endphp

                                                    @foreach($images as $image)
                                                        @if($image)
                                                    <td><img src="{{ asset('frontend/assets/images/product')}}/{{$image}}" style="width: 50px;height: 50px"></td>
                                                        @endif
                                                    @endforeach
                                               --}}

                                                    <td><a href="{{route('admin.product.edit',['product_slug'=>$product->slug])}}" class="btn-small">Edit</a></td>
                                                    <td><a  wire:click="deleteId({{ $product->id }})"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-info h6">Delete</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>



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
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
