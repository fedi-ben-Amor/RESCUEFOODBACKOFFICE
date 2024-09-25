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
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Edit Franchise</h3>
                            <p class="mb-0">
                                Update franchise details and manage your information.
                            </p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Image Upload Section -->
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">
                                    @if ($franchise->image_data)
                                        <img src="data:image/jpeg;base64,{{ $franchise->image_data }}" id="img-uploaded" class="avatar-xl rounded" alt="Franchise Image" />
                                    @else
                                        <img src="{{ asset('path/to/default/image.jpg') }}" id="img-uploaded" class="avatar-xl rounded" alt="Franchise Image" />
                                    @endif
                                    <div class="ml-3">
                                        <h4 class="mb-0">Franchise Image</h4>
                                        <p class="mb-0">PNG or JPG no bigger than 800px wide and tall.</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#!" class="btn btn-outline-white btn-sm">Update Image</a>
                                    <a href="#!" class="btn btn-outline-danger btn-sm">Delete Image</a>
                                </div>
                            </div>
                            <hr class="my-5" />

                            <!-- FranchiseUseless Details Form -->
                            <div>
                                <h4 class="mb-0">Franchise Details</h4>
                                <p class="mb-4">
                                    Edit your franchise information.
                                </p>
                                <!-- Form -->
                                <form action="{{ route('franchises.update', $franchise->id) }}" method="POST" class="form-row" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- FranchiseUseless Name -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="name">Franchise Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $franchise->name }}" required />
                                    </div>

                                    <!-- Location -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="location">Location</label>
                                        <input type="text" id="location" name="location" class="form-control" value="{{ $franchise->location }}" required />
                                    </div>

                                    <!-- Manager Name -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="manager_name">Manager Name</label>
                                        <input type="text" id="manager_name" name="manager_name" class="form-control" value="{{ $franchise->manager_name }}" required />
                                    </div>

                                    <!-- Contact Number -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="contact_number">Contact Number</label>
                                        <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ $franchise->contact_number }}" />
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $franchise->email }}" />
                                    </div>

                                    <!-- Image -->
                                    <div class="form-group col-12">
                                        <label class="form-label" for="image">Upload New Image</label>
                                        <input type="file" id="image" name="image" class="form-control" />
                                    </div>

                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">Update Franchise</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- End of card -->
                </div> <!-- End of column -->
            </div> <!-- End of row -->
        </div> <!-- End of container-fluid -->
    </section>
</main>

<!-- Footer Agent -->
@include('layouts.footer-agent')
@endsection
