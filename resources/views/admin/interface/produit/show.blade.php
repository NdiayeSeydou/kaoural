@extends('admin.layout.navbar')
@section('title', 'Détails du produit | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Détails du produit</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Accueil</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.produit.index') }}">Produits</a>
                            </li>
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex gap-2">
                    <a class="btn btn-dark" href="{{ route('admin.produit.index') }}">
                        Retour à la liste
                    </a>
                </div>
            </div>

            <!-- ================= INFOS PRODUIT ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Informations du produit</h5>
                    <p class="mb-0 text-secondary">Détails généraux</p>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Désignation</label>
                            <div class="form-control bg-light">{{ $produit->designation }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Catégorie</label>
                            <div class="form-control bg-light">
                                {{ $produit->categorie->name ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Code produit</label>
                            <div class="form-control bg-light">{{ $produit->public_id }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date de création</label>
                            <div class="form-control bg-light">
                                {{ $produit->created_at->format('d/m/Y') }}
                            </div>
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
                    @if ($produit->image)
                        <img src="{{ asset('storage/' . $produit->image) }}"
                             class="img-fluid rounded-4 shadow-sm w-100"
                             style="max-height: 350px; object-fit: contain;"
                             alt="{{ $produit->designation }}">
                    @else
                        <div class="text-muted">Aucune image disponible</div>
                    @endif
                </div>
            </div>

            <!-- ================= DESCRIPTION ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Description du produit</h5>
                </div>

                <div class="card-body px-6 py-5">
                    @if ($produit->description)
                        <p class="mb-0">
                            {{ $produit->description }}
                        </p>
                    @else
                        <div class="text-muted">
                            Aucune description fournie pour ce produit.
                        </div>
                    @endif
                </div>
            </div>

            <!-- ================= TARIFICATION ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Informations financières</h5>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Prix unitaire</label>
                            <div class="form-control bg-light fw-bold text-success">
                                {{ number_format($produit->prix_unitaire, 0, ',', ' ') }} FCFA
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Dernière mise à jour</label>
                            <div class="form-control bg-light">
                                {{ $produit->updated_at->format('d/m/Y à H:i') }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
