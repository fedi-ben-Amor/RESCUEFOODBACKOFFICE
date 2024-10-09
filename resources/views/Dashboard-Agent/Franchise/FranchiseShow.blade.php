@extends('layouts.app')
@section('content')

    <main>
        <section class="pt-5 pb-5">
            <div class="container-fluid">
                <!-- Navbar Agent -->
                @include('layouts.navbar-agent')

                <!-- Content -->
                <div class="row mt-0 mt-md-4">
                    <div class="col-lg-3 col-md-4 col-12">
                        <!-- Sidebar Agent -->
                        @include('layouts.sidebar-agent')
                    </div>

                    <div class="col-lg-9 col-md-8 col-12">
                        <!-- Franchise Detail Card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Franchise Details</h3>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="form-row">
                                    <!-- Franchise Name -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="name">Franchise Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $franchise->name }}" disabled />
                                    </div>
                                    <!-- Location -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="location">Location</label>
                                        <input type="text" id="location" name="location" class="form-control" value="{{ $franchise->location }}" disabled />
                                    </div>
                                    <!-- Manager Name -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="manager_name">Manager Name</label>
                                        <input type="text" id="manager_name" name="manager_name" class="form-control" value="{{ $franchise->manager_name }}" disabled />
                                    </div>
                                    <!-- Contact Number -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="contact_number">Contact Number</label>
                                        <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ $franchise->contact_number }}" disabled />
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $franchise->email }}" disabled />
                                    </div>

                                    <!-- Location Info -->
                                    <h5 class="col-12 mt-4">Location Info</h5>
                                    <!-- City -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control" value="{{ $franchise->city }}" disabled />
                                    </div>
                                    <!-- State -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="state">State</label>
                                        <input type="text" id="state" name="state" class="form-control" value="{{ $franchise->state }}" disabled />
                                    </div>
                                    <!-- Zip Code -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="zip_code">Zip Code</label>
                                        <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ $franchise->zip_code }}" disabled />
                                    </div>
                                    <!-- Status -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="status">Status</label>
                                        <input type="text" id="status" name="status" class="form-control" value="{{ ucfirst($franchise->status) }}" disabled />
                                    </div>

                                    <!-- Restaurant Selection -->
                                    <h5 class="col-12 mt-4">Restaurant Info</h5>
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="restaurant_name">Restaurant Name</label>
                                        <input type="text" id="restaurant_name" name="restaurant_name" class="form-control" value="{{ $franchise->restaurant->name }}" disabled />
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label">Restaurant Logo</label>
                                        <div>
                                            <img src="{{ asset('storage/' . $franchise->restaurant->logo) }}" alt="Restaurant Logo" class="img-fluid" style="max-height: 100px;">
                                        </div>
                                    </div>

                                    <!-- Franchise Image -->
                                    <h5 class="col-12 mt-4">Franchise Image</h5>
                                    <div class="form-group col-12">
                                        <div>
                                            @if ($franchise->image_data)
                                                <img src="data:image/jpeg;base64,{{ $franchise->image_data }}" alt="Franchise Image" class="img-fluid rounded" style="max-height: 200px;">
                                            @else
                                                <img src="{{ asset('assets/images/plan-b.jpg') }}" class="img-fluid rounded" alt="Franchise Image" style="max-height: 200px;">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                    
                                        <!-- Edit Button -->
                                        <div class="d-flex justify-content-end mt-4">
                                            <form action="{{ route('franchises.delete', $franchise->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this franchise?');">
                                                    delete
                                                </button>
                                            </form>

                                            <a href="{{ route('franchises.edit', $franchise->id) }}" class="btn btn-primary">Edit Franchise</a>
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

    <!-- Footer Agent -->
    @include('layouts.footer-agent')
@endsection
