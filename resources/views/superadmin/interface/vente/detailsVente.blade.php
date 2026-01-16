@extends('superadmin.layout.navbar')
@section('title', 'Détails de la vente | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Détails de la vente</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('superadmin.vente.index') }}">Ventes</a></li>
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex gap-2">
                    <a class="btn btn-dark" href="{{ route('superadmin.vente.index') }}">
                        Retour à la liste
                    </a>
                  
                </div>
            </div>

            <!-- ================= INFOS VENTE ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Informations de la vente</h5>
                    <p class="mb-0 text-secondary">Détails généraux</p>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date de la vente</label>
                            <div class="form-control bg-light">10 Janvier 2026</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Emplacement</label>
                            <div class="form-control bg-light">Boutique</div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ================= PRODUIT ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Produit vendu</h5>
                    <p class="mb-0 text-secondary">Informations de l’article</p>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="row g-4 align-items-center">

                        <div class="col-md-4 text-center">
                            <img src="../../assets/images/ecommerce/product-1.jpg"
                                 class="img-fluid rounded-4 shadow-sm"
                                 width="180"
                                 alt="Produit">
                        </div>

                        <div class="col-md-8">
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Code article</label>
                                    <div class="form-control bg-light">ART-205</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Désignation</label>
                                    <div class="form-control bg-light">Transparent Sunglasses</div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ================= TARIFICATION ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Tarification</h5>
                    <p class="mb-0 text-secondary">Détails financiers</p>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="row g-4">

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Quantité</label>
                            <div class="form-control bg-light">2</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Prix unitaire</label>
                            <div class="form-control bg-light">2 700 FCFA</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Prix total</label>
                            <div class="form-control bg-light fw-bold text-success">
                                5 400 FCFA
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ACTIONS -->
            <div class="d-flex justify-content-between mb-6">
                <button class="btn btn-outline-danger">
                    Supprimer la vente
                </button>

                <a href="{{ route('superadmin.vente.edit', 1) }}" class="btn btn-primary">
                    Modifier la vente
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
