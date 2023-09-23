<div class="container">
    <style>
        .sclist li{
                  line-height: 33px;
                  border-bottom: 1px solid #ccc;
        }
    </style>
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
                                    <a href="{{route('admin.category.add')}}" class="btn btn-sm">Add Category</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" style="border-bottom: 1px solid #dee2e6">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Image</th>
                                                <th>Sub Category</th>
                                                <th class="text-center" colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{ucwords($category->name)}}</td>
                                                    <td>{{$category->slug}}</td>
                                                    <td>
                                                        @if(strlen($category->image)<30)
                                                            <img src="{{ asset('frontend/assets/images/category')}}/{{$category->image}}" style="width: 50px;height: 50px">
                                                        @else
                                                            <img src="{{$category->image}}" style="width: 50px;height: 50px">
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <ul class="sclist">
                                                            @foreach($category->subCategories as $scategory)
                                                            <li><i class="fi-rs-caret-right"></i>{{ucwords($scategory->name)}}
                                                                <a href="{{route('admin.category.edit',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="ml-5"><i class="fi-rs-edit"></i></a>
                                                                <a href=""  onclick="confirm('Are you sure,you want to delete this subcategory ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubcategory({{$scategory->id}})" class="ml-5"><i class="fi-rs-trash"></i></a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>

                                                    <td><a href="{{route('admin.category.edit',['category_slug'=>$category->slug])}}" class="btn btn-sm"><i class="fi-rs-edit"></i></a></td>
                                                    <td><button type="button" wire:click="deleteId({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm"><i class="fi-rs-trash"></i></button></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $categories->links() }}

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


