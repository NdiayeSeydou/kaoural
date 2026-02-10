@extends('admin.layout.navbar')
@section('title', 'Ajouter un article | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">

                <div class="mb-6 d-flex justify-content-between align-items-center">
                    <h1 class="h2">Ajouter un article de blog</h1>
                    <a class="btn btn-dark" href="{{ route('admin.blog.index') }}">
                        Retour à la liste
                    </a>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Accueil</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.blog.index') }}">Blog</a>
                        </li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </nav>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-lg-5">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label fw-bold">Titre de l'article</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" placeholder="Ex: Les bienfaits de nos produits..." required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Image de couverture</label>
                                    <input type="file" name="image" 
                                        class="form-control @error('image') is-invalid @enderror" required>
                                   
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Description / Contenu</label>
                                    <textarea name="description" rows="10" 
                                        class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Écrivez le contenu de votre article ici..." required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-success px-4">
                                        <i class="fe fe-check-circle me-2"></i>Publier l'article
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection