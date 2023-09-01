
<section class="pt-50 pb-50">

    <style>
        ::placeholder {
            font-size: 15px;
            font-weight: bold;
            font-family: "Times New Roman", Times, serif;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row ">
                    <div class="col-md-8 offset-2">
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h5>Update Slider</h5>
                                        <a href="{{route('admin.home.slider')}}" class="btn btn-primary btn-sm">Manage Slider</a>
                                    </div>
                                    <div class="card-body">

                                        @if(session()->has('message'))
                                            <div class="alert alert-primary">{{session()->get('message')}}</div>
                                        @endif

                                        <form wire:submit.prevent="updateSlider">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Top Title <span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Top Title" type="text" wire:model="top_title">
                                                    @error('top_title') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Title <span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Title" type="text" wire:model="title">
                                                    @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Sub Title <span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Sub Title" type="text" wire:model="sub_title">
                                                    @error('sub_title') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Offer <span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Offer" type="text" wire:model="offer">
                                                    @error('offer') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Link <span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Link" type="text" wire:model="link">
                                                    @error('link') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Image<span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Image" type="file" wire:model="newimage">


                                                    @if($newimage)
                                                        <img src="{{$newimage->temporaryUrl()}}" width="100" alt="">
                                                        @else
                                                        <img src="{{asset('frontend/assets/images/slider')}}/{{$image}}" width="100" alt="">
                                                    @endif
                                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Status<span class="required">*</span></label>
                                                    <select class="form-select" wire:model="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">InActive</option>
                                                    </select>
                                                    @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Update Slider</button>
                                                </div>
                                            </div>
                                        </form>
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


