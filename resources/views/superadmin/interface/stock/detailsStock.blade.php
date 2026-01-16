@extends('superadmin.layout.navbar')
@section('title', 'Détails du stock | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 col-12">

                <!-- HEADER -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Détails du stock</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.stock.index') }}">Stocks</a></li>
                                <li class="breadcrumb-item active">Détails</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-2">
                        <a class="btn btn-dark" href="{{ route('superadmin.stock.index') }}">
                            Retour à la liste
                        </a>
                    </div>
                </div>

                <!-- ================= INFOS STOCK ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Informations du stock</h5>
                        <p class="mb-0 text-secondary">Détails généraux du produit</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nom du produit</label>
                                <div class="form-control bg-light">Transparent Sunglasses</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Emplacement</label>
                                <div class="form-control bg-light">Boutique</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Code produit</label>
                                <div class="form-control bg-light">ART-205</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Quantité en stock restants</label>
                                <div class="form-control bg-light">12</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Categories</label>
                                <div class="form-control bg-light">Accessoires</div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= IMAGE PRODUIT ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Image du produit</h5>
                    </div>

                    <div class="card-body px-6 py-5 text-center">
                        <img src="../../assets/images/ecommerce/product-1.jpg" class="img-fluid rounded-4 shadow-sm"
                            width="180" alt="Produit">
                    </div>
                </div>

                <!-- ================= TARIFICATION / DETAILS ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Détails financiers</h5>
                        <p class="mb-0 text-secondary">Valeur du stock</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Prix unitaire</label>
                                <div class="form-control bg-light">2 700 FCFA</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Valeur totale</label>
                                <div class="form-control bg-light fw-bold text-success">
                                    32 400 FCFA
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Dernière mise à jour</label>
                                <div class="form-control bg-light">10 Janvier 2026</div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= HISTORIQUE DES ENTRÉES ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Historique des entrées</h5>
                        <p class="mb-0 text-secondary">Suivi des ajouts au stock</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Quantité ajoutée</th>
                                        <th>Emplacement</th>
                                        <th>Nom du fourniseur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>05 Janvier 2026</td>
                                        <td>5</td>
                                        <td>Boutique</td>
                                        <td>Réception fournisseur</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>08 Janvier 2026</td>
                                        <td>7</td>
                                        <td>Boutique</td>
                                        <td>Retour client</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>10 Janvier 2026</td>
                                        <td>3</td>
                                        <td>Boutique</td>
                                        <td>Ajustement inventaire</td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example" class="mt-4">
                                <ul class="pagination justify-content-center mb-0">
                                    <li class="page-item"><a class="page-link disabled" href="#">Précedent</a></li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>



                </div>

                <!-- ACTIONS -->

            </div>
        </div>
    </div>

@endsection
