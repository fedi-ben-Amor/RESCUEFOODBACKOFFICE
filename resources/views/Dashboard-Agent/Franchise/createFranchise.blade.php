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
                            <h3 class="mb-0">Add New Franchise</h3>
                            <p class="mb-0">
                                Fill in the details to add a new franchise.
                            </p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form class="form-row" method="POST" action="{{ route('franchises.store') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Franchise Name -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="name">Franchise Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Franchise Name"  />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Location -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="location">Location</label>
                                    <input type="text" id="location" name="location" class="form-control" placeholder="Location"  />
                                    @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Manager Name -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="manager_name">Manager Name</label>
                                    <input type="text" id="manager_name" name="manager_name" class="form-control" placeholder="Manager Name"  />
                                    @error('manager_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Contact Number -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="contact_number">Contact Number</label>
                                    <input type="text" id="contact_number" name="contact_number" class="form-control" placeholder="Contact Number" />
                                    @error('contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Email -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <!-- Location Info -->
                                <h5 class="col-12 mt-4">Location Info</h5>
                                <!-- City -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="city">City</label>
                                    <input type="text" id="city" name="city" class="form-control" placeholder="City" />
                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- State -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="state">State</label>
                                    <input type="text" id="state" name="state" class="form-control" placeholder="State" />
                                    @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Zip Code -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="zip_code">Zip Code</label>
                                    <input type="text" id="zip_code" name="zip_code" class="form-control" placeholder="Zip Code" />
                                    @error('zip_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <!-- Status -->
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <!-- Restaurant Selection -->
                                <h5 class="col-12 mt-4">Restaurant Info</h5>
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="restaurant_id">Select Restaurant</label>
                                    <select id="restaurant_id" name="restaurant_id" class="form-control" >
                                        @foreach($restaurants as $restaurant)
                                            <option value="{{ $restaurant->id }}" data-logo="{{ asset('storage/' . $restaurant->logo) }}">{{ $restaurant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">Restaurant Logo</label>
                                    <div>
                                        <img id="restaurant_logo_preview" src="" alt="Restaurant Logo" class="img-fluid" style="max-height: 100px;">
                                    </div>
                                  
                                </div>

                                <!-- Franchise Image -->
                                <h5 class="col-12 mt-4">Franchise Image</h5>
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label" for="image">Upload Image</label>
                                    <input type="file" id="image" name="image" class="form-control" />
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">Preview</label>
                                    <div>
                                        <img id="image_preview" src="" alt="Image Preview" class="img-fluid" style="max-height: 200px;">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="submit">
                                        Add Franchise
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

    <script>
        // JavaScript to handle logo display based on restaurant selection
        document.getElementById('restaurant_id').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var logoUrl = selectedOption.getAttribute('data-logo');
            document.getElementById('restaurant_logo_preview').src = logoUrl ? logoUrl : '';
        });

        // JavaScript to handle image preview
        document.getElementById('image').addEventListener('change', function (event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('image_preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });

        // Trigger logo change event to show the initial logo
        document.getElementById('restaurant_id').dispatchEvent(new Event('change'));
    </script>
@endsection
