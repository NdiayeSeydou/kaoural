@extends('admin.layout.navbar')
@section('title', 'Modifier Retrait | kaoural')
@section('suite')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-12 mx-auto">
                {{-- Fil d'Ariane --}}
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.creance.index') }}">Créances</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.creance.show', $retrait->creance->public_id) }}">
                                Détails de {{ $retrait->creance->nom }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-primary">Modifier l'article</li>
                    </ol>
                </nav>

                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-shape bg-soft-primary text-primary rounded-circle me-3">
                                <i class="fe fe-edit-2"></i>
                            </div>
                            <h4 class="mb-0 fw-bold">Modifier l'article retiré</h4>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        {{-- Résumé de l'article actuel --}}
                        <div class="d-flex align-items-center p-3 bg-light rounded-3 mb-4">
                            @if ($retrait->image)
                                <img src="{{ asset('storage/' . $retrait->image) }}" class="rounded shadow-sm me-3"
                                    width="60" height="60" style="object-fit: cover;">
                            @else
                                <div class="bg-white rounded me-3 d-flex align-items-center justify-content-center border"
                                    style="width:60px; height:60px;">
                                    <i class="fe fe-package text-muted fs-3"></i>
                                </div>
                            @endif
                            <div>
                                <h5 class="mb-1 fw-bold">{{ $retrait->designation }}</h5>
                                <p class="text-muted mb-0 small text-uppercase fw-bold">Code: {{ $retrait->code_article }}
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('admin.creance.updateRetrait', $retrait->public_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="designation" value="{{ $retrait->designation }}">
                            <div class="row g-3">
                                {{-- Quantité --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Quantité retirée</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fe fe-box"></i></span>
                                        <input type="number" step="0.01" name="quantite_sortie" id="quantite_sortie"
                                            class="form-control @error('quantite_sortie') is-invalid @enderror"
                                            value="{{ old('quantite_sortie', $retrait->quantite_sortie) }}" required>
                                    </div>
                                    <small class="text-muted mt-1 d-block">Initialement :
                                        {{ $retrait->quantite_sortie }}</small>
                                    @error('quantite_sortie')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Prix Unitaire --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Prix Unitaire (FCFA)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white">F</span>
                                        <input type="number" name="prix_unitaire" id="prix_unitaire"
                                            class="form-control @error('prix_unitaire') is-invalid @enderror"
                                            value="{{ old('prix_unitaire', (int) $retrait->prix_unitaire) }}" required>
                                    </div>
                                    @error('prix_unitaire')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Statut du retrait --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Statut du paiement</label>
                                    <select name="status" class="form-select">
                                        <option value="impayée" {{ $retrait->status == 'impayée' ? 'selected' : '' }}>
                                            Impayée (Dette)</option>
                                        <option value="payée" {{ $retrait->status == 'payée' ? 'selected' : '' }}>Payée
                                        </option>
                                        
                                    </select>
                                </div>

                                {{-- Date du retrait --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Date du retrait</label>
                                    <input type="date" name="date" class="form-control"
                                        value="{{ old('date', $retrait->date->format('Y-m-d')) }}" required>
                                </div>

                                <hr class="my-3">

                                {{-- Affichage dynamique du total --}}
                                <div class="col-12">
                                    <div class="p-3 rounded-3 text-end" style="background-color: #f8faff;">
                                        <span class="text-muted text-uppercase small fw-bold">Nouveau Total</span>
                                        <h2 class="mb-0 fw-bold text-primary" id="affichage_total">
                                            {{ number_format($retrait->prix_total, 0, ',', ' ') }} FCFA
                                        </h2>
                                    </div>
                                </div>

                                <div class="col-12 d-flex gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                        <i class="fe fe-save me-2"></i> Enregistrer les modifications
                                    </button>
                                    <a href="{{ route('superadmin.creance.show', $retrait->creance->public_id) }}"
                                        class="btn btn-outline-secondary px-4">
                                        Annuler
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-soft-primary {
            background-color: #e0e7ff;
            color: #4338ca;
        }

        .icon-shape {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <script>
        // Calcul dynamique du total lors de la saisie
        const inputQty = document.getElementById('quantite_sortie');
        const inputPrix = document.getElementById('prix_unitaire');
        const affichageTotal = document.getElementById('affichage_total');

        function calculerTotal() {
            const qty = parseFloat(inputQty.value) || 0;
            const prix = parseFloat(inputPrix.value) || 0;
            const total = qty * prix;
            affichageTotal.innerText = new Intl.NumberFormat('fr-FR').format(total) + ' FCFA';
        }

        inputQty.addEventListener('input', calculerTotal);
        inputPrix.addEventListener('input', calculerTotal);
    </script>

@endsection
