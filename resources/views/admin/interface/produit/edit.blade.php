@extends('admin.layout.navbar')
@section('title', 'Modifier un produit | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 col-12">

                <!-- HEADER -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Éditer un produit</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Accueil</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.produit.index') }}">Produits</a>
                                </li>
                                <li class="breadcrumb-item active">Édition</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a class="btn btn-dark" href="{{ route('admin.produit.index') }}">
                            Retour à la liste
                        </a>
                    </div>
                </div>

                <!-- ================= FORMULAIRE PRODUIT ================= -->

                <form action="{{ route('admin.produit.update', $produit->public_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Détails du produit</h5>
                            <p class="mb-0 text-secondary">Modifier les informations du produit</p>
                        </div>

                        <div class="card-body px-6 py-5">
                            <div class="row g-4">

                                <!-- Désignation -->
                                <div class="col-md-6">
                                    <label class="form-label">Désignation</label>
                                    <input type="text" name="designation"
                                        class="form-control @error('designation') is-invalid @enderror"
                                        value="{{ old('designation', $produit->designation) }}" required>
                                    @error('designation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Code produit -->
                                <div class="col-md-6">
                                    <label class="form-label">Code produit</label>
                                    <input type="text" class="form-control" value="{{ $produit->public_id }}" readonly>
                                </div>

                                <!-- Catégorie -->
                                <div class="col-md-6">
                                    <label class="form-label">Catégorie</label>
                                    <select name="categorie_id"
                                        class="form-select @error('categorie_id') is-invalid @enderror" required>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}"
                                                {{ old('categorie_id', $produit->categorie_id) == $categorie->id ? 'selected' : '' }}>
                                                {{ $categorie->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Prix unitaire -->
                                <div class="col-md-6">
                                    <label class="form-label">Prix unitaire (FCFA)</label>
                                    <input type="number" name="prix_unitaire"
                                        class="form-control @error('prix_unitaire') is-invalid @enderror"
                                        value="{{ old('prix_unitaire', $produit->prix_unitaire) }}" min="0"
                                        required>
                                    @error('prix_unitaire')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $produit->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Image du produit</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    @if ($produit->image)
                                        <div class="mt-3">
                                            <img src="{{ asset('storage/' . $produit->image) }}" class="rounded shadow-sm"
                                                style="max-height: 120px;">
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Mettre à jour le produit
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
