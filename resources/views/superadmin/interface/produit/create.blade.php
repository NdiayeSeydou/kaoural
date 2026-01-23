@extends('superadmin.layout.navbar')
@section('title', 'Ajouter un produit | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">

                <!-- HEADER -->
                <div class="mb-6 d-flex justify-content-between align-items-center">
                    <h1 class="h2">Ajouter un produit</h1>
                    <a class="btn btn-dark" href="{{ route('superadmin.produit.index') }}">
                        Retour à la liste
                    </a>
                </div>

                <!-- BREADCRUMB -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('superadmin.dashboard') }}">Accueil</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('superadmin.produit.index') }}">Produits</a>
                        </li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </nav>

                <!-- FORMULAIRE PRODUIT -->
                <form action="{{ route('superadmin.produit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf




                    <div class="row g-4">

                        <!-- Désignation -->
                        <div class="col-md-6">
                            <label class="form-label">Désignation</label>
                            <input type="text" name="designation"
                                class="form-control @error('designation') is-invalid @enderror"
                                value="{{ old('designation') }}" required>

                            @error('designation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Catégorie -->
                        <div class="col-md-6">
                            <label class="form-label">Catégorie</label>
                            <select name="categorie_id" class="form-select @error('categorie_id') is-invalid @enderror"
                                required>
                                <option value="">-- Choisir une catégorie --</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"
                                        {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
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
                            <label class="form-label">Prix unitaire</label>
                            <input type="number" name="prix_unitaire"
                                class="form-control @error('prix_unitaire') is-invalid @enderror"
                                value="{{ old('prix_unitaire') }}" min="0" step="0.01" required>

                            @error('prix_unitaire')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Image du produit</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                        </div>


                        <!-- Description -->
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Description du produit...">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->

                        <!-- SUBMIT -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success">
                                Enregistrer le produit
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
