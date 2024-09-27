{{-- @foreach($reviews as $review)
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
@endforeach --}}
