<section class="pt-10 pb-10">
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
                                                <label>name </label>
                                                <input name="name-id" placeholder="Found in your order confirmation email" type="text" class="square" wire:model="name" wire:keyup="generateSlug">
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>slug</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="text" class="square" wire:model="slug" >
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>short_description</label>
                                                <div wire:ignore>
                                                    <div id="short_description" wire:model="short_description">{!!$short_description!!}</div>
                                                </div>
                                                @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Long description</label>
                                                <div wire:ignore>
                                                    <div id="description" wire:model="description">{!!$description!!}</div>
                                                </div>
                                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>regular_price</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="text" class="square" wire:model="regular_price">
                                                @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>sale_price</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="text" class="square" wire:model="sale_price">
                                                @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>sku</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="text" class="square" wire:model="sku">
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
                                            <div class="input-style mb-2">
                                                <label>stock_status </label>
                                                <select class="form-select" name="" id=""  wire:model="stock_status">
                                                    <option value="">Select Stock Status</option>
                                                    <option value="1">In Stock</option>
                                                    <option value="0">Out Stock</option>
                                                </select>
                                                @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>featured </label>
                                                <select class="form-select" name="" id=""  wire:model="featured">
                                                    <option value="">Select Stock Status</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                @error('featured') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>quantity</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="text" class="square" wire:model="quantity">
                                                @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>image</label>
                                                <input  class="form-control square" placeholder="Enter Image" type="file" wire:model="newimage">

                                                @if($newimage)
                                                    <img src="{{$newimage->temporaryUrl()}}" width="100" alt="">
                                                @else
                                                    <img src="{{asset('frontend/assets/images/product')}}/{{$image}}" width="100" alt="">
                                                @endif
                                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>Galary image</label>
                                                <input  class="form-control square" placeholder="Enter Image" type="file" wire:model="newimages" multiple>

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



                                            <div class="input-style mb-2">
                                                <label>category_id </label>
                                                <select class="form-select" name="" id=""  wire:model="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
        $(function(){
            $('#short_description').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function (contents, $editable) {
                    @this.set('short_description', contents);
                    }
                }
            });
        })

        $(function (){
            $('#description').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function (contents, $editable) {
                    @this.set('description', contents);
                    }
                }
            });
        })

    </script>
@endpush
