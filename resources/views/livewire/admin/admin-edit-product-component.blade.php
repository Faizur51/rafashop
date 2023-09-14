<section class="pt-10 pb-10">
    <style>
        .custom_select .select2-container {
            max-width: 583px;
        }
    </style>


    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                @if(session()->has('message'))
                    <div class="alert alert-primary">{{session()->get('message')}}</div>
                @endif
                <form class="contact-form-style mt-2 mb-2" wire:submit.prevent="updateProduct">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Add Product</h5>
                                </div>
                                <div class="card-body contact-from-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-style mb-2">
                                                <label>Name </label>
                                                <input name="name-id" placeholder="Product Name" type="text" class="square" wire:model="name" wire:keyup="generateSlug">
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Slug</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="text" class="square" wire:model="slug" >
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Short Description</label>
                                                   <div wire:ignore>
                                                       {{--<textarea  class="form-control" id="sdescription" wire:model="short_description"></textarea>--}}
                                                       <div id="editor1" wire:model="short_description">{!!$short_description!!}</div>
                                                 </div>

                                                @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Long Description</label>
                                                <div wire:ignore>
                                              {{--   <div id="description" wire:model.defer="description">{!!$description!!}</div>--}}
                                                    <div id="editor2" wire:model="description">{!!$description!!}</div>
                                                </div>
                                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Regular Price</label>
                                                <input name="billing-email" placeholder="Regular Price" type="text" class="square" wire:model="regular_price">
                                                @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Sale Price</label>
                                                <input name="billing-email" placeholder="Sale Price" type="text" class="square" wire:model="sale_price">
                                                @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>SKU</label>
                                                <input name="billing-email" placeholder="SKU Code" type="text" class="square" wire:model="sku">
                                                @error('sku') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5 class="mb-0">Add Product</h5>
                                    <h5 class="mb-0"><a href="{{route('admin.product')}}">Manage Product</a></h5>
                                </div>
                                <div class="card-body contact-from-area">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="form-group" >
                                                <div class="custom_select" wire:ignore >
                                                    <select name="" id="" class="form-control select-active" wire:model="stock_status">
                                                        <option value="">Select Stock Status</option>
                                                        <option value="1">In Stock</option>
                                                        <option value="0">Out Stock</option>
                                                    </select>
                                                </div>
                                                @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="form-group" >
                                                <div class="custom_select" wire:ignore >
                                                    <select name="" id="" class="form-control select-active" wire:model="featured">
                                                        <option value="">Select Featured Status</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                                @error('featured') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Quantity</label>
                                                <input name="billing-email" placeholder="Quantity" type="text" class="square" wire:model="quantity">
                                                @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Image</label>
                                                <input  class="form-control square" placeholder="Enter Image" type="file" wire:model="newimage">

                                                @if($newimage)
                                                    <img src="{{$newimage->temporaryUrl()}}" width="100" alt="">
                                                @else
                                                    <img src="{{asset('frontend/assets/images/product')}}/{{$image}}" width="100" alt="">
                                                @endif
                                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>Galary Image</label>
                                                <input  class="form-control square" placeholder="Galary Image" type="file" wire:model="newimages" multiple>

                                                @if($newimages)
                                                   @foreach($newimages as $newimage)
                                                     @if($newimage)
                                                            <img src="{{$newimage->temporaryUrl()}}" width="100" alt="">
                                                         @endif
                                                   @endforeach
                                                @else
                                                  @foreach($images as $image)
                                                         @if($image)
                                                            <img src="{{asset('frontend/assets/images/product')}}/{{$image}}" width="100" alt="">
                                                        @endif
                                                   @endforeach
                                                @endif
                                            </div>

                                            <div class="form-group" >
                                                <div class="custom_select" wire:ignore >
                                                <select class="form-select select-active" name="" id=""  wire:model="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <button class="submit submit-auto-width" type="submit">Add Product</button>
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

@push('scripts')

    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('short_description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });

        document.addEventListener('livewire:load',function (){
            $('.select-active').select2();
            $('.select-active').on('change',function (){
            @this.set('stock_status',this.value);
            })
        })


    </script>
@endpush
