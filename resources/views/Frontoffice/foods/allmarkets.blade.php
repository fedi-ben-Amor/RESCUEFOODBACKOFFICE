@extends('FrontOfficeLayout.app')
@section('content')
@extends('Frontoffice.shared.sign')
@include('Frontoffice.shared.nav')

    <section class="bg-darker bg-size-cover bg-position-center py-5" style="background-image: url(img/food-delivery/category/pt-bg.jpg);">
        <div class="container py-md-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">All Food Markets</a></li>
                </ol>
            </nav>
            <h1 class="text-light text-center text-lg-start pt-3">All Food Markets</h1>
        </div>
    </section>

    <section class="container py-4 py-sm-5">
        <div class="row pt-3 pt-sm-0">
            @foreach($restaurants as $restaurant)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card product-card h-100 border-0 shadow pb-2">
                    <a href="{{ route('foodmarkets.show', $restaurant->id) }}">
                        <span class="badge badge-end badge-shadow bg-success fs-md fw-medium" data-bs-toggle="tooltip" title="Average meal cost">
                            Rating: {{ number_format($restaurant->average_rating, 2) }} / 5
                        </span>
                        <img class="card-img-top" src="{{ asset('storage/' . $restaurant->picture) }}" alt="{{ $restaurant->name }}">
                    </a>
                    <div class="bg-white rounded-3 pt-1 px-2 mx-auto mt-n5" style="width: 175px;">
                        <img class="d-block rounded-3 mx-auto" src="{{ asset('storage/' . $restaurant->logo) }}" width="150" alt="{{ $restaurant->name }}">
                    </div>
                    <div class="card-body text-center pt-3 pb-4">
                        <h3 class="h5 mb-2">{{ $restaurant->name }}</h3>
                        <div class="fs-ms text-muted">{{ $restaurant->description }}</div>
                        <a href="{{ route('foodmarkets.show', $restaurant->id) }}" class="btn btn-primary mt-3">Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
