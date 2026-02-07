@extends('superadmin.layout.navbar')
@section('title', 'Modifier une vente | kaoural')

@section('suite')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        /* Harmonisation Select2 avec le design */
        .select2-container .select2-selection--single {
            height: 45px !important;
            border: 1px solid #dee2e6 !important;
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px !important;
        }

        .is-invalid+.select2-container .select2-selection--single {
            border-color: #dc3545 !important;
        }
    </style>

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-md-12 col-12">

                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Modifier la vente</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.vente.index') }}">Ventes</a></li>
                                <li class="breadcrumb-item active">Édition</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a class="btn btn-dark" href="{{ route('superadmin.vente.index') }}"> Retour à la liste</a>
                    </div>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('superadmin.vente.update', $vente->public_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Détails du produit et date</h5>
                        </div>
                        <div class="card-body px-6 py-5">
                            <div class="row g-4">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">Rechercher un produit (Code ou Nom)</label>
                                    <select name="stock_id" id="stock_select"
                                        class="form-select select2 @error('stock_id') is-invalid @enderror">
                                        <option value="">-- Rechercher un produit --</option>
                                        @foreach ($stocks as $stock)
                                            <option value="{{ $stock->id }}" data-prix="{{ $stock->prix_unitaire }}"
                                                data-dispo="{{ $stock->quantite_restante }}"
                                                {{ old('stock_id', $vente->stock_id) == $stock->id ? 'selected' : '' }}>
                                                {{ $stock->code_article }} | {{ $stock->designation }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('stock_id')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Date de vente</label>
                                    <input type="date" name="date_vente"
                                        class="form-control @error('date_vente') is-invalid @enderror"
                                        value="{{ old('date_vente', $vente->date_vente) }}">
                                    @error('date_vente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Tarification et Stock</h5>
                        </div>
                        <div class="card-body px-6 py-5">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Quantité</label>
                                    <input type="number" name="quantite" id="quantite"
                                        class="form-control @error('quantite') is-invalid @enderror" step="0.01"
                                        value="{{ old('quantite', $vente->quantite) }}">
                                    <div id="stock_info" class="mt-1 small fw-bold text-primary"></div>
                                    @error('quantite')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Prix unitaire (FCFA)</label>
                                    <input type="number" name="prix_unitaire" id="prix_unitaire"
                                        class="form-control @error('prix_unitaire') is-invalid @enderror"
                                        value="{{ old('prix_unitaire', $vente->prix_unitaire) }}">
                                    @error('prix_unitaire')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-success">Total (FCFA)</label>
                                    <input type="text" id="prix_total_display"
                                        class="form-control bg-light border-success text-success fw-bold" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-5">

                        <button type="submit" class="btn btn-primary px-6">Enregistrer les modifications</button>
                    </div>
                </form>

                <form id="delete-form" action="{{ route('superadmin.vente.destroy', $vente->public_id) }}" method="POST"
                    style="display:none;">
                    @csrf @method('DELETE')
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Initialisation Select2
            $('.select2').select2({
                placeholder: "Saisissez un code ou un nom d'article",
                allowClear: true,
                width: '100%'
            });

            const quantiteInput = $('#quantite');
            const prixInput = $('#prix_unitaire');
            const totalDisplay = $('#prix_total_display');

            function calculerTotal() {
                const q = parseFloat(quantiteInput.val()) || 0;
                const p = parseFloat(prixInput.val()) || 0;
                const total = q * p;
                totalDisplay.val(new Intl.NumberFormat('fr-FR').format(total) + ' FCFA');
            }

            // Changement de produit
            $('#stock_select').on('change', function() {
                const selected = $(this).find(':selected');
                const prixDefaut = selected.data('prix');
                const dispo = selected.data('dispo');

                if (selected.val() !== "") {
                    // Optionnel: Mettre à jour le prix unitaire automatiquement si c'est une erreur de produit
                    // prixInput.val(prixDefaut); 
                    $('#stock_info').html('<i class="bi bi-box-seam"></i> Disponible en stock : ' + dispo);
                } else {
                    $('#stock_info').text('');
                }
                calculerTotal();
            });

            // Écouter les saisies
            quantiteInput.on('input', calculerTotal);
            prixInput.on('input', calculerTotal);

            // Calculer au chargement (init)
            $('#stock_select').trigger('change');
        });

        function confirmDelete() {
            Swal.fire({
                title: 'Confirmer la suppression ?',
                text: "Cette action est irréversible et le stock sera mis à jour.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
@endsection
