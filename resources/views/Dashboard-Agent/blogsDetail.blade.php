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
                                  
                                        <div class="d-flex justify-content-end">
                                      
                                            <form action="{{ route('blogs.comments.destroy', [$blog->id, $comment->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger fs-sm p-0">
                                                    <i class="ci-trash me-2"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                       
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
    
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer-agent')
@endsection