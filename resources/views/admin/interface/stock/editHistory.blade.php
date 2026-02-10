@extends('admin.layout.navbar')
@section('title', 'Modifier une entrée stock | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-12 col-12">

                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Éditer l'entrée du stock</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.stock.index') }}">Stocks</a></li>
                                <li class="breadcrumb-item active">Édition historique</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a class="btn btn-dark" href="{{ route('admin.stock.show', $history->stock->public_id) }}">
                            Retour
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.stock.history.update', $history->public_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Détails de l'entrée</h5>
                            <p class="mb-0 text-secondary">Modifiez les informations de l'entrée du produit</p>
                        </div>

                        <div class="card-body px-6 py-5">
                            <div class="row g-4">

                                <!-- Date -->
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') is-invalid @enderror"
                                        value="{{ old('date', $history->date) }}" required>
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Quantité entrée -->
                                <div class="col-md-6">
                                    <label class="form-label">Quantité entrée</label>
                                    <input type="number" name="quantite_entree"
                                        class="form-control @error('quantite_entree') is-invalid @enderror"
                                        value="{{ old('quantite_entree', $history->quantite_entree) }}" min="1"
                                        required>
                                    @error('quantite_entree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Emplacement -->
                                <div class="col-md-6">
                                    <label class="form-label">Emplacement</label>
                                    <select name="emplacement"
                                        class="form-select @error('emplacement') is-invalid @enderror" required>
                                        <option value="boutique"
                                            {{ old('emplacement', $history->emplacement) == 'boutique' ? 'selected' : '' }}>
                                            Boutique</option>
                                        <option value="magasin"
                                            {{ old('emplacement', $history->emplacement) == 'magasin' ? 'selected' : '' }}>
                                            Magasin</option>
                                    </select>
                                    @error('emplacement')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fournisseur -->
                                <div class="col-md-6">
                                    <label class="form-label">Fournisseur</label>
                                    <select name="fournisseur_id"
                                        class="form-select @error('fournisseur_id') is-invalid @enderror" required>
                                        @foreach ($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->public_id }}"
                                                {{ old('fournisseur_id', $history->fournisseur->public_id) == $fournisseur->public_id ? 'selected' : '' }}>
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

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Mettre à jour l'entrée</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
