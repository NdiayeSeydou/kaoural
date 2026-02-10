@extends('admin.layout.navbar')
@section('title', 'Retrait de produits | kaoural')
@section('suite')

<form action="{{ route('admin.quincaillerie.ajoutstore', $quincaillerie->public_id) }}" method="POST">
    @csrf

    <!-- ================= QUINCAILLERIE, DATE & STATUT ================= -->
    <div class="row g-3 mb-4">
        <!-- Quincaillerie -->
        <div class="col-md-4">
            <label class="form-label fw-semibold">Quincaillerie</label>
            <input type="text" class="form-control bg-light" value="{{ $quincaillerie->nom }}" readonly>
        </div>

        <!-- Date -->
        <div class="col-md-4">
            <label class="form-label fw-semibold">Date du retrait</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                   value="{{ old('date', now()->format('Y-m-d')) }}" required>
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Statut -->
        <div class="col-md-4">
            <label class="form-label fw-semibold">Statut</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                <option disabled selected>Choisir...</option>
                <option value="bon" {{ old('status') == 'bon' ? 'selected' : '' }}>Avec bon</option>
                <option value="sans bon" {{ old('status') == 'sans bon' ? 'selected' : '' }}>Sans bon</option>
                <option value="payée" {{ old('status') == 'payée' ? 'selected' : '' }}>Payée</option>
                <option value="impayée" {{ old('status') == 'impayée' ? 'selected' : '' }}>Impayée</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- ================= PRODUITS ================= -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <!-- Afficher les erreurs globales -->
         

            <div id="produitsContainer">
                @php
                    $produitsOld = old('produits', [[]]);
                @endphp

                @foreach ($produitsOld as $i => $oldProduit)
                    <div class="card mb-3 produit-card p-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Produit</label>
                            <select name="produits[{{ $i }}][stock_public_id]" 
                                    class="form-select produit-select" 
                                    required style="width:100%">
                                @if(isset($oldProduit['stock_public_id']))
                                    @php
                                        $stock = $stocks->where('public_id', $oldProduit['stock_public_id'])->first();
                                    @endphp
                                    @if($stock)
                                        <option value="{{ $stock->public_id }}" selected>
                                            {{ $stock->designation }} ({{ $stock->quantite_restante }})
                                        </option>
                                    @endif
                                @endif
                            </select>
                            @error("produits.$i.stock_public_id")
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Quantité</label>
                            <input type="text" name="produits[{{ $i }}][quantite_sortie]" 
                                   class="form-control qty @error('produits.' . $i . '.quantite_sortie') is-invalid @enderror" 
                                   value="{{ $oldProduit['quantite_sortie'] ?? '' }}" placeholder="Ex : 2,5">
                            @error("produits.$i.quantite_sortie")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Prix unitaire (FCFA)</label>
                            <input type="number" name="produits[{{ $i }}][prix_unitaire]" 
                                   class="form-control price" 
                                   value="{{ $oldProduit['prix_unitaire'] ?? '' }}" placeholder="Optionnel">
                            @error("produits.$i.prix_unitaire")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 text-end">
                            <button type="button" class="btn btn-ghost btn-sm btn-remove-produit">
                                <i class="bi bi-trash text-danger fs-5"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- AJOUTER UN PRODUIT -->
            <div class="mt-3">
                <button type="button" class="btn btn-primary" id="addProduit">Ajouter un produit</button>
            </div>

        </div>
    </div>

    <!-- BOUTON ENVOYER -->
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('admin.quincaillerie.show', $quincaillerie->public_id) }}" 
           class="btn btn-outline-secondary">Annuler</a>
        <button type="submit" class="btn btn-primary">Valider le retrait</button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {

    function initSelect2(select) {
        $(select).select2({
            placeholder: 'Tapez le code ou la désignation',
            minimumInputLength: 1,
            ajax: {
                url: '{{ route("admin.quincaillerie.searchStock") }}',
                dataType: 'json',
                delay: 300,
                data: function(params) { return { q: params.term }; },
                processResults: function(data) { return { results: data }; }
            }
        }).on('select2:select', function(e) {
            const data = e.params.data;
            const card = e.target.closest('.produit-card');
            if(card) {
                // Crée un champ hidden code_article et designation si nécessaire
                let codeInput = card.querySelector('.code-input');
                let desigInput = card.querySelector('.designation-input');
                if(!codeInput) {
                    codeInput = document.createElement('input');
                    codeInput.type = 'hidden';
                    codeInput.name = e.target.name.replace('stock_public_id','code_article');
                    codeInput.classList.add('code-input');
                    card.appendChild(codeInput);
                }
                if(!desigInput) {
                    desigInput = document.createElement('input');
                    desigInput.type = 'hidden';
                    desigInput.name = e.target.name.replace('stock_public_id','designation');
                    desigInput.classList.add('designation-input');
                    card.appendChild(desigInput);
                }

                codeInput.value = data.code_article;
                desigInput.value = data.designation;
            }
        });
    }

    const container = document.getElementById('produitsContainer');
    const addBtn = document.getElementById('addProduit');

    // Init tous les selects existants
    container.querySelectorAll('.produit-select').forEach(initSelect2);

    addBtn.addEventListener('click', function() {
        const index = container.querySelectorAll('.produit-card').length;
        const card = container.querySelector('.produit-card').cloneNode(true);

        card.querySelectorAll('input, select').forEach(el => {
            if(el.tagName === 'SELECT') {
                $(el).empty().trigger('change');
                el.name = el.name.replace(/\[\d+\]/, `[${index}]`);
            } else {
                el.value = '';
                el.name = el.name.replace(/\[\d+\]/, `[${index}]`);
            }
        });

        container.appendChild(card);
        initSelect2(card.querySelector('.produit-select'));
    });

    // Supprimer une carte produit (ne fait rien si dernier)
    container.addEventListener('click', function(e) {
        if(e.target.closest('.btn-remove-produit')) {
            const cards = container.querySelectorAll('.produit-card');
            if(cards.length > 1) {
                e.target.closest('.produit-card').remove();
            }
        }
    });

});
</script>

@endsection
