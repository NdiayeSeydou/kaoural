@extends('superadmin.layout.navbar')
@section('title', 'Détails de la vente | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 col-12">

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

                <div class="card mb-6 card-lg shadow-sm">
                    <div class="card-header border-bottom border-dashed bg-transparent">
                        <h5 class="mb-0">Informations de la vente</h5>
                        <p class="mb-0 text-muted small">Détails généraux de la transaction</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-uppercase small text-muted">Date de la
                                    vente</label>
                                <div class="form-control bg-light border-0">
                                    {{ \Carbon\Carbon::parse($vente->date_vente)->translatedFormat('d F Y') }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-uppercase small text-muted">Emplacement</label>
                                <div class="form-control bg-light border-0 text-capitalize">
                                    <span
                                        class="badge {{ $vente->emplacement == 'boutique' ? 'bg-primary' : 'bg-secondary' }}">
                                        {{ $vente->emplacement }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-6 card-lg shadow-sm">
                    <div class="card-header border-bottom border-dashed bg-transparent">
                        <h5 class="mb-0">Produit vendu</h5>
                        <p class="mb-0 text-muted small">Informations techniques de l’article</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-4 text-center">
                                <img src="{{ $vente->image ? asset('storage/' . $vente->image) : asset('images/no-image.png') }}"
                                    class="img-fluid rounded-4 shadow-sm border"
                                    style="max-height: 200px; width: 100%; object-fit: cover;" alt="Produit">
                            </div>

                            <div class="col-md-8">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-uppercase small text-muted">Code
                                            article</label>
                                        <div class="form-control bg-light border-0 fw-bold">{{ $vente->code_article }}</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label
                                            class="form-label fw-semibold text-uppercase small text-muted">Désignation</label>
                                        <div class="form-control bg-light border-0">{{ $vente->designation }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-6 card-lg shadow-sm">
                    <div class="card-header border-bottom border-dashed bg-transparent">
                        <h5 class="mb-0">Tarification</h5>
                        <p class="mb-0 text-muted small">Récapitulatif financier</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-uppercase small text-muted">Quantité
                                    vendue</label>
                                <div class="form-control bg-light border-0 fw-bold">{{ $vente->quantite }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-uppercase small text-muted">Prix unitaire</label>
                                <div class="form-control bg-light border-0">
                                    {{ number_format($vente->prix_unitaire, 0, ',', ' ') }} FCFA
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-uppercase small text-muted">Prix total</label>
                                <div class="form-control bg-light border-0 fw-bold text-success fs-5">
                                    {{ number_format($vente->prix_total, 0, ',', ' ') }} FCFA
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               

            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteVente() {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "La suppression annulera la vente et restaurera le stock.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            })
        }
    </script>

@endsection
