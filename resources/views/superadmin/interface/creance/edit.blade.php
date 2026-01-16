@extends('superadmin.layout.navbar')
@section('title', 'Modifier un client | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-10 col-12">

            <!-- ================= HEADER ================= -->
            <div class="mb-6 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-2 h2">Modifier le client</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('superadmin.dashboard') }}">Accueil</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Clients</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Modifier un client
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- ================= FORMULAIRE ================= -->
            <form action="#" method="POST">
                @csrf
                @method('PUT')

                <div class="card card-lg shadow-sm">

                    <!-- HEADER CARD -->
                    <div class="card-header border-bottom border-dashed py-4">
                        <h5 class="mb-0">Informations Générales du client</h5>
                    </div>

                    <!-- BODY -->
                    <div class="card-body p-6">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label class="form-label fw-bold">ID Client</label>
                                <input type="text"
                                    name="id_client"
                                    class="form-control bg-light"
                                    value="CLI-001"
                                    readonly>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label fw-bold">Nom du client</label>
                                <input type="text"
                                    name="nom_client"
                                    class="form-control"
                                    value="Jean Dupont"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Numéro de téléphone</label>
                                <input type="tel"
                                    name="telephone"
                                    class="form-control"
                                    value="+221 77 123 45 67"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Adresse</label>
                                <input type="text"
                                    name="adresse"
                                    class="form-control"
                                    value="Dakar, Plateau"
                                    required>
                            </div>

                        </div>
                    </div>

                    <!-- FOOTER -->
                    <div class="card-footer bg-transparent border-top-0 px-6 py-4">
                        <div class="d-flex justify-content-end gap-2">

                            <a href="#" class="btn btn-outline-secondary px-4">
                                Annuler
                            </a>

                            <button type="submit" class="btn btn-primary px-4">
                                Mettre à jour le client
                            </button>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

@endsection
