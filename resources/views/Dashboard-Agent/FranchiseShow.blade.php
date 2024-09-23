@extends('layouts.app')

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
                    <div class="card mb-4" style="height: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <!-- Image Upload Section -->
                                <div class="col-lg-6 col-md-6">
                                    @if ($franchise->image_data)
                                        <img src="data:image/jpeg;base64,{{ $franchise->image_data }}" alt="Franchise Image" class="img-fluid rounded" style="width: 100%;">
                                    @else
                                        <img src="{{ asset('assets/images/plan-b.jpg') }}" class="img-fluid rounded" alt="Franchise Image" style="width: 100%;">
                                    @endif
                                    <form action="{{ route('franchises.update.image', $franchise->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mt-3">
                                            <label for="image">Franchise Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary w-100">Upload Image</button>
                                    </form>
                                </div>

                                <!-- Franchise Information Section -->
                                <div class="col-lg-6 col-md-6">
                                    <h2 class="mb-4 text-left" style="font-size: 4rem; font-weight: bold;">{{ $franchise->name }}</h2>
                                    <p><strong>Location:</strong> {{ $franchise->location }}</p>
                                    <p><strong>Manager:</strong> {{ $franchise->manager_name }}</p>
                                    <p><strong>Contact:</strong> {{ $franchise->contact_number }}</p>
                                    <p><strong>Email:</strong> {{ $franchise->email }}</p>
                                    <div class="d-flex justify-content-end mt-4">
                                        <a href="{{ route('franchises.edit', $franchise->id) }}" class="btn btn-primary">Edit</a>
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
