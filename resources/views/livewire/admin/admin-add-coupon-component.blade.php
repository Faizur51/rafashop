
<section class="pt-10 pb-10">

    <style>
        .custom_select .select2-container {
            max-width: 583px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <form class="contact-form-style mt-2 mb-2" wire:submit.prevent="addCoupon">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>Coupon</h5>
                                    <a href="{{route('admin.coupon')}}" class="text-info">Manage Coupon</a>
                                </div>
                                <div class="card-body contact-from-area">
                                    @if(session()->has('message'))
                                        <div class="alert alert-primary">{{session()->get('message')}}</div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-style mb-2">
                                                <label>Coupon Code</label>
                                                <input name="billing-email" placeholder="Email Coupon Code" type="text" class="square" wire:model="code" wire:keyup="generateSlug">
                                                @error('code') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Slug</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="slug">
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="form-group" >
                                                <div class="custom_select" wire:ignore >
                                                    <select name="" id="" class="form-control select-active" wire:model="type">
                                                    <option value="">Select Coupon Type</option>
                                                        <option value="fixed">Fixed</option>
                                                        <option value="percent">Percent</option>
                                                   </select>
                                               </div>
                                                @error('type') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>Coupon Value</label>
                                                <input name="billing-email" placeholder="Coupon Value" type="text" class="square" wire:model="value">
                                                @error('value') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>Cart Value</label>
                                                <input name="billing-email" placeholder="Cart Value" type="text" class="square" wire:model="cart_value">
                                                @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                             <div>
                                            <div class="input-style mb-2" wire:ignore>
                                                <label>Expiry Date</label>
                                                <input type="text" id="datepicker" placeholder="Expiry Date" wire:model="expiry_date" class="square" onchange="livewire.emit('setDate',this.value)" >
                                            </div>
                                                 @error('expiry_date') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>


                                            <button class="submit submit-auto-width" type="submit">Add Coupon</button>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
      var picker = new Pikaday({
          field: document.getElementById('datepicker'),
          onSelect: function() {
          @this.set('expiry_date',this.getMoment().format('DD-MM-YYYY'));
          }
      });

      document.addEventListener('livewire:load',function (){
          $('.select-active').select2();
          $('.select-active').on('change',function (){
              @this.set('type',this.value);
          })
      })

    </script>

@endpush

