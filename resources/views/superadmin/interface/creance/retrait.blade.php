@extends('superadmin.layout.navbar')
@section('title', 'Retrait de produits | kaoural')
@section('suite')



 @if ($errors->has('stockerror'))
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ $errors->first('stockerror') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

    <div class="custom-container">
        {{-- CORRECTION DE LA ROUTE ICI : superadmin.creance.ajoutstore --}}
        <form action="{{ route('superadmin.creance.ajoutstore', $creance->public_id) }}" method="POST">
            @csrf

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Créancier</label>
                    <input type="text" class="form-control bg-light" value="{{ $creance->nom }}" readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Date du retrait</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                        value="{{ old('date', now()->format('Y-m-d')) }}" required>
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Statut</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="impayée" {{ old('status') == 'impayée' ? 'selected' : '' }}>Impayée</option>
                        <option value="payée" {{ old('status') == 'payée' ? 'selected' : '' }}>Payée</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <div id="produitsContainer">
                        @php
                            $produitsOld = old('produits', [[]]);
                        @endphp

                        @foreach ($produitsOld as $i => $oldProduit)
                            <div class="card mb-3 produit-card p-3 border shadow-none bg-light-subtle">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Produit</label>
                                    <select name="produits[{{ $i }}][stock_public_id]"
                                        class="form-select produit-select" required style="width:100%">
                                        @if (isset($oldProduit['stock_public_id']))
                                            <option value="{{ $oldProduit['stock_public_id'] }}" selected>
                                                {{ $oldProduit['designation'] ?? 'Produit sélectionné' }}
                                            </option>
                                        @endif
                                    </select>
                                    @error("produits.$i.stock_public_id")
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Quantité</label>
                                        <input type="number" step="any"
                                            name="produits[{{ $i }}][quantite_sortie]"
                                            class="form-control qty @error('produits.' . $i . '.quantite_sortie') is-invalid @enderror"
                                            value="{{ $oldProduit['quantite_sortie'] ?? '' }}" placeholder="Ex : 2.5"
                                            required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Prix unitaire (FCFA)</label>
                                        <input type="number" name="produits[{{ $i }}][prix_unitaire]"
                                            class="form-control price" value="{{ $oldProduit['prix_unitaire'] ?? '' }}"
                                            placeholder="Prix de vente">
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="button" class="btn btn-link text-danger btn-remove-produit p-0">
                                        <i class="bi bi-trash fs-5"></i>
                                    </button>
                                </div>

                                {{-- Champs cachés pour le code et la désignation --}}
                                <input type="hidden" name="produits[{{ $i }}][code_article]" class="code-input"
                                    value="{{ $oldProduit['code_article'] ?? '' }}">
                                <input type="hidden" name="produits[{{ $i }}][designation]"
                                    class="designation-input" value="{{ $oldProduit['designation'] ?? '' }}">
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-dark" id="addProduit">
                        <i class="bi bi-plus-circle me-1"></i> Ajouter un autre produit
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('superadmin.creance.show', $creance->public_id) }}"
                    class="btn btn-outline-secondary">Annuler</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i> Valider le retrait
                </button>
            </div>
        </form>
    </div>

    <style>
        .btn-soft-primary {
            background-color: #e0e7ff;
            color: #4338ca;
        }

        .produit-card:first-child .btn-remove-produit {
            display: none;
        }

        /* Empêche de supprimer la seule ligne */
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function initSelect2(select) {
                $(select).select2({
                    placeholder: 'Tapez le code ou la désignation',
                    minimumInputLength: 1,
                    ajax: {
                        // CORRECTION DE LA ROUTE ICI AUSSI
                        url: '{{ route('superadmin.creance.searchStock') }}',
                        dataType: 'json',
                        delay: 300,
                        data: function(params) {
                            return {
                                q: params.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data
                            };
                        }
                    }
                }).on('select2:select', function(e) {
                    const data = e.params.data;
                    const card = e.target.closest('.produit-card');
                    if (card) {
                        card.querySelector('.code-input').value = data.code_article;
                        card.querySelector('.designation-input').value = data.designation;
                        if (data.prix_vente) {
                            card.querySelector('.price').value = data.prix_vente;
                        }
                    }
                });
            }

            const container = document.getElementById('produitsContainer');
            const addBtn = document.getElementById('addProduit');

            // Init selects existants
            container.querySelectorAll('.produit-select').forEach(initSelect2);

            addBtn.addEventListener('click', function() {
                const index = container.querySelectorAll('.produit-card').length;
                const firstCard = container.querySelector('.produit-card');
                const newCard = firstCard.cloneNode(true);

                // Nettoyer les valeurs et mettre à jour les index
                newCard.querySelectorAll('input').forEach(el => {
                    el.value = '';
                    el.name = el.name.replace(/\[\d+\]/, `[${index}]`);
                });

                // Re-créer le select car Select2 détruit le clone
                const selectWrapper = newCard.querySelector('.mb-3');
                selectWrapper.innerHTML =
                    `<label class="form-label fw-semibold">Produit</label>
                                   <select name="produits[${index}][stock_public_id]" class="form-select produit-select" required style="width:100%"></select>`;

                container.appendChild(newCard);
                initSelect2(newCard.querySelector('.produit-select'));
            });

            container.addEventListener('click', function(e) {
                if (e.target.closest('.btn-remove-produit')) {
                    const cards = container.querySelectorAll('.produit-card');
                    if (cards.length > 1) {
                        e.target.closest('.produit-card').remove();
                    }
                }
            });
        });
    </script>

@endsection
