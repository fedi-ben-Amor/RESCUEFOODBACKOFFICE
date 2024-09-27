@extends('FrontOfficeLayout.app')
@section('content')
@extends('Frontoffice.shared.sign')
@include('Frontoffice.shared.nav')

<!-- Cover Section -->
<section class="bg-darker bg-size-cover bg-position-center py-5" style="background-image: url('{{ asset($restaurent->picture) }}');">
    <div class="container py-md-4">
        <h1 class="text-light text-center">{{ $restaurent->name }}</h1>
    </div>
</section>

<!-- Cover Image Section -->
<div class="cover-image">
    <img src="{{ asset('storage/' . $restaurent->picture) }}" class="img-fluid w-100" alt="{{ $restaurent->name }} cover image" style="height: 300px; object-fit: cover;">
</div>

<section class="container py-4 py-sm-5">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('storage/' .$restaurent->logo) }}" alt="{{ $restaurent->name }} Logo">
        </div>
        <div class="col-md-6">
            <h3 class="mb-3">Details</h3>
            <p><strong>Description:</strong> {{ $restaurent->description }}</p>
            <p><strong>Address:</strong> {{ $restaurent->address }}</p>
            <p><strong>City:</strong> {{ $restaurent->city }}</p>
            <p><strong>State:</strong> {{ $restaurent->state }}</p>
            <p><strong>Contact:</strong> {{ $restaurent->phone }}</p>
            <p><strong>Cuisine Type:</strong> {{ $restaurent->cuisine_type }}</p>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="container py-5">
    <!-- Review Form -->
    <h4 class="mb-3">Add a Review</h4>
    <form action="{{ route('reviews.store', $restaurent->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Rating</label>
            <div class="star-rating">
                <input type="radio" id="star5" name="rating" value="5" required>
                <label for="star5" class="star">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4" class="star">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3" class="star">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2" class="star">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1" class="star">&#9733;</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">Cancel</a> 
    </form>
</section>

<style>
    .star-rating {
        direction: rtl;
        display: flex;
        justify-content: flex-start;
        margin-bottom: 1rem;
    }

    .star {
        font-size: 2rem; /* Size of the star */
        color: #ddd; /* Color of unselected stars */
        cursor: pointer;
    }

    .star-rating input[type="radio"] {
        display: none; /* Hide radio buttons */
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: gold; /* Color of stars on hover */
    }

    .star-rating input[type="radio"]:checked ~ label {
        color: gold; /* Color of selected stars */
    }
</style>


@endsection
