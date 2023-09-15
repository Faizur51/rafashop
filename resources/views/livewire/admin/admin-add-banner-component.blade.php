<section class="pt-10 pb-10">

    <style>
        .custom_select .select2-container {
            max-width: 583px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <form class="contact-form-style mt-2 mb-2" wire:submit.prevent="addBanner">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>Coupon</h5>
                                    <a href="{{route('admin.banner')}}" class="text-info">Manage Banner</a>
                                </div>
                                <div class="card-body contact-from-area">
                                    @if(session()->has('message'))
                                        <div class="alert alert-primary">{{session()->get('message')}}</div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-style mb-2">
                                                <label>Top Title</label>
                                                <input name="billing-email" placeholder="Enter Top Title" type="text" class="square" wire:model="top_title" wire:keyup="generateSlug">
                                                @error('top_title') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Slug</label>
                                                <input name="billing-email" placeholder="Email Slug Name" type="text" class="square" wire:model="slug">
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>Title</label>
                                                <input name="billing-email" placeholder="Enter Title" type="text" class="square" wire:model="title">
                                                @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="input-style mb-2">
                                                <label>Link</label>
                                                <input name="billing-email" placeholder="Enter Link" type="text" class="square" wire:model="link">
                                                @error('link') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>


                                            <div class="input-style mb-2" wire:ignore>
                                                <label>Start Date</label>
                                                <input type="text" id="datepicker1" placeholder="Start Date" wire:model="start_date" class="square"
                                                       onchange="livewire.emit('setStartDate',this.value)">
                                                @error('start_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>


                                            <div class="input-style mb-2" wire:ignore>
                                                <label>End Date</label>
                                                <input type="text" id="datepicker2" placeholder="End  Date" wire:model="end_date" class="square"
                                                       onchange="livewire.emit('setDate',this.value)">
                                                @error('end_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>image</label>
                                                <input class="form-control square" placeholder="Enter Image" type="file" wire:model="image">
                                                <div wire:loading wire:target="image">Uploading...</div>

                                                @if($image)
                                                    <img src="{{$image->temporaryUrl()}}" width="100" alt="">
                                                @endif
                                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="custom_select" wire:ignore>
                                                    <select name="" id="" class="form-control select-active" wire:model="status">
                                                        <option value="">Select Coupon Type</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                                @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <button class="submit submit-auto-width" type="submit">Add Banner/button>
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
            field: document.getElementById('datepicker1'),
            onSelect: function () {
            @this.set('start_date', this.getMoment().format('DD-MM-YYYY'));
            }
        });

        var picker = new Pikaday({
            field: document.getElementById('datepicker2'),
            onSelect: function () {
            @this.set('end_date', this.getMoment().format('DD-MM-YYYY'));
            }
        });


        document.addEventListener('livewire:load', function () {
            $('.select-active').select2();
            $('.select-active').on('change', function () {
            @this.set('status', this.value);
            })
        })

    </script>

@endpush

