@extends('superadmin.layout.navbar')
@section('title', 'Modifier un fournisseur | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 col-12">

                <!-- HEADER -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Éditer un fournisseur</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('superadmin.dashboard') }}">Accueil</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Fournisseurs</a>
                                </li>
                                <li class="breadcrumb-item active">Édition</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a class="btn btn-dark" href="#">
                            Retour à la liste
                        </a>
                    </div>
                </div>

                <!-- FORM -->
                <form class="needs-validation" novalidate>

                    <!-- ================= INFORMATIONS FOURNISSEUR ================= -->
                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Détails du fournisseur</h5>
                            <p class="mb-0 text-secondary">Informations générales</p>
                        </div>

                        <div class="card-body px-6 py-5">
                            <div class="row g-4">

                                <!-- Nom fournisseur -->
                                <div class="col-md-6">
                                    <label class="form-label">Nom du fournisseur</label>
                                    <input type="text" class="form-control" value="Seydou Traoré">
                                </div>

                                <!-- Catégorie -->
                                <div class="col-md-6">
                                    <label class="form-label">Catégorie</label>
                                    <select class="form-select">
                                        <option selected>Accessoires</option>
                                        <option>Électronique</option>
                                        <option>Vêtements</option>
                                        <option>Cosmétiques</option>
                                    </select>
                                </div>

                                <!-- Téléphone -->
                                <div class="col-md-6">
                                    <label class="form-label">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" value="+223 76 54 32 10">
                                </div>

                                <!-- Adresse -->
                                <div class="col-md-6">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" class="form-control" value="Bamako, Kalaban Coura">
                                </div>

                                <!-- Date d’ajout -->
                                <div class="col-md-6">
                                    <label class="form-label">Date d’ajout</label>
                                    <input type="date" class="form-control" value="2026-01-10">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= HISTORIQUE DES LIVRAISONS ================= -->
                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Historique des livraisons</h5>
                            <p class="mb-0 text-secondary">Consultation frontend uniquement</p>
                        </div>

                        <div class="card-body px-6 py-5">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Produit</th>
                                            <th>Quantité livrée</th>
                                            <th>Emplacement</th>
                                            <th>Note</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01/01/2026</td>
                                            <td>Transparent Sunglasses</td>
                                            <td>5</td>
                                            <td>Boutique</td>
                                            <td>Livraison initiale</td>
                                            <td>


                                                <a href="/superadmin/fournisseur/modifier/entrée/spécifique"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                    data-template="editOne"> <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                                </a>

                                                <a href="#!"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                    data-template="trashTwo">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                    <div id="trashTwo" class="d-none">
                                                        <span>Delete</span>
                                                    </div>
                                                </a>



                                            </td>
                                        </tr>

                                        <tr>
                                            <td>10/01/2026</td>
                                            <td>Casquette</td>
                                            <td>6</td>
                                            <td>Boutique</td>
                                            <td>Commande urgente</td>
                                            <td>


                                                <a href="/superadmin/fournisseur/modifier/entrée/spécifique"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                    data-template="editOne"> <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                                </a>

                                                <a href="#!"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                    data-template="trashTwo">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                    <div id="trashTwo" class="d-none">
                                                        <span>Delete</span>
                                                    </div>
                                                </a>



                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-danger">
                            Supprimer le fournisseur
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Mettre à jour le fournisseur
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
