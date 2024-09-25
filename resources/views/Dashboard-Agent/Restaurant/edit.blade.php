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
                            <!-- Cover Image -->
                            <div class="cover-image">
                                <img src="{{ asset('storage/' . $restaurent->picture) }}" class="img-fluid w-100" alt="{{ $restaurent->name }} cover image" style="height: 300px; object-fit: cover;">
                            </div>

                            <!-- Card header -->
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="mb-0">Edit Restaurant - {{ $restaurent->name }}</h3>
                                <!-- Restaurant Logo -->
                                <img src="{{ asset('storage/' . $restaurent->logo) }}" alt="Restaurant Logo" class="img-fluid" style="height: 100px; width: auto;">
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Form -->
                                <form class="form-row" method="POST" action="{{ route('restaurents.update', $restaurent->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- Restaurant Name -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="name">Restaurant Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $restaurent->name }}" required />
                                    </div>
                                    <!-- Phone -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $restaurent->phone }}" required />
                                    </div>
                                    <!-- Cuisine Type -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="cuisine_type">Cuisine Type</label>
                                        <input type="text" id="cuisine_type" name="cuisine_type" class="form-control" value="{{ $restaurent->cuisine_type }}" required />
                                    </div>
                                    <!-- Description -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control">{{ $restaurent->description }}</textarea>
                                    </div>
                                    <!-- Address -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" value="{{ $restaurent->address }}" required />
                                    </div>
                                    <!-- City -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control" value="{{ $restaurent->city }}" required />
                                    </div>
                                    <!-- State -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="state">State</label>
                                        <input type="text" id="state" name="state" class="form-control" value="{{ $restaurent->state }}" required />
                                    </div>
                                    <!-- Logo Upload -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="logo">Upload New Logo</label>
                                        <input type="file" id="logo" name="logo" class="form-control" />
                                        <small class="form-text text-muted">PNG or JPG no bigger than 800px wide and tall.</small>
                                    </div>
                                    <!-- Picture Upload -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="picture">Upload New Picture</label>
                                        <input type="file" id="picture" name="picture" class="form-control" />
                                        <small class="form-text text-muted">PNG or JPG no bigger than 800px wide and tall.</small>
                                    </div>
                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">
                                            Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer-agent')
@endsection
