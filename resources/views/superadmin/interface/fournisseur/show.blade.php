@extends('superadmin.layout.navbar')
@section('title', 'Détails du fournisseur | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Détails du fournisseur</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('superadmin.fournisseur.index') }}">Fournisseurs</a></li>
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex gap-2">
                    <a class="btn btn-dark" href="{{ route('superadmin.fournisseur.index') }}">
                        Retour à la liste
                    </a>
                </div>
            </div>

            <!-- ================= INFOS FOURNISSEUR ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Informations du fournisseur</h5>
                    <p class="mb-0 text-secondary">Détails généraux</p>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nom du fournisseur</label>
                            <div class="form-control bg-light">Seydou Traoré</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Catégorie</label>
                            <div class="form-control bg-light">Accessoires</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Numéro de téléphone</label>
                            <div class="form-control bg-light">🇲🇱 +223 76 54 32 10</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Adresse</label>
                            <div class="form-control bg-light">Bamako, Kalaban Coura</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date d’ajout</label>
                            <div class="form-control bg-light">10 Janvier 2026</div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ================= STATISTIQUES ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Statistiques</h5>
                    <p class="mb-0 text-secondary">Résumé de l’activité</p>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="row g-4">

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Produits fournis</label>
                            <div class="form-control bg-light fw-bold">8</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Quantité totale livrée</label>
                            <div class="form-control bg-light">120 unités</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Dernière livraison</label>
                            <div class="form-control bg-light">08 Janvier 2026</div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ================= HISTORIQUE DES LIVRAISONS ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Historique des livraisons</h5>
                    <p class="mb-0 text-secondary">Produits fournis par ce fournisseur</p>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Emplacement</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>05 Janvier 2026</td>
                                    <td>Transparent Sunglasses</td>
                                    <td>5</td>
                                    <td>Boutique</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>08 Janvier 2026</td>
                                    <td>Casquette Sport</td>
                                    <td>10</td>
                                    <td>Magasin</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>10 Janvier 2026</td>
                                    <td>Sac à dos</td>
                                    <td>7</td>
                                    <td>Boutique</td>
                                </tr>
                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example" class="mt-4">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item">
                                    <a class="page-link disabled" href="#">Précédent</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link active" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Suivant</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
