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
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">Reviews</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                    <h1 class="h3 mb-0">Reviews</h1>
                </div>
            </div>
        </div>

        <!-- Outlet stores-->
        <section class="container pt-4 mt-md-4 mb-5">
            <h2 class="h3 text-center mb-3">My Reviews for all the food Markets..</h2>
            <div class="row pt-4" id="review-container">
                @foreach ($reviews as $index => $review)
                    <div class="col-md-4 col-sm-6 mb-grid-gutter review-card {{ $index >= 3 ? 'd-none' : '' }}">
                        <div class="card border-0 shadow">
                            <img class="card-img-top" src="{{ asset('storage/' . $review->restaurent->picture) }}" alt="{{ $review->restaurent->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h6>{{ $review->restaurent->name }}</h6>
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="ci-star {{ $i <= $review->rating ? 'text-primary' : 'text-muted' }}"></i>
                                    @endfor
                                </div><br>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex pb-3 border-bottom">
                                        <i class="ci-location fs-lg mt-2 mb-0 text-primary"></i>
                                        <div class="ps-3">
                                            <span class="fs-ms text-muted">Find us</span>
                                            <a class="d-block text-heading fs-sm" href="#">{{ $review->comment }}</a>
                                        </div>
                                    </li>
                                    <li class="d-flex pt-2 pb-3 border-bottom">
                                        <i class="ci-phone fs-lg mt-2 mb-0 text-primary"></i>
                                        <div class="ps-3">
                                            <span class="fs-ms text-muted">Call our Restaurant</span>
                                            <a class="d-block text-heading fs-sm" href="tel:{{ $review->restaurent->phone }}">{{ $review->restaurent->phone }}</a>
                                        </div>
                                    </li>
                                    <li class="d-flex pt-2">
                                        <i class="ci-location fs-lg mt-2 mb-0 text-primary"></i>
                                        <div class="ps-3">
                                            <span class="fs-ms text-muted">Visit us</span>
                                            <a class="d-block text-heading fs-sm" href="#">{{ $review->restaurent->state }}, {{ $review->restaurent->city }}, {{ $review->restaurent->address }}</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-end mt-2 mb-3 mx-2">
                                <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="ci-edit align-middle me-1"></i> Edit
                                </a>
                                
                                <a href="#" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $review->id }}').submit();">
                                    <i class="ci-trash align-middle me-1"></i> Delete
                                </a>
                                <form id="delete-form-{{ $review->id }}" action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <button id="view-all-btn" class="btn btn-primary" onclick="toggleReviews()">View All</button>
            </div>
        </section>
    </main>
    
    @include('Frontoffice.shared.footer')

    <script>
        function toggleReviews() {
            const reviews = document.querySelectorAll('.review-card.d-none');
            const btn = document.getElementById('view-all-btn');

            if (reviews.length > 0) {
                reviews.forEach(review => {
                    review.classList.remove('d-none');
                });
                btn.textContent = 'View Less';
            } else {
                const allReviews = document.querySelectorAll('.review-card');
                allReviews.forEach(review => {
                    review.classList.add('d-none');
                });
                // Show the first three again
                allReviews.forEach((review, index) => {
                    if (index < 3) {
                        review.classList.remove('d-none');
                    }
                });
                btn.textContent = 'View All';
            }
        }
    </script>
@endsection
