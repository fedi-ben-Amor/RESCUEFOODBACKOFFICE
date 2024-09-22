@extends('FrontOfficeLayout.app')
@include('Frontoffice.shared.nav')
<div class="container my-5">
    <h1 class="mb-4">Créer un nouveau blog</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Frontoffice.Blogs.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('Frontoffice.Blogs.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </form>
</div>


