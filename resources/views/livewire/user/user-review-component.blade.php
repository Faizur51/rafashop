<div class="container">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked) > input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked) > label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked) > label:before {
            content: '★ ';
        }

        .rate > input:checked ~ label {
            color: #ffc700;
        }

        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }

        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

        /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    </style>


    <div class="comments-area">
        <div class="row">
            <div class="col-lg-5">
                <h4 class="mb-30">Customer questions &amp; answers</h4>
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb text-center">

                                @if(strlen($orderItem->product->image)<30)
                                    <img src="{{asset('frontend/assets/images/product')}}/{{$orderItem->product->image}}" alt="">
                                @else
                                    <img src="{{$orderItem->product->image}}" alt="" style="width: 220px">
                                @endif
                            </div>
                            <div class="desc">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width:90%">
                                    </div>
                                </div>
                                <p>{{ucwords($orderItem->product->name)}}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <p class="font-xs mr-30">{{\Carbon\Carbon::parse($orderItem->product->created_at)->format('d/m/Y H:i:s')}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="comment-form">
                    <h4 class="mb-15">Add a review</h4>
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <form class="form-contact comment_form" action="#" id="commentForm" wire:submit.prevent="addReview">
                                <div class="row">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" wire:model="rating" value="5"/>
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" wire:model="rating" value="4"/>
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" wire:model="rating" value="3"/>
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" wire:model="rating" value="2"/>
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" wire:model="rating" value="1"/>
                                        <label for="star1" title="text">1 star</label>
                                        @error('rating') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" wire:model="comment" placeholder="Write Comment"></textarea>
                                            @error('rating') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm">Submit Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


