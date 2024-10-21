@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container-fluid">
            <!-- Navbar Agent -->
            @include('layouts.navbar-agent')

            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    @include('layouts.sidebar-agent')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <h1 class="mb-4">Modifier le Blog</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('Frontoffice.Blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <h2 class="h5 mb-3">Modifier l'image de ton blog</h2>
                            <div class="file-drop-area border border-dashed rounded p-4">
                                <div class="file-drop-icon ci-cloud-upload mb-2"></div>
                                <span class="file-drop-message">Glisse et dépose ici pour télécharger une image</span>
                                <input class="file-drop-input" type="file" accept="image/*" id="image" name="image">
                                <button class="file-drop-btn btn btn-outline-accent mt-2" type="button">Ou sélectionne une image</button>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <!-- Preview de l'image -->
                            @if ($blog->image)
                                <div class="mt-3">
                                    <img id="image-preview" src="{{ asset('storage/' . $blog->image) }}" alt="Prévisualisation de l'image" class="img-fluid">
                                </div>
                            @else
                                <div class="mt-3">
                                    <img id="image-preview" src="" alt="Prévisualisation de l'image" class="img-fluid" style="display: none;">
                                </div>
                            @endif
                        </div>

                        <script>
                            const fileInput = document.querySelector('.file-drop-input');
                            const imagePreview = document.getElementById('image-preview');

                            fileInput.addEventListener('change', function() {
                                const file = fileInput.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        imagePreview.src = e.target.result;
                                        imagePreview.style.display = 'block';
                                    }
                                    reader.readAsDataURL(file);
                                }
                            });
                        </script>

                        <div class="form-group mb-4">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}"  placeholder="Entrez le titre de votre blog">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="content" class="form-label">Contenu</label>
                            <textarea class="form-control" id="content" name="content" rows="5"  placeholder="Écrivez le contenu de votre blog ici...">{{ $blog->content }}</textarea>
                            @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <a href="{{ route('dashboard-agent.blogs') }}" class="btn btn-secondary">Retour à la liste</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer-agent')
@endsection