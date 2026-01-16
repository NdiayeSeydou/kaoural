@extends('superadmin.layout.navbar')
@section('title', 'Modifier un bon de commande | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 col-12">

                <!-- HEADER -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Modifier le bon de commande</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('superadmin.dashboard') }}">Accueil</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('superadmin.bon.index') }}">Bons de commande</a>
                                </li>

                                <li class="breadcrumb-item active">Édition</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- ================= INFOS BON ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Informations du bon de commande</h5>
                        <p class="mb-0 text-secondary">Détails du destinataire et du bon</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label">ID du bon</label>
                                <input type="text" class="form-control" value="BON-0001" readonly>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Nom du destinataire</label>
                                <input type="text" class="form-control" value="Jean Dupont">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option value="non_livre" selected>Non livré</option>
                                    <option value="livre">Livré</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= AJOUT PRODUIT ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Ajouter un produit</h5>
                        <p class="mb-0 text-secondary">Modifier ou ajouter des produits au bon</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Désignation</label>
                                <input type="text" id="designation" class="form-control" placeholder="Nom du produit">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Quantité</label>
                                <input type="number" id="quantite" class="form-control" value="1">
                            </div>

                            <div class="col-md-3 text-end">
                                <button type="button" class="btn btn-outline-primary mt-4" id="addProduct">
                                    + Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= TABLE PRODUITS ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Produits du bon de commande</h5>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="table-responsive">
                            <table class="table table-centered mb-0" id="productsTable">
                                <thead>
                                    <tr>
                                        <th>Désignation</th>
                                        <th>Quantité</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Exemple de produits existants -->
                                    <tr>
                                        <td>Transparent Sunglasses</td>
                                        <td>2</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Montre Bracelet</td>
                                        <td>1</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-outline-secondary">Annuler</button>
                    <button class="btn btn-primary">Mettre à jour le bon</button>
                </div>

            </div>
        </div>
    </div>

    <!-- ================= SCRIPT AJOUT PRODUIT ================= -->
    <script>
        const designationInput = document.getElementById('designation');
        const quantiteInput = document.getElementById('quantite');
        const addProductBtn = document.getElementById('addProduct');
        const productsTable = document.getElementById('productsTable').getElementsByTagName('tbody')[0];

        // Supprimer les lignes existantes
        Array.from(productsTable.querySelectorAll('button')).forEach(btn => {
            btn.addEventListener('click', e => {
                e.target.closest('tr').remove();
            });
        });

        addProductBtn.addEventListener('click', () => {
            const designation = designationInput.value.trim();
            const quantite = parseInt(quantiteInput.value) || 0;

            if (!designation || quantite <= 0) {
                alert('Veuillez remplir correctement les champs du produit.');
                return;
            }

            const row = productsTable.insertRow();
            row.innerHTML = `
            <td>${designation}</td>
            <td>${quantite}</td>
            <td>
                <button class="btn btn-sm btn-outline-danger">Supprimer</button>
            </td>
        `;

            row.querySelector('button').addEventListener('click', () => {
                row.remove();
            });

            designationInput.value = '';
            quantiteInput.value = 1;
        });
    </script>

@endsection
