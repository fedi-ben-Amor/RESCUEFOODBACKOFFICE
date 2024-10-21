@extends('layouts.app')

@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container-fluid">
            @include('layouts.navbar-agent')
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    @include('layouts.sidebar-agent')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="card mb-4">
                        <div class="card-header d-lg-flex align-items-center justify-content-between">
                            <div class="mb-3 mb-lg-0">
                                <h3 class="mb-0">Reviews</h3>
                                <span>You have full control to manage your own account settings.</span>
                            </div>
                            <div>
                                <a href="#" class="btn btn-outline-primary btn-sm">Export To CSV...</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach($reviews as $review)
                                    @foreach($resto as $restos)
                                        @if($restos->id == $review->restaurent_id)
                                            <div class="col-md-6 mb-4">
                                                <div class="card border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-start">
                                                            <img src="{{ asset('storage/' . $review->restaurent->logo) }}" alt="Restaurant Logo" class="rounded-circle avatar-lg me-3">
                                                            <div style="padding-left: 20px;">
                                                                <h5 class="card-title">{{ $review->restaurent->name ?? 'Unknown Restaurant' }}</h5>
                                                                <span class="text-muted">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                                                                <br>
                                                                <small class="text-muted">{{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y, g:i a') }}</small>
                                                                <div class="mt-2">
                                                                    <span class="fs-6 me-1 align-top">
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="{{ $i <= $review->rating ? 'currentColor' : 'lightgray' }}" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                                            </svg>
                                                                        @endfor
                                                                    </span>
                                                                </div>
                                                                <p class="mt-2 card-text">{{ $review->comment }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                    {{ $reviews->links('pagination::bootstrap-4') }} <!-- Utilisez cette ligne pour la pagination Bootstrap 4 -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer-agent')
@endsection
