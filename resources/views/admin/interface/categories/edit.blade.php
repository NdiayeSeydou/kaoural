@extends('admin.layout.navbar')
@section('title', 'Modifier une catégorie | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-12 col-12">

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Modifier une catégorie</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categorie.index') }}">Catégories</a></li>
                            <li class="breadcrumb-item active">Édition</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a class="btn btn-dark" href="{{ route('admin.categorie.index') }}">
                        Retour à la liste
                    </a>
                </div>
            </div>

            <!-- FORMULAIRE DE MODIFICATION -->
            <form action="{{ route('admin.categorie.update', $categorie->public_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Détails de la catégorie</h5>
                        <p class="mb-0 text-secondary">Modifiez le nom de la catégorie</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <!-- Nom de la catégorie -->
                            <div class="col-md-12">
                                <label class="form-label">Nom de la catégorie</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $categorie->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.categorie.index') }}" class="btn btn-outline-secondary">
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Mettre à jour
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
