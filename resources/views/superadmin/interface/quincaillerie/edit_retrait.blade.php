@extends('superadmin.layout.navbar')
@section('title', 'Modifier produit retiré | kaoural')
@section('suite')

<div class="row justify-content-center py-5">
    <div class="col-12">

        <!-- HEADER -->
        <div class="mb-5 text-center">
            <h2 class="mb-2 h2">Modifier le produit retiré</h2>
          
        </div>

        <!-- FORM -->
        <form action="{{ route('superadmin.quincaillerie.updateRetrait', $retrait->public_id) }}" method="POST">
            @csrf

            <div class="row g-4">

            <!-- Code article -->
<div class="col-md-6">
    <label class="form-label fw-bold">Code Article</label>
    <input type="text" name="code_article" id="code_article" 
        class="form-control form-control-lg @error('code_article') is-invalid @enderror"
        value="{{ old('code_article', $retrait->code_article) }}" placeholder="Ex : 12345">
    @error('code_article')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Désignation -->
<div class="col-md-6">
    <label class="form-label fw-bold">Désignation</label>
    <input type="text" name="designation" id="designation"
        class="form-control form-control-lg @error('designation') is-invalid @enderror"
        value="{{ old('designation', $retrait->designation) }}" readonly>
    @error('designation')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                <!-- Quantité -->
                <div class="col-md-6">
                    <label class="form-label fw-bold">Quantité retirée</label>
                    <input type="number" name="quantite_sortie" min="1" step="0.01"
                        class="form-control form-control-lg @error('quantite_sortie') is-invalid @enderror"
                        value="{{ old('quantite_sortie', $retrait->quantite_sortie) }}">
                    @error('quantite_sortie')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Prix unitaire -->
                <div class="col-md-6">
                    <label class="form-label fw-bold">Prix unitaire (FCFA)</label>
                    <input type="number" name="prix_unitaire" step="0.01"
                        class="form-control form-control-lg @error('prix_unitaire') is-invalid @enderror"
                        value="{{ old('prix_unitaire', $retrait->prix_unitaire) }}">
                    @error('prix_unitaire')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Statut -->
                <div class="col-md-6">
                    <label class="form-label fw-bold">Statut</label>
                    <select name="status" class="form-select form-select-lg @error('status') is-invalid @enderror" required>
                        <option disabled>Choisir...</option>
                        <option value="bon" {{ old('status', $retrait->status) == 'bon' ? 'selected' : '' }}>Avec bon</option>
                        <option value="sans bon" {{ old('status', $retrait->status) == 'sans bon' ? 'selected' : '' }}>Sans bon</option>
                        <option value="impayée" {{ old('status', $retrait->status) == 'impayée' ? 'selected' : '' }}>Impayée</option>
                        <option value="payée" {{ old('status', $retrait->status) == 'payée' ? 'selected' : '' }}>Payée</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Prix total -->
                <div class="col-md-6">
                    <label class="form-label fw-bold">Prix total</label>
                    <input type="text" class="form-control form-control-lg bg-light fw-bold total" 
                        value="{{ number_format($retrait->prix_total, 0, ',', ' ') }} FCFA" readonly>
                </div>

                <!-- ACTIONS -->
                <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                    <a href="{{ route('superadmin.quincaillerie.show', $retrait->quincaillerie->public_id) }}" 
                        class="btn btn-outline-secondary px-4">Annuler</a>
                    <button type="submit" class="btn btn-primary px-4">Enregistrer les modifications</button>
                </div>

            </div>
        </form>

    </div>
</div>

<!-- JS pour recalculer le total automatiquement -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const qtyInput = document.querySelector('input[name="quantite_sortie"]');
    const priceInput = document.querySelector('input[name="prix_unitaire"]');
    const totalInput = document.querySelector('.total');

    function updateTotal() {
        const qty = parseFloat(qtyInput.value) || 0;
        const price = parseFloat(priceInput.value) || 0;
        const total = qty * price;
        totalInput.value = total.toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' FCFA';
    }

    qtyInput.addEventListener('input', updateTotal);
    priceInput.addEventListener('input', updateTotal);
});
</script>

@endsection
