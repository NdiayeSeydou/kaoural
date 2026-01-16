@extends('superadmin.layout.navbar')
@section('title', 'Modifier la vente | kaoural')
@section('suite')




    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 col-12">

                <!-- HEADER -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Éditer une vente</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.vente.index') }}">Ventes</a></li>
                                <li class="breadcrumb-item active">Édition</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a class="btn btn-dark" href="{{ route('superadmin.vente.index') }}">
                            Retour à la liste
                        </a>
                    </div>
                </div>

                <!-- FORM -->
                <form class="needs-validation" novalidate>

                    <!-- ================= INFOS VENTE ================= -->
                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Détails de la vente</h5>
                            <p class="mb-0 text-secondary">Informations générales de la vente</p>
                        </div>

                        <div class="card-body px-6 py-5">
                            <div class="row g-4">

                                <!-- Date -->
                                <div class="col-md-6">
                                    <label class="form-label">Date de la vente</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control flatpickr"
                                            placeholder="Sélectionner une date">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                <path d="M16 3v4M8 3v4M4 11h16" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <!-- Emplacement -->
                                <div class="col-md-6">
                                    <label class="form-label">Emplacement</label>
                                    <select class="form-select">
                                        <option>Boutique</option>
                                        <option>Magasin</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= PRODUIT ================= -->
                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Produit vendu</h5>
                            <p class="mb-0 text-secondary">Informations sur l’article vendu</p>
                        </div>

                        <div class="card-body px-6 py-5">
                            <div class="row g-4">

                                <!-- Code article -->
                                <div class="col-md-6">
                                    <label class="form-label">Code article</label>
                                    <input type="text" class="form-control" placeholder="Ex : ART-205">
                                </div>

                                <!-- Désignation -->
                                <div class="col-md-6">
                                    <label class="form-label">Désignation</label>
                                    <input type="text" class="form-control" placeholder="Nom du produit">
                                </div>

                                <!-- Image -->
                                <div class="col-md-6">
                                    <label class="form-label">Image du produit</label>
                                    <input type="file" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= PRIX ================= -->
                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Tarification</h5>
                            <p class="mb-0 text-secondary">Quantité et montants</p>
                        </div>

                        <div class="card-body px-6 py-5">
                            <div class="row g-4">

                                <!-- Quantité -->
                                <div class="col-md-4">
                                    <label class="form-label">Quantité</label>
                                    <input type="number" class="form-control" placeholder="0">
                                </div>

                                <!-- Prix unitaire -->
                                <div class="col-md-4">
                                    <label class="form-label">Prix unitaire (FCFA)</label>
                                    <input type="number" class="form-control" placeholder="0">
                                </div>

                                <!-- Prix total -->
                                <div class="col-md-4">
                                    <label class="form-label">Prix total (FCFA)</label>
                                    <input type="number" class="form-control bg-light" placeholder="0" readonly>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-danger">
                            Supprimer la vente
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Mettre à jour la vente
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>





@endsection
