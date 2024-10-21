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
                <div class="col-lg-9 col-md-8 col-12">
                    <h1 class="mb-4">Mes Blogs</h1>

                    <!-- Button to add a new blog -->
                    <a href="{{ route('Frontoffice.Blogs.create') }}" class="btn btn-primary mb-4">Ajouter un nouveau blog</a>

                    <!-- Check if there are blogs -->
                    @if($blogs->isEmpty())
                        <div class="alert alert-warning">Vous n'avez encore ajouté aucun blog.</div>
                    @else
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 border-0 shadow">
                                    <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }} image" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $blog->title }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $blog->content }}</h6> <!-- Content of the blog -->
                                        <p class="card-text">Créé le {{ $blog->created_at->format('d/m/Y') }}</p>
                                                                  
                                                                          
                    
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('blogs.detail', $blog->id) }}" class="btn btn-info btn-sm" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('Frontoffice.Blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $blog->id }}" title="Supprimer">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirmation de la suppression</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer ce blog ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <form action="{{ route('Frontoffice.Blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>




@include('layouts.footer-agent')
@endsection