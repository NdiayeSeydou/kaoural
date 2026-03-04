@extends('superadmin.layout.navbar')
@section('title', 'Modifier une commande | Kaoural')

@section('suite')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0 text-gray-800 fw-bold">Modifier le Statut</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mt-2">
                            <li class="breadcrumb-item"><a href="{{ route('superadmin.order.index') }}"
                                    class="text-decoration-none">Commandes</a></li>
                            <li class="breadcrumb-item active">Mise à jour</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('superadmin.order.index') }}" class="btn btn-dark shadow-sm rounded-pill px-4">
                    <i class="fa fa-chevron-left me-2 small"></i> Retour
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">

                        <div class="text-center mb-4">
                            <div class="icon-circle bg-light mb-3 mx-auto">
                                <i class="fa fa-shopping-bag text-primary fa-2x"></i>
                            </div>
                            <h4 class="fw-bold">Commande #{{ $commande->public_id }}</h4>
                            <p class="text-muted">Client : <span
                                    class="text-dark fw-medium">{{ $commande->nom_client }}</span></p>
                        </div>

                        <div class="alert alert-info border-0 rounded-3 small mb-4">
                            <i class="fa fa-info-circle me-2"></i>
                            La mise à jour du statut permet de suivre l'état d'avancement du colis.
                        </div>

                        <form action="{{ route('superadmin.orders.updateStatus', $commande->public_id) }}" method="POST"
                            id="statusForm">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-4">
                                <label class="form-label text-uppercase small fw-bold text-muted mb-2">Statut Actuel :
                                    <span
                                        class="badge bg-soft-primary ms-2">{{ ucfirst(str_replace('_', ' ', $commande->statut)) }}</span>
                                </label>

                                <div class="custom-select-wrapper position-relative">
                                    <select name="statut" class="form-select form-select-lg border-2" id="statutSelect"
                                        style="border-radius: 12px;">
                                        <option value="en attente"
                                            {{ $commande->statut == 'en attente' ? 'selected' : '' }}>En attente 
                                            </option>
                                        <option value="validee" {{ $commande->statut == 'validee' ? 'selected' : '' }}>
                                            Commande Validée</option>
                                        <option value="en cours" {{ $commande->statut == 'en cours' ? 'selected' : '' }}>
                                            Expédition en cours</option>
                                        <option value="livree" {{ $commande->statut == 'livree' ? 'selected' : '' }}>
                                            Colis Livré</option>
                                        <option value="annulee" {{ $commande->statut == 'annulee' ? 'selected' : '' }}>
                                            Commande Annulée</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid pt-3">
                                <button type="button" class="btn btn-primary btn-lg shadow rounded-3 py-3 fw-bold"
                                    onclick="confirmStatusUpdate()">
                                    <i class="fa fa-check-circle me-2"></i> Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmStatusUpdate() {
            Swal.fire({
                title: 'Mettre à jour ?',
                text: "Le nouveau statut sera immédiatement visible par le client.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4e73df', 
                cancelButtonColor: '#858796',
                confirmButtonText: 'Oui, confirmer',
                cancelButtonText: 'Annuler',
                background: '#fff',
                borderRadius: '15px'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('statusForm').submit();
                }
            })
        }
    </script>


@endsection
