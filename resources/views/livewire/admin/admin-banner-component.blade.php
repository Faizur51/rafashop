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
                                <h5 class="mb-0">Your Banners</h5>
                                <a href="{{route('admin.banner.add')}}" class="text-info">Add Banner</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" style="border-bottom: 1px solid #dee2e6">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Top Title</th>
                                            <th>Slug</th>
                                            <th>Title</th>
                                            <th>Link</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th class="text-center" colspan="2">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($banners as $banner)
                                            <tr>
                                                <td>{{$banner->id}}</td>
                                                <td>{{ucwords($banner->top_title)}}</td>
                                                <td>{{ucwords($banner->slug)}}</td>
                                                <td>{{ucwords($banner->title)}}</td>

                                                <td>{{$banner->link}}</td>
                                                <td>{{$banner->start_date}}</td>
                                                <td>{{$banner->end_date}}</td>
                                                <td>
                                                    @if(strlen($banner->image)<30)
                                                        <img src="{{ asset('frontend/assets/images/banner')}}/{{$banner->image}}" style="width: 50px;height: 50px">
                                                    @else
                                                        <img src="{{$banner->image}}" style="width: 50px;height: 50px">
                                                    @endif
                                                </td>
                                                <td>{{$banner->status ==1 ?'Active':'Inactive'}}</td>
                                             <td><a href="{{route('admin.banner.edit',['banner_slug'=>$banner->slug])}}" class="btn-small">Edit</a></td>
                                                <td><button type="button" wire:click="deleteId({{ $banner->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>

                                    {{ $banners->links() }}

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

