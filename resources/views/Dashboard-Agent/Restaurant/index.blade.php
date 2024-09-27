@extends('layouts.app')
@section('content')
    <main>
        <section class="pt-5 pb-5">
            <div class="container-fluid">
                <!-- navbar-agent -->
                @include('layouts.navbar-agent')

                <!-- Content -->
                <div class="row mt-0 mt-md-4">
                    <div class="col-lg-3 col-md-4 col-12">
                        @include('layouts.sidebar-agent')
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Search Input -->

                            <!-- Add New Restaurant Button -->
                            <a href="{{ route('restaurents.create') }}" class="btn btn-success">Add New Restaurant</a>
                        </div>

                        <div class="row">
                            @forelse($restaurents as $restaurent)
                                <div class="col-lg-4 col-md-12 col-12 mb-grid-gutter">
                                    <!-- Restaurant Card -->
                                    <a class="card product-card h-100 border-0 shadow pb-2" href="{{ route('restaurents.show', $restaurent->id) }}">
                                        <!-- Display Picture -->
                                        <img class="card-img-top" src="{{ asset('storage/' . $restaurent->picture) }}" alt="{{ $restaurent->name }} picture">

                                        <div class="bg-white rounded-3 pt-1 px-2 mx-auto mt-n5" style="width: 175px;">
                                            <!-- Display Logo -->
                                            <img class="d-block rounded-3 mx-auto" src="{{ asset('storage/' . $restaurent->logo) }}" width="150" alt="Brand">
                                        </div>
                                        <div class="card-body text-center pt-3 pb-4">
                                            <h3 class="h5 mb-2">{{ $restaurent->name }}</h3>
                                            <div class="fs-ms text-muted">{{ $restaurent->cuisine_type }}</div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p>No restaurants found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer-agent')
@endsection
