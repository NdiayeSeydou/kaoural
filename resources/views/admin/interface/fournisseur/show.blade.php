@extends('admin.layout.navbar')
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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.fournisseur.index') }}">Fournisseurs</a></li>
                                <li class="breadcrumb-item active">Détails</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-2">
                        <a class="btn btn-dark" href="{{ route('admin.fournisseur.index') }}">
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
                                <div class="form-control bg-light">{{ ucfirst($fournisseur->name) }}</div>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Catégorie</label>
                                <div class="form-control bg-light">
                                    {{ $fournisseur->categorie->name ?? '—' }}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Numéro de téléphone</label>
                                <div class="form-control bg-light">
                                    {{ $fournisseur->telephone_formatte }}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Adresse</label>
                                <div class="form-control bg-light">
                                    {{ $fournisseur->adresse ?? '—' }}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date d’ajout</label>
                                <div class="form-control bg-light">
                                    {{ $fournisseur->created_at->translatedFormat('d F Y') }}
                                </div>

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
                                <div class="form-control bg-light fw-bold">
                                    {{ $totalProduits }}
                                </div>

                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Quantité totale livrée</label>
                                <div class="form-control bg-light">
                                    {{ $quantiteTotale }} unités
                                </div>

                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Dernière livraison</label>
                                <div class="form-control bg-light">
                                    {{ $derniereLivraison ? \Carbon\Carbon::parse($derniereLivraison)->translatedFormat('d F Y') : '—' }}
                                </div>

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
                                    @forelse ($historiques as $index => $history)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($history->date)->translatedFormat('d F Y') }}</td>

                                            <td>{{ $history->stock->name ?? '—' }}</td>
                                            
                                            <td>{{ $history->quantite_entree }}</td>
                                            <td>{{ ucfirst($history->emplacement) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                Aucun historique disponible
                                            </td>
                                        </tr>
                                    @endforelse
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
