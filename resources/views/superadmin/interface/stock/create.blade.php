@extends('superadmin.layout.navbar')
@section('title', 'Ajouter un stock | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-12">

                <!-- HEADER -->
                <div class="mb-6 d-flex justify-content-between align-items-center">
                    <h1 class="h2">Ajouter un stock</h1>
                    <a class="btn btn-dark" href="{{ route('superadmin.stock.index') }}">
                        Retour à la liste
                    </a>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.stock.index') }}">Stocks</a></li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </nav>

                <!-- ================== FORMULAIRE NOUVEAU STOCK ================== -->


                <form action="{{ route('superadmin.stock.nouveau') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="type_form" value="nouveau">

                    <div class="mb-5">

                        <h3>Nouveau produit</h3>

                        <div class="row g-4">

                            <div class="col-md-6">

                                <label class="form-label">Code produit</label>

                                <input type="text" class="form-control" readonly placeholder="Généré automatiquement">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">Nom du produit</label>

                                <input type="text" name="designation"
                                    class="form-control @error('designation') is-invalid @enderror"
                                    value="{{ old('designation') }}" required>

                                @error('designation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                            </div>

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

                            <div class="col-md-6">

                                <label class="form-label">Emplacement</label>

                                <select name="emplacement" class="form-select @error('emplacement') is-invalid @enderror"
                                    required>
                                    <option value="boutique" {{ old('emplacement') == 'boutique' ? 'selected' : '' }}>
                                        Boutique</option>
                                    <option value="magasin" {{ old('emplacement') == 'magasin' ? 'selected' : '' }}>Magasin
                                    </option>
                                </select>

                                @error('emplacement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                            </div>

                            <div class="col-md-6">

                                <label class="form-label">Quantité</label>

                                <input type="number" id="stock_initial" name="stock_initial"
                                    class="form-control @error('stock_initial') is-invalid @enderror"
                                    value="{{ old('stock_initial', 0) }}" min="0" required>

                                @error('stock_initial')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">Prix unitaire</label>

                                <input type="number" id="prix_unitaire" name="prix_unitaire"
                                    class="form-control @error('prix_unitaire') is-invalid @enderror"
                                    value="{{ old('prix_unitaire', 0) }}" min="0" required>

                                @error('prix_unitaire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Fournisseur</label>

                                <select name="fournisseur_id"
                                    class="form-select @error('fournisseur_id') is-invalid @enderror" required>
                                    <option value="">-- Choisir un fournisseur --</option>

                                    @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{ $fournisseur->id }}"
                                            {{ old('fournisseur_id') == $fournisseur->id ? 'selected' : '' }}>
                                            {{ $fournisseur->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('fournisseur_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-6">

                                <label class="form-label">Date d'ajout</label>

                                <input type="date" name="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date', date('Y-m-d')) }}" required>

                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Image du produit</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                {{-- Pour create, le produit n'a pas encore d'image, donc on peut mettre un message par défaut --}}
                                <div class="mt-2">
                                    <small class="text-muted">Aucune image disponible pour le moment.</small>
                                </div>
                            </div>


                            <div class="col-md-6">

                                <label class="form-label">Prix total</label>

                                <input type="number" id="prix_total" class="form-control bg-light total-price-new"
                                    readonly>

                            </div>

                            <div class="col-12 text-end">

                                <button type="submit" class="btn btn-success">

                                    Enregistrer nouveau produit

                                </button>

                            </div>

                        </div>
                    </div>

                </form>







                <div class="mb-5">

                    <h3>Ancien stock</h3>


                    <div class="card">
                        <div class="card-header">Ajouter un article</div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('superadmin.stock.ancien') }}">
                                @csrf

                                <!-- ARTICLE SELECT2 -->
                                <div class="mb-3">
                                    <label class="form-label">Rechercher un article</label>

                                    <select id="article_select"
                                        class="form-control @error('article_id') is-invalid @enderror" style="width:100%">
                                        <option value="">Tapez le code ou la désignation</option>
                                    </select>

                                    @error('article_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- DESIGNATION -->
                                <div class="mb-3">
                                    <label class="form-label">Désignation</label>

                                    <input type="text" id="designation" name="designation"
                                        class="form-control @error('designation') is-invalid @enderror"
                                        value="{{ old('designation') }}" readonly>

                                    @error('designation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- CODE ARTICLE -->
                                <div class="mb-3">
                                    <label class="form-label">Code article</label>

                                    <input type="text" id="code_article" name="code_article"
                                        class="form-control @error('code_article') is-invalid @enderror"
                                        value="{{ old('code_article') }}" readonly>

                                    @error('code_article')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- DATE -->
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') is-invalid @enderror"
                                        value="{{ old('date', now()->format('Y-m-d')) }}">
                                    @error('date')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Fournisseur</label>
                                    <select name="fournisseur_id"
                                        class="form-control @error('fournisseur_id') is-invalid @enderror">
                                        <option value="">Sélectionner un fournisseur</option>
                                        @foreach ($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->public_id }}"
                                                {{ old('fournisseur_id') == $fournisseur->public_id ? 'selected' : '' }}>
                                                {{ $fournisseur->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('fournisseur_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- QUANTITÉ -->
                                <div class="mb-3">
                                    <label class="form-label">Quantité</label>
                                    <input type="number" name="quantite"
                                        class="form-control @error('quantite') is-invalid @enderror"
                                        value="{{ old('quantite') }}" min="1" step="1"
                                        placeholder="Ex : 10">
                                    @error('quantite')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- SUBMIT -->
                                <div class="text-end">
                                    <button class="btn btn-primary">
                                        Enregistrer
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>





    </div>
    </div>
    </div>

    <!-- ================== JS ================== -->
    <script>
        // Calcul prix total pour nouveau stock
        const qtyNew = document.querySelector('.quantity-new');
        const unitNew = document.querySelector('.unit-price-new');
        const totalNew = document.querySelector('.total-price-new');

        function calcNew() {
            totalNew.value = (qtyNew.value * unitNew.value) || 0;
        }

        qtyNew.addEventListener('input', calcNew);
        unitNew.addEventListener('input', calcNew);

        // Calcul prix total pour ancien stock
        const qtyOld = document.querySelector('.quantity-old');
        const totalOld = document.querySelector('.total-price-old');

        // Prix unitaire par produit existant
        const productPrices = {
            "ART-205": 50,
            "ART-310": 120
        };

        function calcOld() {
            const product = document.getElementById('existingProductSelect').value;
            const price = productPrices[product] || 0;
            totalOld.value = (qtyOld.value * price) || 0;
        }

        qtyOld.addEventListener('input', calcOld);
        document.getElementById('existingProductSelect').addEventListener('change', calcOld);
    </script>



    <script>
        $(document).ready(function() {

            $('#article_select').select2({
                placeholder: 'Tapez le code ou la désignation',
                minimumInputLength: 1,
                ajax: {
                    url: '{{ route('superadmin.stock.search') }}',
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
                    },
                    cache: true
                }
            });

            $('#article_select').on('select2:select', function(e) {
                let data = e.params.data;

                $('#designation').val(data.designation);
                $('#code_article').val(data.code_article);
            });

        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const quantiteInput = document.getElementById('stock_initial');
            const prixUnitaireInput = document.getElementById('prix_unitaire');
            const prixTotalInput = document.getElementById('prix_total');

            function calculerPrixTotal() {
                const quantite = parseFloat(quantiteInput.value) || 0;
                const prixUnitaire = parseFloat(prixUnitaireInput.value) || 0;

                const total = quantite * prixUnitaire;
                prixTotalInput.value = total.toFixed(0); // sans décimales (FCFA)
            }

            quantiteInput.addEventListener('input', calculerPrixTotal);
            prixUnitaireInput.addEventListener('input', calculerPrixTotal);

            // Calcul initial au chargement
            calculerPrixTotal();
        });
    </script>




@endsection
