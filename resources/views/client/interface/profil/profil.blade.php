@extends('client.layouts.navbar')
@section('title', 'Mon Profil - Kaoural')
@section('suite')

    <div class="custom-container mt-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center py-5">
                        <div class="position-relative d-inline-block mb-3">
                            <img src="{{ asset('kaoural/img/user-avatar.png') }}" alt="Avatar"
                                class="rounded-circle border border-4 border-white shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover;">
                            <span
                                class="position-absolute bottom-0 end-0 bg-success border border-white border-3 rounded-circle"
                                style="width: 20px; height: 20px;" title="Compte Actif"></span>
                        </div>
                        <h4 class="mb-0 fw-bold">Mountaga N'DIAYE</h4>
                        <p class="text-muted small mb-3">Client depuis Janvier 2025</p>
                        <span
                            class="badge bg-primary-subtle text-primary border border-primary-subtle px-4 py-2 rounded-pill">Client
                            Premium</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <h5 class="mb-0 fw-bold text-primary">12</h5>
                            <p class="text-muted small mb-0">Commandes</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <h5 class="mb-0 fw-bold text-warning">03</h5>
                            <p class="text-muted small mb-0">Devis actifs</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 fw-bold">Informations Personnelles</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Prénom & Nom</label>
                                    <input type="text" class="form-control bg-light" value="Mountaga N'DIAYE">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Adresse Email</label>
                                    <input type="email" class="form-control bg-light" value="mountaga@kaoural.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Téléphone</label>
                                    <input type="text" class="form-control bg-light" value="+223 00 00 00 00">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Ville</label>
                                    <input type="text" class="form-control bg-light" value="Bamako">
                                </div>
                                <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4 fw-bold">Mettre à jour le
                                        profil</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 fw-bold">Sécurité</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold small">Ancien mot de passe</label>
                                    <input type="password" class="form-control bg-light">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold small">Nouveau mot de passe</label>
                                    <input type="password" class="form-control bg-light">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold small">Confirmer le mot de passe</label>
                                    <input type="password" class="form-control bg-light">
                                </div>
                                <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-outline-dark px-4 fw-bold">Changer mon mot de
                                        passe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-container {
            padding: 0 15px;
            width: 100%;
        }

        .card {
            border-radius: 15px;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid transparent;
        }

        .form-control:focus {
            background-color: #fff !important;
            border-color: #FFD700;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #FFD700;
            border: none;
            color: #000;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #e6c200;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        .bg-primary-subtle {
            background-color: rgba(255, 215, 0, 0.1) !important;
        }

        .text-primary {
            color: #d4af37 !important;
        }
    </style>

@endsection
