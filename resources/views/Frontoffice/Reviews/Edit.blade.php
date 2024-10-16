@extends('FrontOfficeLayout.app')
@section('content')
    <!-- Sign in / sign up modal-->
    @extends('Frontoffice.shared.sign')
    @include('Frontoffice.shared.nav')

    <main class="page-wrapper">

        <!-- Page Title (Light)-->
        <div class="bg-secondary py-4">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">Edit Your Review</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                    <h1 class="h3 mb-0">Edit Your Review</h1>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <h1>Edit Your Review</h1>

            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <div class="rating" id="starRating">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="ci-star {{ $i <= old('rating', $review->rating) ? 'text-primary' : 'text-muted' }}" data-value="{{ $i }}"></i>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating', $review->rating) }}" required>
                    @error('rating')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label">Your Comment</label>
                    <textarea name="comment" id="comment" class="form-control" rows="4" placeholder="Share your thoughts about the restaurant..." required>{{ old('comment', $review->comment) }}</textarea>
                    @error('comment')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Review</button>
                <a href="{{ route('myreviews') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const stars = document.querySelectorAll('#starRating .ci-star');
                const ratingInput = document.getElementById('ratingInput');

                stars.forEach(star => {
                    star.addEventListener('click', function () {
                        const selectedRating = this.getAttribute('data-value');
                        ratingInput.value = selectedRating;

                        // Update star colors based on selection
                        stars.forEach(star => {
                            if (star.getAttribute('data-value') <= selectedRating) {
                                star.classList.add('text-primary');
                                star.classList.remove('text-muted');
                            } else {
                                star.classList.remove('text-primary');
                                star.classList.add('text-muted');
                            }
                        });
                    });
                });
            });
        </script>
@endsection
