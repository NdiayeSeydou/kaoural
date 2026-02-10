@extends('admin.layout.navbar')
@section('title','Modifier une entrée spécifique')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Modifier une entrée spécifique</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Accueil</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Entrées de stock</a>
                            </li>
                            <li class="breadcrumb-item active">Modification</li>
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

                <!-- ================= DÉTAILS DE L’ENTRÉE ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Détails de l’entrée</h5>
                        <p class="mb-0 text-secondary">
                            Modification des informations principales
                        </p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                             <div class="col-md-6">
                            <label class="form-label">Code produit</label>
                            <input type="text" class="form-control" placeholder="Ex: ART-205">
                        </div>

                            <!-- Produit entré -->
                            <div class="col-md-6">
                                <label class="form-label">Produit entré</label>
                                <select class="form-select">
                                    <option selected>Transparent Sunglasses</option>
                                    <option>Casquette</option>
                                    <option>Sac à dos</option>
                                    <option>Montre</option>
                                </select>
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

                            <!-- Emplacement -->
                            <div class="col-md-6">
                                <label class="form-label">Emplacement</label>
                                <select class="form-select">
                                    <option selected>Boutique</option>
                                    <option>Magasin</option>
                                    <option>Dépôt</option>
                                </select>
                            </div>

                            <!-- Fournisseur -->
                            <div class="col-md-6">
                                <label class="form-label">Nom du fournisseur</label>
                                <select class="form-select">
                                    <option selected>Seydou Traoré</option>
                                    <option>Ali Koné</option>
                                    <option>Dime Coulibaly</option>
                                </select>
                            </div>

                            <!-- Date -->
                            <div class="col-md-6">
                                <label class="form-label">Date de l’entrée</label>
                                <input type="date" class="form-control" value="2026-01-10">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-danger">
                        Supprimer cette entrée
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Mettre à jour l’entrée
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
