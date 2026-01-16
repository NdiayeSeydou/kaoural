@extends('superadmin.layout.navbar')
@section('title', 'Modifier un stock | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Éditer un stock</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>

                            <li class="breadcrumb-item"><a href="{{ route('superadmin.stock.index') }}">Stocks</a></li>
                            <li class="breadcrumb-item active">Édition</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a class="btn btn-dark" href="{{ route('superadmin.stock.index') }}">
                        Retour à la liste
                    </a>
                </div>
            </div>

            <!-- FORM -->
            <form class="needs-validation" novalidate>

                <!-- ================= INFORMATIONS PRODUIT ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Détails du stock</h5>
                        <p class="mb-0 text-secondary">Informations générales sur le produit</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <!-- Nom produit -->
                            <div class="col-md-6">
                                <label class="form-label">Nom du produit</label>
                                <input type="text" class="form-control" value="Transparent Sunglasses">
                            </div>

                            <!-- Code produit -->
                            <div class="col-md-6">
                                <label class="form-label">Code produit</label>
                                <input type="text" class="form-control" value="ART-205">
                            </div>

                            <!-- Catégorie -->
                            <div class="col-md-6">
                                <label class="form-label">Catégorie</label>
                                <input type="text" class="form-control" value="Accessoires">
                            </div>

                            <!-- Emplacement -->
                            <div class="col-md-6">
                                <label class="form-label">Emplacement</label>
                                <select class="form-select">
                                    <option selected>Boutique</option>
                                    <option>Magasin</option>
                                </select>
                            </div>

                            <!-- Quantité en stock -->
                            <div class="col-md-6">
                                <label class="form-label">Quantité en stock</label>
                                <input type="number" class="form-control" value="12">
                            </div>

                            <!-- Prix unitaire -->
                            <div class="col-md-6">
                                <label class="form-label">Prix unitaire (FCFA)</label>
                                <input type="number" class="form-control" value="2 700">
                            </div>

                            <!-- Image produit -->
                            <div class="col-md-6">
                                <label class="form-label">Image du produit</label>
                                <input type="file" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= HISTORIQUE ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Historique des entrées</h5>
                        <p class="mb-0 text-secondary">Consultation frontend uniquement</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Quantité ajoutée</th>
                                        <th>Emplacement</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01/01/2026</td>
                                        <td>5</td>
                                        <td>Boutique</td>
                                        <td>Initial</td>
                                    </tr>
                                    <tr>
                                        <td>05/01/2026</td>
                                        <td>3</td>
                                        <td>Magasin</td>
                                        <td>Réapprovisionnement</td>
                                    </tr>
                                    <tr>
                                        <td>10/01/2026</td>
                                        <td>4</td>
                                        <td>Boutique</td>
                                        <td>Réassort</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-danger">
                        Supprimer le stock
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Mettre à jour le stock
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
