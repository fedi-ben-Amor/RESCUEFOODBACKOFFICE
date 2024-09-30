@extends('layouts.app')

@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container">
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
                                <span>You have full control to manage your own account setting.</span>
                            </div>
                            <div>
                                <a href="#" class="btn btn-outline-primary btn-sm">Export To CSV...</a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form class="row mb-4 gx-2" method="GET" action="{{ route('dashboard-agent.my-reviews') }}">
                                <div class="col-xl-7 col-lg-6 col-md-4 col-12 mb-2 mb-lg-0">
                                    <select name="restaurant" class="form-select" onchange="this.form.submit()">
                                        <option value="">ALL</option>
                                        <option value="How to easily create a website">How to easily create a website</option>
                                        <option value="Grunt: The JavaScript Task...">Grunt: The JavaScript Task...</option>
                                        <option value="Vue js: The JavaScript Task...">Vue js: The JavaScript Task...</option>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 col-12 mb-2 mb-lg-0">
                                    <select name="rating" class="form-select" onchange="this.form.submit()">
                                        <option value="">Rating</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-2 mb-lg-0">
                                    <select name="sort" class="form-select" onchange="this.form.submit()">
                                        <option value="">Sort by</option>
                                        <option value="Newest">Newest</option>
                                        <option value="Oldest">Oldest</option>
                                    </select>
                                </div>
                            </form>
                            
                            <ul class="list-group list-group-flush border-top">
                                @foreach($reviews as $review)
                                @foreach($resto as $restos)
                                @if($restos->id == $review->restaurent_id)
                                    <li class="list-group-item px-3 py-4 w-125">
                                        <div class="d-flex">
                                            <img src="../assets/images/avatar/avatar-9.jpg" alt="avatar" class="rounded-circle avatar-lg">
                                            <div class="ms-3 mt-2">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <h4 class="mb-0">{{ $review->restaurent->name ?? 'Unknown Restaurant' }}</h4>
                                                        <span>{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                                                        <br>
                                                        <small class="text-muted">{{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y, g:i a') }}</small>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="fs-6 me-1 align-top">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="{{ $i <= $review->rating ? 'currentColor' : 'lightgray' }}" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                            </svg>
                                                        @endfor
                                                    </span>
                                                    <p class="mt-2">{{ $review->comment }}</p>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm">Respond</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer-agent')
@endsection