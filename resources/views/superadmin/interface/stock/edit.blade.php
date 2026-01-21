@extends('superadmin.layout.navbar')
@section('title', 'Modifier un stock | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 col-12">

                <!-- HEADER -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Éditer un stock</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>

                                <li class="breadcrumb-item"><a href="{{ route('superadmin.stock.index') }}">Stocks</a></li>
                                <li class="breadcrumb-item active">Édition</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a class="btn btn-dark" href="{{ route('superadmin.stock.index') }}">
                            Retour à la liste
                        </a>
                    </div>
                </div>



                <!-- ================= INFORMATIONS PRODUIT ================= -->

                <form action="{{ route('superadmin.stock.modifier', $stock->public_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Détails du stock</h5>
                            <p class="mb-0 text-secondary">Informations générales sur le produit</p>
                        </div>

                        <div class="card-body px-6 py-5">
                            <div class="row g-4">

                                <!-- Nom produit -->
                                <div class="col-md-6">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation"
                                        class="form-control @error('designation') is-invalid @enderror"
                                        value="{{ old('designation', $stock->designation) }}" required>
                                    @error('designation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Code produit -->
                                <div class="col-md-6">
                                    <label class="form-label">Code produit</label>
                                    <input type="text" class="form-control" value="{{ $stock->code_article }}" readonly>
                                </div>

                                <!-- Catégorie -->
                                <div class="col-md-6">
                                    <label class="form-label">Catégorie</label>
                                    <select name="categorie_id"
                                        class="form-select @error('categorie_id') is-invalid @enderror" required>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->public_id }}"
                                                {{ old('categorie_id', $stock->categorie->public_id) == $categorie->public_id ? 'selected' : '' }}>
                                                {{ $categorie->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Emplacement -->
                                <div class="col-md-6">
                                    <label class="form-label">Emplacement</label>
                                    <select name="emplacement"
                                        class="form-select @error('emplacement') is-invalid @enderror" required>
                                        <option value="boutique"
                                            {{ old('emplacement', $stock->emplacement) == 'boutique' ? 'selected' : '' }}>
                                            Boutique</option>
                                        <option value="magasin"
                                            {{ old('emplacement', $stock->emplacement) == 'magasin' ? 'selected' : '' }}>
                                            Magasin</option>
                                    </select>
                                    @error('emplacement')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Quantité en stock -->
                                <div class="col-md-6">
                                    <label class="form-label">Quantité en stock</label>
                                    <input type="number" name="quantite"
                                        class="form-control @error('quantite') is-invalid @enderror"
                                        value="{{ old('quantite', $stock->stock_initial) }}" min="0" required>
                                    @error('quantite')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Prix unitaire -->
                                <div class="col-md-6">
                                    <label class="form-label">Prix unitaire (FCFA)</label>
                                    <input type="number" name="prix_unitaire"
                                        class="form-control @error('prix_unitaire') is-invalid @enderror"
                                        value="{{ old('prix_unitaire', $stock->prix_unitaire) }}" min="0" required>
                                    @error('prix_unitaire')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Image produit -->
                                <div class="col-md-6">
                                    <label class="form-label">Image du produit</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if ($stock->image)
                                        <img src="{{ asset('storage/' . $stock->image) }}" width="80" class="mt-2">
                                    @endif
                                </div>



                                <div class="col-md-6">
                                    <label class="form-label">Fournisseur</label>
                                    <select name="fournisseur_id"
                                        class="form-select @error('fournisseur_id') is-invalid @enderror" required>
                                        @foreach ($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->public_id }}"
                                                {{ old('fournisseur_id', $stock->fournisseur->public_id) == $fournisseur->public_id ? 'selected' : '' }}>
                                                {{ $fournisseur->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('fournisseur_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                        </div>
                    </div>




                    <!-- ACTIONS -->
                    <div class="d-flex justify-content-between">
                        {{-- <button type="button" class="btn btn-outline-danger">
                                Supprimer le stock
                            </button> --}}

                        <button type="submit" class="btn btn-primary">
                            Mettre à jour le stock
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
