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
                                    <h5 class="mb-0">Your Orders</h5>
                                    <a href="{{route('admin.home.slider.add')}}" class="text-info">Add Slider</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Top Title</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>Offer</th>
                                                <th>Link</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th class="text-center" colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($sliders as $slider)
                                            <tr>
                                                <td>{{$slider->id}}</td>
                                                <td>{{ucwords($slider->top_title)}}</td>
                                                <td>{{ucwords($slider->title)}}</td>
                                                <td>{{$slider->sub_title}}</td>
                                                <td>{{ucwords($slider->offer)}}</td>
                                                <td>{{$slider->link}}</td>
                                                <td>
                                                    @if(strlen($slider->image)<30)
                                                        <img src="{{ asset('frontend/assets/images/slider')}}/{{$slider->image}}" style="width: 50px;height: 50px">
                                                    @else
                                                        <img src="{{$slider->image}}" style="width: 50px;height: 50px">
                                                    @endif
                                                </td>
                                                <td>{{$slider->status ==1 ?'Active':'Inactive'}}</td>
                                                <td><a href="{{route('admin.home.slider.edit',['slider_id'=>$slider->id])}}" class="btn-small">Edit</a></td>
                                                <td><button type="button" wire:click="deleteId({{ $slider->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $sliders->links() }}

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

