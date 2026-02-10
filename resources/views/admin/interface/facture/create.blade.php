@extends('admin.layout.navbar')
@section('title', 'Ajouter une nouvelle facture | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-md-12 col-12">

                <!-- HEADER -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Ajouter une nouvelle facture</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('superadmin.dashboard') }}">Accueil</a>
                                </li>
                                
                                 <li class="breadcrumb-item">
                                    <a href="{{ route('superadmin.facture.index') }}">Factures</a>
                                </li>
                                <li class="breadcrumb-item active">Facturation</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- ================= INFOS FACTURE ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Informations de la facture</h5>
                        <p class="mb-0 text-secondary">Détails client et paiement</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label class="form-label">ID Facture</label>
                                <input type="text" class="form-control" value="FAC-0001">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Date de la facture</label>
                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Type de client</label>
                                <select class="form-select">
                                    <option value="particulier">Particulier</option>
                                    <option value="pro">Pro-format</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Nom du client</label>
                                <input type="text" class="form-control" placeholder="Nom du client">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Adresse du client</label>
                                <input type="text" class="form-control" placeholder="Adresse complète">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" placeholder="+221 77 000 00 00">
                            </div>

                           

                        </div>
                    </div>
                </div>

                <!-- ================= AJOUT PRODUIT ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Ajouter un produit</h5>
                        <p class="mb-0 text-secondary">Détails du produit à facturer</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <div class="col-md-3">
                                <label class="form-label">Code article</label>
                                <input type="text" id="codeArticle" class="form-control" placeholder="ART-205">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Désignation</label>
                                <input type="text" id="designation" class="form-control" placeholder="Nom du produit">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Quantité</label>
                                <input type="number" id="quantite" class="form-control" value="1">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Prix unitaire</label>
                                <input type="number" id="prixUnitaire" class="form-control" value="0">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Prix total</label>
                                <input type="text" id="prixTotal" class="form-control bg-light" value="0 FCFA" disabled>
                            </div>

                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-outline-primary" id="addProduct">
                                    + Ajouter un nouvel enregistrement
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= TABLE PRODUITS ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Produits ajoutés</h5>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="table-responsive">
                            <table class="table table-centered mb-0" id="productsTable">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Désignation</th>
                                        <th>Quantité</th>
                                        <th>PU</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Les produits ajoutés apparaîtront ici -->
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <h4>Total facture : <strong id="totalFacture">0 FCFA</strong></h4>
                        </div>
                         <div class="row g-4 mt-4">
                                <label class="form-label">Montant payé (FCFA)</label>
                                <input type="number" class="form-control" placeholder="0">
                            </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-outline-secondary">
                        Annuler
                    </button>
                    <button class="btn btn-primary">
                        Enregistrer la facture
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- ================= SCRIPT AJOUT PRODUIT ================= -->
    <script>
        const codeArticle = document.getElementById('codeArticle');
        const designation = document.getElementById('designation');
        const quantite = document.getElementById('quantite');
        const prixUnitaire = document.getElementById('prixUnitaire');
        const prixTotal = document.getElementById('prixTotal');
        const addProductBtn = document.getElementById('addProduct');
        const productsTable = document.getElementById('productsTable').getElementsByTagName('tbody')[0];
        const totalFactureEl = document.getElementById('totalFacture');

        // Calcul automatique du prix total du produit
        function updatePrixTotal() {
            const total = (quantite.value || 0) * (prixUnitaire.value || 0);
            prixTotal.value = total.toLocaleString() + ' FCFA';
        }

        quantite.addEventListener('input', updatePrixTotal);
        prixUnitaire.addEventListener('input', updatePrixTotal);

        // Ajouter un produit au tableau
        addProductBtn.addEventListener('click', () => {
            const code = codeArticle.value.trim();
            const desc = designation.value.trim();
            const qty = parseInt(quantite.value) || 0;
            const pu = parseFloat(prixUnitaire.value) || 0;
            const total = qty * pu;

            if (!code || !desc || qty <= 0 || pu <= 0) {
                alert('Veuillez remplir correctement tous les champs du produit.');
                return;
            }

            // Ajouter la ligne dans le tableau
            const row = productsTable.insertRow();
            row.innerHTML = `
            <td>${code}</td>
            <td>${desc}</td>
            <td>${qty}</td>
            <td>${pu.toLocaleString()}</td>
            <td>${total.toLocaleString()} FCFA</td>
            <td>
                <button class="btn btn-sm btn-outline-danger">Supprimer</button>
            </td>
        `;

            // Ajouter fonctionnalité supprimer
            row.querySelector('button').addEventListener('click', () => {
                row.remove();
                updateTotalFacture();
            });

            // Réinitialiser les champs
            codeArticle.value = '';
            designation.value = '';
            quantite.value = 1;
            prixUnitaire.value = 0;
            prixTotal.value = '0 FCFA';

            updateTotalFacture();
        });

        function updateTotalFacture() {
            let total = 0;
            for (let row of productsTable.rows) {
                total += parseFloat(row.cells[4].innerText.replace(/\sFCFA|,/g, '')) || 0;
            }
            totalFactureEl.innerText = total.toLocaleString() + ' FCFA';
        }
    </script>

@endsection
