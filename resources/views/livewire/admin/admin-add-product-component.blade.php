<section class="pt-10 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                @if(session()->has('message'))
                    <div class="alert alert-primary">{{session()->get('message')}}</div>
                @endif
                <form class="contact-form-style mt-2 mb-2" wire:submit.prevent="addProduct">
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
                                                    <div id="short_description" wire:model="short_description"></div>
                                                </div>
                                                @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Long description</label>
                                                <div wire:ignore>
                                                    <div id="description" wire:model="description"></div>
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

                                                <div class="payment_method">
                                                    <div class="mb-5">
                                                        <h5>Color</h5>
                                                    </div>
                                                    <div class=" d-flex justify-content-around">
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option1" id="exampleRadios3" value="green" wire:model="color">
                                                            <label class="form-check-label" for="exampleRadios3"  aria-controls="cashOnDelivery">Green</label>
                                                        </div>

                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option2" id="exampleRadios5" value="red" wire:model="color">
                                                            <label class="form-check-label" for="exampleRadios5"  aria-controls="paypal">Red</label>
                                                        </div>
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option3" id="exampleRadios4" value="purple" wire:model="color">
                                                            <label class="form-check-label" for="exampleRadios4" aria-controls="cardPayment">Purple</label>
                                                        </div>
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option3" id="exampleRadios42" value="orange" wire:model="color">
                                                            <label class="form-check-label" for="exampleRadios42" aria-controls="cardPayment">Orange</label>
                                                        </div>
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option3" id="exampleRadios420" value="cyan" wire:model="color">
                                                            <label class="form-check-label" for="exampleRadios420" aria-controls="cardPayment">Cyan</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="payment_method">
                                                    <div class="mb-5">
                                                        <h5>Size</h5>
                                                    </div>
                                                    <div class=" d-flex justify-content-around">
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option1" id="exampleRadios30" value="s" wire:model="size">
                                                            <label class="form-check-label" for="exampleRadios30"  aria-controls="cashOnDelivery">S</label>
                                                        </div>

                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option2" id="exampleRadios50" value="m" wire:model="size">
                                                            <label class="form-check-label" for="exampleRadios50"  aria-controls="paypal">M</label>
                                                        </div>
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option3" id="exampleRadios40" value="l" wire:model="size">
                                                            <label class="form-check-label" for="exampleRadios40" aria-controls="cardPayment">L</label>
                                                        </div>
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option3" id="exampleRadios60" value="xl" wire:model="size">
                                                            <label class="form-check-label" for="exampleRadios60" aria-controls="cardPayment">XL</label>
                                                        </div>
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="payment_option3" id="exampleRadios70" value="xxl" wire:model="size">
                                                            <label class="form-check-label" for="exampleRadios70" aria-controls="cardPayment">XXL</label>
                                                        </div>
                                                    </div>
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
                                                        <label>Galary Images</label>
                                                        <input name="billing-email" class="form-control square" placeholder="Enter Image"  type="file" multiple wire:model="images">
                                                        @if($images)
                                                            @foreach($images as $image)
                                                                <img src="{{$image->temporaryUrl()}}" width="100" alt="">
                                                            @endforeach
                                                        @endif

                                                        @error('images') <p class="text-danger">{{$message}}</p> @enderror
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
