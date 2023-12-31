<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <section class="pt-10 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item" wire:ignore>
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item" wire:ignore>
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        <li class="nav-item" wire:ignore>
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                        </li>
                                        <li class="nav-item" wire:ignore>
                                            <a class="nav-link " id="account-detail-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Change Password</a>
                                        </li>
                                        <li class="nav-item" wire:ignore>
                                            <a class="nav-link " id="account-detail-tab" data-bs-toggle="tab" href="#update-profile" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Update Profile</a>
                                        </li>
                                        <li class="nav-item" wire:ignore>
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#my-profile" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>My Profile</a>
                                        </li>
                                        <li class="nav-item" wire:ignore>
                                            <a class="nav-link" href="login.html"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab" wire:ignore.self>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello Rosie! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab" wire:ignore.self>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Your Orders</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table" style="border-bottom: 1px solid #dee2e6">
                                                        <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>#1357</td>
                                                            <td>March 45, 2022</td>
                                                            <td>Processing</td>
                                                            <td>$125.00 for 2 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2022</td>
                                                            <td>Completed</td>
                                                            <td>$364.00 for 5 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2366</td>
                                                            <td>August 02, 2022</td>
                                                            <td>Completed</td>
                                                            <td>$280.00 for 3 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab" wire:ignore.self>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Billing Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>000 Interstate<br> 00 Business Spur,<br> Sault Ste. <br>Marie, MI 00000</address>
                                                        <p>New York</p>
                                                        <a href="#" class="btn-small">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Shipping Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>4299 Express Lane<br>
                                                            Sarasota, <br>FL 00000 USA <br>Phone: 1.000.000.0000</address>
                                                        <p>Sarasota</p>
                                                        <a href="#" class="btn-small">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="account-detail-tab" wire:ignore.self>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Change Password</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" wire:submit.prevent="changePassword" class="contact-form-style">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="input-style mb-10">
                                                                <label>Current Password <span class="required text-danger">*</span></label>
                                                                <input name="order-id" placeholder="Enter Current Password" type="password" class="square" wire:model="current_password">
                                                                @error('current_password') <span class="text-danger"> {{$message}}</span> @enderror
                                                            </div>

                                                            <div class="input-style mb-10">
                                                                <label>New Password <span class="required text-danger">*</span></label>
                                                                <input name="order-id" placeholder="Enter New Password" type="password" class="square" wire:model="password">
                                                                @error('password') <span class="text-danger"> {{$message}}</span> @enderror
                                                            </div>

                                                            <div class="input-style mb-10">
                                                                <label>Confirm Password <span class="required text-danger">*</span></label>
                                                                <input name="order-id" placeholder="Enter Confirm Password" type="password" class="square" wire:model="password_confirmation">
                                                                @error('password_confirmation') <span class="text-danger"> {{$message}}</span> @enderror
                                                            </div>

                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="update-profile" role="tabpanel" aria-labelledby="account-detail-tab" wire:ignore.self>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Update Profile Account</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" wire:submit.prevent="updateProfile">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            @if($newimage)
                                                                <img src="{{$newimage->temporaryUrl()}}" alt="">
                                                            @elseif($image)
                                                                <img src="{{asset('frontend/assets/images/profile')}}/{{$image}}" alt="">
                                                            @else
                                                                <img src="{{asset('frontend/assets/images/profile/avatar-7.jpg')}}" alt="">
                                                            @endif
                                                            <input  class="form-control square"  name="image" type="file" wire:model="newimage">
                                                        </div>
                                                        <div class="col-md-8">

                                                            <div class="input-style mb-10">
                                                                <label>Name <span class="required text-danger">*</span></label>
                                                                <input  placeholder="Enter your name" type="text" class="square" wire:model="name">
                                                            </div>

                                                            <div class="input-style mb-10">
                                                                <label>Email <span class="required text-danger">*</span></label>
                                                                <input  placeholder="Enter your email" type="text" readonly class="square" wire:model="email">
                                                            </div>

                                                            <div class="input-style mb-10">
                                                                <label>Mobile <span class="required text-danger">*</span></label>
                                                                <input  placeholder="Enter your mobile" type="text" class="square" wire:model="mobile">
                                                            </div>

                                                            <div class="input-style mb-10">
                                                                <label>City <span class="required text-danger">*</span></label>
                                                                <input  placeholder="Enter your city" type="text" class="square" wire:model="city">
                                                            </div>

                                                            <div class="input-style mb-10">
                                                                <label>District <span class="required text-danger">*</span></label>
                                                                <input  placeholder="Enter your district" type="text" class="square" wire:model="district">
                                                            </div>

                                                            <div class="input-style mb-10">
                                                                <label>Thana <span class="required text-danger">*</span></label>
                                                                <input  placeholder="Enter your thana" type="text" class="square" wire:model="thana">
                                                            </div>

                                                            <div class="input-style mb-10">
                                                                <label>Zipcode <span class="required text-danger">*</span></label>
                                                                <input placeholder="Enter your zipcode" type="text" class="square" wire:model="zipcode">
                                                            </div>

                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="my-profile" role="tabpanel" aria-labelledby="orders-tab" wire:ignore.self>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Profile Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        @if($user->profile->image)
                                                            <img src="{{asset('frontend/assets/images/profile')}}/{{$user->profile->image}}" alt="">
                                                        @else
                                                            <img src="{{asset('frontend/assets/images/profile/avatar-7.jpg')}}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>{{$user->name}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td>{{$user->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>User Type</td>
                                                                    <td>{{$user->utype}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mobile</td>
                                                                    <td>{{$user->profile->mobile}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>City</td>
                                                                    <td>{{$user->profile-> city}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>District</td>
                                                                    <td>{{$user->profile->district}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Thana</td>
                                                                    <td>{{$user->profile->thana}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ZipCode</td>
                                                                    <td>{{$user->profile->zipcode}}</td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
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
    </main>
</div>
