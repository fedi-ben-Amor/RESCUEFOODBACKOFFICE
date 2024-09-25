@extends('FrontOfficeLayout.app')
@include('Frontoffice.shared.nav')

<main class="page-wrapper">
    <div class="bg-secondary py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ url('/') }}"><i class="ci-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Liste des Blogs</li>
                    </ol>
                </nav>
            </div>
           
        </div>
    </div>

    <div class="container pb-5 mb-2 mb-md-4">
        <!-- Carousel pour les blogs vedettes -->
      
        <div class="featured-posts-carousel tns-carousel pt-5">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 1, &quot;nav&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 3000}">
                @foreach($topBlogs as $blog)
                    <article>
                        <div class="d-flex align-items-center fs-sm">
                            <a class="blog-entry-meta-link" href="#">
                                <div class="blog-entry-author-ava">
                                    <img src="{{ asset('storage/' . Auth::user()->picture) }}" alt="Image"> <!-- Remplacez par une image statique -->
                                </div>
                                {{ $blog->user->name }} <!-- Nom de l'auteur statique -->
                            </a>
                            <span class="blog-entry-meta-divider"></span>
                            <div class="fs-sm text-muted">
                                in <a href="#" class="blog-entry-meta-link">Lifestyle</a> <!-- Catégorie statique -->
                            </div>
                        </div>
                        <a class="blog-entry-thumb mb-3" href="{{ route('Frontoffice.blogs.show', $blog->id) }}">
                            <span class="blog-entry-meta-label fs-sm"><i class="ci-time"></i>{{ $blog->created_at->format('M d') }}</span>
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Featured post">
                        </a>
                        <div class="d-flex justify-content-between mb-2 pt-1">
                            <h2 class="h5 blog-entry-title mb-0">
                                <a href="{{ route('Frontoffice.blogs.show', $blog->id) }}">{{ $blog->title }}</a>
                            </h2>
                            <a class="blog-entry-meta-link fs-sm text-nowrap ms-3 pt-1" href="{{ route('Frontoffice.blogs.show', $blog->id) }}#comments">
                                <i class="ci-message"></i>{{ $blog->comments->count() }}
                            </a>
                        </div>
                        <div class="blog-entry-content mt-2">
                            <p>{{ $blog->content }}</p> <!-- Affiche le contenu du blog -->
                            
                        </div>
                   
                    </article>
                @endforeach
            </div>
        </div>
        <hr class="mt-5">

        <!-- Grille pour les autres blogs -->
      
        <div class="row pt-5">
            @foreach($otherBlogs as $blog)
                <div class="col-md-4 mb-4">
                <article>
                    <a class="blog-entry-thumb mb-3" href="{{ route('Frontoffice.blogs.show', $blog->id) }}">
                        <span class="blog-entry-meta-label fs-sm"><i class="ci-time"></i>{{ $blog->created_at->format('M d') }}</span>
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Featured post">
                    </a>
                    <div class="d-flex justify-content-between mb-2 pt-1">
                        <h2 class="h5 blog-entry-title mb-0">
                            <a href="{{ route('Frontoffice.blogs.show', $blog->id) }}">{{ $blog->title }}</a>
                          
                        </h2>
                     
                            <p>{{ $blog->content }}</p> <!-- Affiche le contenu du blog -->
                  
                        <a class="blog-entry-meta-link fs-sm text-nowrap ms-3 pt-1" href="{{ route('Frontoffice.blogs.show', $blog->id) }}#comments">
                            <i class="ci-message"></i>{{ $blog->comments->count() }}
                        </a>
                      
                    </div>
                    <div class="d-flex align-items-center fs-sm">
                        <a class="blog-entry-meta-link" href="#">
                            <div class="blog-entry-author-ava">
                                <img src="{{ asset('storage/' . Auth::user()->picture) }}" alt="Image"> <!-- Remplacez par une image statique -->
                            </div>
                            {{ $blog->user->name }} <!-- Nom de l'auteur statique -->
                        </a>
                        <span class="blog-entry-meta-divider"></span>
                        <div class="fs-sm text-muted">
                            in <a href="#" class="blog-entry-meta-link">Lifestyle</a> <!-- Catégorie statique -->
                        </div>
                    </div>
                </article>
                </div>
            @endforeach
        </div>

        <!-- Pagination pour les autres blogs -->
        <div class="mt-4">
            {{ $otherBlogs->links() }} <!-- Pagination pour les autres blogs -->
        </div>
    </div>
</main>