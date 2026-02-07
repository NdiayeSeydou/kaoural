@extends('superadmin.layout.navbar')
@section('title', 'Ajouter des ventes | kaoural')
@section('suite')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-12">

            {{-- HEADER --}}
            <div class="mb-6 d-flex justify-content-between align-items-center">
                <h1 class="h2">Ajouter des ventes</h1>
                <a class="btn btn-dark" href="{{ route('superadmin.vente.index') }}">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>

            {{-- FORMULAIRE --}}
            <form action="{{ route('superadmin.vente.store') }}" method="POST" id="venteForm">
                @csrf

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Date de la vente</label>
                                <input type="date" name="date_vente" class="form-control @error('date_vente') is-invalid @enderror" value="{{ old('date_vente', date('Y-m-d')) }}" required>
                            </div>
                            <div class="col-md-8 text-end d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-primary" id="addSaleBtn">
                                    <i class="bi bi-plus-circle"></i> Ajouter un article
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CONTENEUR DES ACCORDIONS --}}
                <div class="accordion" id="accordionVentes"></div>

                {{-- BOUTON ENREGISTRER --}}
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-success btn-lg px-5">
                        <i class="bi bi-check-all"></i> Enregistrer les ventes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- TEMPLATE ACCORDION --}}
<template id="saleTemplate">
    <div class="accordion-item mb-4 border shadow-sm">
        <h2 class="accordion-header">
            <div class="d-flex align-items-center justify-content-between bg-light px-3 py-2">
                <button class="accordion-button fw-bold flex-grow-1 bg-transparent border-0 shadow-none text-dark" type="button" data-bs-toggle="collapse">
                    Article #<span class="item-number"></span>
                </button>
                <button type="button" class="btn btn-outline-danger btn-sm delete-sale ms-2">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </h2>

        <div class="accordion-collapse collapse show">
            <div class="accordion-body">
                <div class="row g-4">
                    
                    {{-- IMAGE AGRANDIE --}}
                    <div class="col-md-3 text-center border-end">
                        <label class="form-label d-block small text-muted text-uppercase fw-bold">Aperçu produit</label>
                        <img class="img-preview rounded shadow-sm mb-2 border" style="width: 100%; height: 180px; object-fit: contain; background: #fff;" src="{{ asset('images/no-image.png') }}">
                        <div class="small fw-bold stock-badge text-uppercase p-1 rounded"></div>
                    </div>

                    <div class="col-md-9">
                        <div class="row g-3">
                            {{-- ARTICLE --}}
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Désignation / Code Article</label>
                                <select class="form-select stock-select" required>
                                    <option value="">Sélectionner un produit...</option>
                                    @foreach($stocks as $stock)
                                        <option value="{{ $stock->id }}"
                                            data-image="{{ $stock->image ? asset('storage/'.$stock->image) : asset('images/no-image.png') }}"
                                            data-stock="{{ $stock->quantite_restante }}"
                                            data-emplacement="{{ $stock->emplacement }}"
                                            data-categorie="{{ $stock->category ? $stock->category->nom : ($stock->categorie ?? 'Non classé') }}">
                                            {{ $stock->code_article }} — {{ $stock->designation }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" class="stock-id-input">
                            </div>

                            {{-- QUANTITÉ --}}
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Quantité</label>
                                <input type="number" class="form-control quantity" value="1" min="0.01" step="0.01">
                                <div class="text-danger small quantity-error mt-1 fw-bold"></div>
                            </div>

                            {{-- PRIX UNITAIRE --}}
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Prix unitaire (FCFA)</label>
                                <input type="number" class="form-control unit-price" placeholder="Entrez le prix" min="0">
                            </div>

                            {{-- TOTAL --}}
                            <div class="col-md-4">
                                <label class="form-label text-primary fw-bold">Prix total</label>
                                <input type="text" class="form-control bg-light fw-bold total-price" readonly value="0 FCFA">
                            </div>

                            {{-- EMPLACEMENT --}}
                            <div class="col-md-6">
                                <label class="form-label small">Emplacement</label>
                                <input type="text" class="form-control form-control-sm bg-light emplacement" readonly>
                            </div>

                            {{-- CATÉGORIE --}}
                            <div class="col-md-6">
                                <label class="form-label small">Catégorie</label>
                                <input type="text" class="form-control form-control-sm bg-light categorie" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

{{-- SCRIPTS --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let index = 0;
const accordionContainer = document.getElementById('accordionVentes');
const template = document.getElementById('saleTemplate');
const addBtn = document.getElementById('addSaleBtn');

function addSale() {
    const clone = template.content.cloneNode(true);
    const item = clone.querySelector('.accordion-item');
    
    // Setup ID unique pour l'accordéon
    const collapseId = 'collapse' + index;
    const button = clone.querySelector('.accordion-button');
    const collapseDiv = clone.querySelector('.accordion-collapse');
    button.setAttribute('data-bs-target', '#' + collapseId);
    collapseDiv.setAttribute('id', collapseId);

    // Éléments du DOM
    const select = clone.querySelector('.stock-select');
    const stockIdInput = clone.querySelector('.stock-id-input');
    const qtyInput = clone.querySelector('.quantity');
    const unitInput = clone.querySelector('.unit-price');
    const totalInput = clone.querySelector('.total-price');
    const imgPreview = clone.querySelector('.img-preview');
    const badge = clone.querySelector('.stock-badge');
    const fieldEmplacement = clone.querySelector('.emplacement');
    const fieldCategorie = clone.querySelector('.categorie');
    
    // Attribution des names pour Laravel
    stockIdInput.name = `produits[${index}][stock_id]`;
    qtyInput.name = `produits[${index}][quantite]`;
    unitInput.name = `produits[${index}][prix_unitaire]`;

    // Initialisation Select2
    $(select).select2({
        placeholder: "Rechercher un produit...",
        width: '100%'
    }).on('change', function() {
        const opt = $(this).find(':selected');
        if (!this.value) return;

        // Remplissage des champs cachés et visibles
        stockIdInput.value = this.value;
        imgPreview.src = opt.data('image');
        fieldEmplacement.value = opt.data('emplacement') || 'N/A';
        fieldCategorie.value = opt.data('categorie') || 'Non classé'; // FIX: Affichage de la catégorie
        
        // Gestion visuelle du stock
        const stockDispo = parseFloat(opt.data('stock'));
        badge.textContent = `En stock: ${stockDispo}`;
        badge.className = `small fw-bold stock-badge mt-1 ${stockDispo <= 5 ? 'bg-danger text-white' : 'bg-success text-white'}`;
        
        checkStock();
        calc();
    });

    function calc() {
        const q = parseFloat(qtyInput.value) || 0;
        const p = parseFloat(unitInput.value) || 0;
        totalInput.value = (q * p).toLocaleString('fr-FR') + " FCFA";
    }

    function checkStock() {
        const opt = $(select).find(':selected');
        const available = parseFloat(opt.data('stock')) || 0;
        const requested = parseFloat(qtyInput.value) || 0;
        const errorDiv = item.querySelector('.quantity-error');

        if (requested > available) {
            errorDiv.textContent = `Stock insuffisant ! (Max: ${available})`;
            qtyInput.classList.add('is-invalid');
        } else {
            errorDiv.textContent = "";
            qtyInput.classList.remove('is-invalid');
        }
    }

    qtyInput.addEventListener('input', () => { checkStock(); calc(); });
    unitInput.addEventListener('input', calc);

    // Logique de suppression
    clone.querySelector('.delete-sale').addEventListener('click', function() {
        const totalItems = document.querySelectorAll('.accordion-item').length;
        
        if (totalItems <= 1) {
            Swal.fire('Action impossible', 'Vous devez conserver au moins un article.', 'warning');
            return;
        }

        const hasContent = select.value !== "" || unitInput.value !== "" || qtyInput.value > 1;

        if (hasContent) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Les informations de cet article seront effacées.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) item.remove();
            });
        } else {
            item.remove();
        }
    });

    // AJOUT EN HAUT DU CONTENEUR
    accordionContainer.prepend(item);
    index++;
}

// Lancement au chargement
document.addEventListener('DOMContentLoaded', () => {
    addSale();
});

addBtn.addEventListener('click', addSale);
</script>

<style>
    .select2-container--default .select2-selection--single {
        height: 40px !important;
        line-height: 40px !important;
        border: 1px solid #ced4da !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }
    .accordion-button:not(.collapsed) {
        background-color: #e9ecef !important;
        color: #000 !important;
        box-shadow: none !important;
    }
</style>

@endsection