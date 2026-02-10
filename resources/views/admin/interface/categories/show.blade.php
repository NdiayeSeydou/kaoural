@extends('admin.layout.navbar')
@section('title', 'Détails de la catégorie | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Détails de la catégorie</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categorie.index') }}">Catégories</a></li>
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a class="btn btn-dark" href="{{ route('admin.categorie.index') }}">
                        Retour à la liste
                    </a>
                </div>
            </div>

            <!-- CARD DETAIL CATEGORY -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Informations sur la catégorie</h5>
                    <p class="mb-0 text-secondary">Détails et statistiques</p>
                </div>
                <div class="card-body px-6 py-5">

                    <!-- Nom de la catégorie -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Nom :</label>
                        <p>{{ $categorie->name }}</p>
                    </div>

                    <!-- Nombre de stocks liés -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Nombre de produits :</label>
                        <p>{{ $stocks->count() }}</p>
                    </div>

                    <!-- Liste des stocks -->
                    @if($stocks->count() > 0)
                        <div class="mb-4">
                            <label class="form-label fw-bold">Produits liés :</label>
                            <ul>
                                @foreach($stocks as $stock)
                                    <li>{{ $stock->designation }} - Quantité restante : {{ $stock->quantite_calculee }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="mb-4">
                            <p class="text-muted">Aucun produit lié à cette catégorie.</p>
                        </div>
                    @endif

                    <!-- Actions -->
                 

                </div>
            </div>

        </div>
    </div>
</div>


@endsection
