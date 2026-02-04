@extends('superadmin.layout.navbar')
@section('title', 'Détails du bon de commande | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Détails du bon de commande</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('superadmin.dashboard') }}">Accueil</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('superadmin.bon.index') }}">Bons de commande</a>
                            </li>
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- ================= INFOS BON ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Informations du bon de commande</h5>
                    <p class="mb-0 text-secondary">Détails du destinataire et du bon</p>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <strong>ID du bon :</strong> {{ $bon->public_id }}
                        </div>

                        <div class="col-md-4">
                            <strong>Nom du destinataire :</strong> {{ $bon->destinataire }}
                        </div>

                        <div class="col-md-4">
                            <strong>Status :</strong>
                            @php
                                $badgeClass = $bon->status === 'livre'
                                    ? 'bg-success-subtle text-success-emphasis'
                                    : 'bg-warning-subtle text-warning-emphasis';
                            @endphp
                            <span class="badge rounded-pill {{ $badgeClass }}">
                                {{ ucfirst(str_replace('_', ' ', $bon->status)) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= TABLE PRODUITS ================= -->
            <div class="card mb-6 card-lg">
                <div class="card-header border-bottom border-dashed">
                    <h5>Produits du bon de commande</h5>
                </div>

                <div class="card-body px-6 py-5">
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Désignation</th>
                                    <th>Quantité</th>
                                    <th>Libellé</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bon->produits as $produit)
                                    <tr>
                                        <td>{{ $produit->produit }}</td>
                                        <td>{{ $produit->quantite }}</td>
                                        <td>{{ $produit->libelle }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">
                                            Aucun produit associé à ce bon
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ACTIONS -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('superadmin.bon.index') }}" class="btn btn-outline-secondary">
                    Retour
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
