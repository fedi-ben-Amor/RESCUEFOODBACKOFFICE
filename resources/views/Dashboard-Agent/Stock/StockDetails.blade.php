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
                    <!-- Stock Detail Card -->
                    <div class="card mb-4" style="height: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <!-- Image Section -->
                                <div class="col-lg-6 col-md-6">
                                    @if ($stock->image_data)
                                        <img src="data:image/jpeg;base64,{{ $stock->image_data }}" alt="Stock Image" class="img-fluid rounded" style="width: 100%;">
                                    @else
                                        <img src="{{ asset('path/to/default/image.jpg') }}" class="img-fluid rounded" alt="Stock Image" style="width: 100%;">
                                    @endif
                                    <form action="{{ route('stocks.update.image', $stock->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mt-3">
                                            <label for="image">Stock Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary w-100">Upload Image</button>
                                    </form>
                                </div>

                                <!-- Stock Information Section -->
                                <div class="col-lg-6 col-md-6">
                                    <h2 class="mb-4 text-left" style="font-size: 2.5rem; font-weight: bold;">{{ $foods[$stock->food_id]['name'] }}</h2>
                                    <p><strong>Franchise:</strong> {{ $stock->franchise->name }}</p>
                                    <p><strong>Quantity:</strong> {{ $stock->quantity }}</p>
                                    <p><strong>Expiration Date:</strong> {{ $stock->expiration_date->format('Y-m-d') }}</p>
                                    <div class="d-flex justify-content-end mt-4">
                                        <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-primary">Edit</a>
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
