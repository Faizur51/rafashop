
<section class="pt-10 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <form class="contact-form-style mt-2 mb-2" wire:submit.prevent="saveSetting">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>Setting Details</h5>
                                    <a href="{{route('admin.category')}}" class="text-info">Manage Setting</a>
                                </div>
                                <div class="card-body contact-from-area">
                                    @if(session()->has('message'))
                                        <div class="alert alert-primary">{{session()->get('message')}}</div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="input-style mb-2">
                                                <label>Phone</label>
                                                <input name="billing-email" placeholder="Email Category Name" type="text" class="square" wire:model="phone">
                                                @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>


                                            <div class="input-style mb-2">
                                                <label>Mobile</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="mobile">
                                                @error('mobile') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>


                                            <div class="input-style mb-2">
                                                <label>Email</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="email">
                                                @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Address</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="address">
                                                @error('address') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Facebook</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="facebook">
                                                @error('facebook') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Youtube</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="youtube">
                                                @error('youtube') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>twitter</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="twitter">
                                                @error('twitter') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>instagram</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="instagram">
                                                @error('instagram') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <button class="submit submit-auto-width" type="submit">Add Setting</button>
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
