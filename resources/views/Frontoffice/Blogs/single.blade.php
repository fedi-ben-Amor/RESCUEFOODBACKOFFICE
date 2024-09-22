@extends('FrontOfficeLayout.app')
@include('Frontoffice.shared.nav')

<main class="page-wrapper">
    <div class="container pb-5">
        <div class="row justify-content-center pt-5 mt-md-2">
            <div class="col-lg-9">
                <!-- Post meta -->
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4 mt-n1">
                    <div class="d-flex align-items-center fs-sm mb-2">
                        <a class="blog-entry-meta-link" href="#">
                            <div class="blog-entry-author-ava">
                                <img src="/img/blog/meta/05.jpg" alt="">
                            </div>Hedi Belguith
                        </a>
                        <span class="blog-entry-meta-divider"></span>
                        <a class="blog-entry-meta-link" href="#">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d') }}</a>
                    </div>
                    <div class="fs-sm mb-2">
                        <a class="blog-entry-meta-link text-nowrap" href="#comments" data-scroll>
                            <i class="ci-message"></i>{{ $blog->comments->count() }}
                        </a>
                    </div>
                </div>
                <!-- Post content -->
                <h1 class="h3 mb-4">{{ $blog->title }}</h1>
                <img src="/img/blog/single/02.jpg" alt="{{ $blog->title }}" class="img-fluid mb-4">
                <p>{{ $blog->content }}</p>
               
                <!-- Comments -->
                <div class="pt-2 mt-5" id="comments">
    <h2 class="h4">Comments <span class="badge bg-secondary fs-sm text-body align-middle ms-2">{{ $blog->comments->count() }}</span></h2>
    
    @foreach ($blog->comments as $comment)
    <div class="d-flex align-items-start py-4 border-bottom">
        <img class="rounded-circle" src="\img\blog\meta\05.jpg" width="50" alt="User Image">
        <div class="ps-3 w-100">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fs-md mb-0">Hedi Belguith</h6>
                <div>
                    <a href="#" class="nav-link-style fs-sm fw-medium" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comment->id }}">
                        <i class="ci-edit me-2"></i>Edit
                    </a>
                    <form action="{{ route('blogs.comments.destroy', [$blog->id, $comment->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger fs-sm">
                            <i class="ci-trash me-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>
            <p class="fs-md mb-1">{{ $comment->content }}</p>
            <span class="fs-ms text-muted">
                <i class="ci-time align-middle me-2"></i>{{ $comment->created_at->format('M d, Y') }}
            </span>
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
    <div class="card border-0 shadow mt-2 mb-4">
        <div class="card-body">
        <form action="{{ route('blogs.comments.store', $blog->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
    <div class="mb-3">
        <textarea class="form-control" rows="4" name="content" placeholder="Write comment..." required></textarea>
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
