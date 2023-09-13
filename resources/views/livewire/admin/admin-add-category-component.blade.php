
<section class="pt-10 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <form class="contact-form-style mt-2 mb-2" wire:submit.prevent="addCategory">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>Slider Details</h5>
                                    <a href="{{route('admin.category')}}" class="text-info">Manage Category</a>
                                </div>
                                <div class="card-body contact-from-area">
                                    @if(session()->has('message'))
                                        <div class="alert alert-primary">{{session()->get('message')}}</div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="input-style mb-2">
                                                <label>Category Name</label>
                                                <input name="billing-email" placeholder="Email Category Name" type="text" class="square" wire:model="name" wire:keyup="generateSlug">
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>


                                            <div class="input-style mb-2">
                                                <label>Slug</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="slug">
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>image</label>
                                                <input  class="form-control square" placeholder="Enter Image" type="file" wire:model="image">
                                                <div wire:loading wire:target="image">Uploading...</div>

                                                @if($image)
                                                    <img src="{{$image->temporaryUrl()}}" width="100" alt="">
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

                                            <button class="submit submit-auto-width" type="submit">Add Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
