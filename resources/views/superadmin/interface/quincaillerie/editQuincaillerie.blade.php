@extends('superadmin.layout.navbar')
@section('title', 'Modifier une quincaillerie | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-10 col-12">

            <!-- ================= HEADER ================= -->
            <div class="mb-6 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-2 h2">Modifier la quincaillerie</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('superadmin.dashboard') }}">Accueil</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('superadmin.quincaillerie.index') }}">
                                    Quincailleries partenaires
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Modifier un partenaire
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
                        <h5 class="mb-0">Informations Générales</h5>
                    </div>

                    <!-- BODY -->
                    <div class="card-body p-6">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label class="form-label fw-bold">ID Quincaillerie</label>
                                <input type="text"
                                    name="id_quincaillerie"
                                    class="form-control bg-light"
                                    value="QUIN-8842"
                                    readonly>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label fw-bold">Nom de la quincaillerie</label>
                                <input type="text"
                                    name="nom_quincaillerie"
                                    class="form-control"
                                    value="Quincaillerie Moderne du Centre"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Numéro de téléphone</label>
                                <input type="tel"
                                    name="telephone"
                                    class="form-control"
                                    value="+223 70 00 00 00"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Adresse</label>
                                <input type="text"
                                    name="adresse"
                                    class="form-control"
                                    value="Bamako, Hamdallaye ACI"
                                    required>
                            </div>

                        </div>
                    </div>

                    <!-- FOOTER -->
                    <div class="card-footer bg-transparent border-top-0 px-6 py-4">
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('superadmin.quincaillerie.index') }}"
                                class="btn btn-outline-secondary px-4">
                                Annuler
                            </a>

                            <button type="submit"
                                class="btn btn-primary px-4">
                                Mettre à jour la quincaillerie
                            </button>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

@endsection
