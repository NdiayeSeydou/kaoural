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
                <div class="mb-5">
                    <h3>Nouveau produit</h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Code produit</label>
                            <input type="text" class="form-control" placeholder="Ex: ART-205">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" placeholder="Ex: Transparent Sunglasses">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Catégorie</label>
                            <input type="text" class="form-control" placeholder="Ex: Accessoires">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Emplacement</label>
                            <select class="form-select">
                                <option>Boutique</option>
                                <option>Magasin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Quantité</label>
                            <input type="number" class="form-control quantity-new" value="1">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Prix unitaire</label>
                            <input type="number" class="form-control unit-price-new" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fournisseur</label>
                            <select class="form-select">
                                <option>ali</option>
                                <option>dime</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date d'ajout</label>
                            <input type="date" class="form-control date-new" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Prix total</label>
                            <input type="number" class="form-control bg-light total-price-new" readonly>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-success" id="saveNewStock">Enregistrer nouveau produit</button>
                        </div>
                    </div>
                </div>

                <!-- ================== FORMULAIRE ANCIEN STOCK ================== -->

                <div class="mb-5">
                    <h3>Ajouter un ancien stock</h3>
                     <div class="col-md-6">
                            <label class="form-label">Code produit</label>
                            <input type="text" class="form-control" placeholder="Ex: ART-205">
                        </div>
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label">Choisir un produit existant</label>
                            <select class="form-select" id="existingProductSelect">
                                <option value="">Sélectionner un produit</option>
                                <option value="ART-205">Transparent Sunglasses</option>
                                <option value="ART-310">Casque Bluetooth</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Quantité ajoutée</label>
                            <input type="number" class="form-control quantity-old" value="1">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fournisseur</label>
                            <select class="form-select">
                                <option>ali</option>
                                <option>dime</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date d'ajout</label>
                            <input type="date" class="form-control date-old" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-success" id="saveOldStock">Enregistrer ancien stock</button>
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

@endsection
