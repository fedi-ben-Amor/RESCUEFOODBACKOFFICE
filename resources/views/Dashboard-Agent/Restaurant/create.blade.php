@extends('layouts.app')
@section('content')
    <div class="pt-5 pb-5">
        <div class="container-fluid">
            <!-- User info -->
            @include('layouts.navbar-agent')

            <!-- Content -->
            <div class="row mt-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Side navbar -->
                    @include('layouts.sidebar-agent')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Add New Restaurant</h3>
                            <p class="mb-0">
                                Fill in the details to add a new restaurant.
                            </p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form class="form-row" method="POST" action="{{ route('restaurents.store') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Restaurant Name -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="name">Restaurant Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Restaurant Name"  />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Phone -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone"  />
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Cuisine Type -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="cuisine_type">Cuisine Type</label>
                                    <input type="text" id="cuisine_type" name="cuisine_type" class="form-control" placeholder="Cuisine Type"  />
                                    @error('cuisine_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Description -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Address -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Address"  />
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- City -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="city">City</label>
                                    <input type="text" id="city" name="city" class="form-control" placeholder="City"  />
                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- State -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="state">State</label>
                                    <input type="text" id="state" name="state" class="form-control" placeholder="State"  />
                                    @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Logo Upload -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="logo">Upload Logo</label>
                                    <input type="file" id="logo" name="logo" class="form-control" />
                                    @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Picture Upload -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="picture">Upload Picture</label>
                                    <input type="file" id="picture" name="picture" class="form-control" />
                                    @error('picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="col-12">
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="submit">
                                        Add Restaurant
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row align-items-center no-gutters border-top py-2">
                <!-- Desc -->
                <div class="col-md-6 col-12 text-center text-md-left">
                    <span>© 2020 Geeks. All Rights Reserved.</span>
                </div>
                <!-- Links -->
                <div class="col-12 col-md-6">
                    <nav class="nav nav-footer justify-content-center justify-content-md-end">
                        <a class="nav-link active pl-0" href="#!">Privacy</a>
                        <a class="nav-link" href="#!">Terms</a>
                        <a class="nav-link" href="#!">Feedback</a>
                        <a class="nav-link" href="#!">Support</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
