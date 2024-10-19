@extends('FrontOfficeLayout.app')
@section('content')
@extends('Frontoffice.shared.sign')
@include('Frontoffice.shared.nav')

<main class="page-wrapper">
    <div class="container pb-5">
        <div class="row justify-content-center pt-5 mt-md-2">
            <div class="col-lg-9">
                <!-- Post meta -->
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4 mt-n1 border-bottom">
                    <div class="d-flex align-items-center fs-sm mb-2">
                        <a class="blog-entry-meta-link" href="#">
                            <div class="blog-entry-author-ava rounded-circle overflow-hidden" style="width: 50px; height: 50px;">
                                @if($blog->user->picture)
                                    <img src="{{ asset('storage/' . $blog->user->picture) }}" alt="{{ $blog->user->name }}'s Image" class="img-fluid">
                                @else
                                    <img src="{{ asset('placeholder-img.jpg') }}" alt="Default Image" class="img-fluid">
                                @endif
                            </div>
                            <span class="ms-2">{{ $blog->user->name }}</span>
                        </a>
                        <span class="blog-entry-meta-divider mx-2">|</span>
                        <a class="blog-entry-meta-link" href="#">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</a>
                    </div>
                    <div class="fs-sm mb-2">
                        <a class="blog-entry-meta-link text-nowrap" href="#comments" data-scroll>
                            <i class="ci-message"></i> {{ $blog->comments->count() }} Comments
                        </a>
                    </div>
                </div>
                
                <!-- Post content -->
                <h1 class="h3 mb-4 mt-3">{{ $blog->title }}</h1>
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mb-4 rounded shadow">
                <p>{{ $blog->content }}</p>
                    <!-- Space for translated content -->
                    <div class="translated-content mt-2" style="display: none;"></div>
                <button type="button" class="btn btn-secondary btn-sm translate-button" data-content="{{ $blog->content }}">Traduire</button>
                                        


                <!-- Comments -->
                <div class="pt-2 mt-5" id="comments">
                    <h2 class="h4">Comments <span class="badge bg-secondary fs-sm text-body align-middle ms-2">{{ $blog->comments->count() }}</span></h2>
                    
                    @foreach ($blog->comments as $comment)
                        <div class="d-flex align-items-start py-4 border-bottom">
                            <div class="rounded-circle overflow-hidden" style="width: 50px; height: 50px;">
                                @if($comment->user->picture)
                                    <img src="{{ asset('storage/' . $comment->user->picture) }}" alt="{{ $comment->user->name }}'s Image" class="img-fluid">
                                @else
                                    <img src="{{ asset('placeholder-img.jpg') }}" alt="Default Image" class="img-fluid">
                                @endif
                            </div>
                            <div class="ps-3 w-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">{{ $comment->user->name }}</h6>
                                    <div class="text-muted small">{{ $comment->created_at->format('M d, Y') }}</div>
                                </div>
                                <p class="fs-md mb-1">{{ $comment->content }}</p>
                                
                                <!-- Comment actions (edit, delete) -->
                                @if (Auth::check() && Auth::id() === $comment->user_id)
                                    <div class="d-flex justify-content-end">
                                        <a href="#" class="nav-link-style fs-sm me-3" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comment->id }}">
                                            <i class="ci-edit me-2"></i>Edit
                                        </a>
                                        <form action="{{ route('blogs.comments.destroy', [$blog->id, $comment->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger fs-sm p-0">
                                                <i class="ci-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Modal for editing comment -->
                        <div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('blogs.comments.update', [$blog->id, $comment->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control" name="content" rows="4" required>{{ $comment->content }}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Post comment form -->
                    <div class="card border-0 shadow mt-4">
                        <div class="card-body">
                            <form action="{{ route('blogs.comments.store', $blog->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" rows="4" name="content" placeholder="Write your comment..." required></textarea>
                                    <div class="invalid-feedback">Please write your comment.</div>
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">Post comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.translate-button').click(function () {
            var content = $(this).data('content');
            var targetLanguage = 'en'; // ou toute autre langue cible que vous voulez

            $.ajax({
                url: '/translate',
                method: 'POST',
                data: {
                    content: content,
                    target: targetLanguage,
                    _token: '{{ csrf_token() }}' // Si vous utilisez le middleware CSRF
                },
                success: function (response) {
                    // Afficher le contenu traduit
                    $('.translated-content').show().text(response.translatedText);
                },
                error: function (xhr) {
                    // Gérer l'erreur
                    alert('Erreur: ' + xhr.responseJSON.error);
                }
            });
        });
    });
</script>
@endsection