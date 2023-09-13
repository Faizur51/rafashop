
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
                                        <h5>Slider Details</h5>
                                        <a href="{{route('admin.category')}}" class="btn btn-primary btn-sm">Manage Category</a>
                                    </div>
                                    <div class="card-body">

                                        @if(session()->has('message'))
                                            <div class="alert alert-primary">{{session()->get('message')}}</div>
                                        @endif

                                        <form wire:submit.prevent="updateCategory">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Category Name <span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Category name" type="text" wire:model="name" wire:keyup="generateSlug">
                                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Slug <span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Slug" type="text" wire:model="slug">
                                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Image<span class="required">*</span></label>
                                                    <input  class="form-control square" placeholder="Enter Image" type="file" wire:model="newimage">

                                                    @if($newimage)
                                                        <img src="{{$newimage->temporaryUrl()}}" width="100" alt="">
                                                    @else
                                                        <img src="{{asset('frontend/assets/images/category')}}/{{$image}}" width="100" alt="">
                                                    @endif

                                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>

                                                <div class="input-style mb-2">
                                                    <label>Parent Category</label>
                                                    <select name="" id="" class="form-control" wire:model="category_id">
                                                        <option value="">None</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Update Category</button>
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


