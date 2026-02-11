@extends('client.layouts.navbar')
@section('title', 'Gestion de mes devis')
@section('suite')

<div class="custom-container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-4 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-1 h2">Mes Devis</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des devis générés</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="#!" class="btn btn-primary shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                        Créer un nouveau devis
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form action="" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Rechercher</label>
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="N° Devis, nom du client..." value="">
                            <span class="input-group-text bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Validité</label>
                        <select name="validite" class="form-select">
                            <option value="">Toutes</option>
                            <option value="active">En cours de validité</option>
                            <option value="expired">Expirés</option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Statut</label>
                        <select name="status" class="form-select">
                            <option value="">Tous</option>
                            <option value="pending">En attente</option>
                            <option value="accepted">Accepté</option>
                            <option value="rejected">Refusé</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-12 d-flex gap-2">
                        <button type="submit" class="btn btn-dark w-100">Filtrer</button>
                        <a href="" class="btn btn-outline-secondary w-100">Vider</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="table-responsive" style="max-height: 550px;">
                    <table class="table text-nowrap mb-0 table-centered table-hover">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th class="py-3">N° Devis</th>
                                <th class="py-3">Client</th>
                                <th class="py-3">Date d'émission</th>
                                <th class="py-3">Date d'expiration</th>
                                <th class="py-3">Montant Total</th>
                                <th class="py-3">Statut</th>
                                <th class="py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle fw-bold">#DEV-2026-001</td>
                                <td class="align-middle">Moussa Camara</td>
                                <td class="align-middle">10 Fév, 2026</td>
                                <td class="align-middle">25 Fév, 2026</td>
                                <td class="align-middle fw-bold">750.000 FCFA</td>
                                <td class="align-middle">
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3">En attente</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm action-btn" title="Voir le devis">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </a>
                                        <button type="button" class="btn btn-light btn-sm rounded-circle border shadow-sm action-btn" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce devis ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-middle fw-bold">#DEV-2026-002</td>
                                <td class="align-middle">Fatoumata Keïta</td>
                                <td class="align-middle">08 Fév, 2026</td>
                                <td class="align-middle text-danger">Expiré</td>
                                <td class="align-middle fw-bold">1.200.000 FCFA</td>
                                <td class="align-middle">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3">Accepté</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </a>
                                        <button type="button" class="btn btn-light btn-sm rounded-circle border shadow-sm action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-container { padding: 0 15px; width: 100%; }
    .table-centered td, .table-centered th { vertical-align: middle; }
    .sticky-top { top: 0; z-index: 10; }
    .badge { font-weight: 500; }
    .action-btn { transition: all 0.2s; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; }
    .action-btn:hover { transform: scale(1.1); background-color: #fff; }
    .table-responsive::-webkit-scrollbar { width: 5px; height: 5px; }
    .table-responsive::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; }
    .btn-primary { background-color: #FFD700; border-color: #FFD700; color: #000; font-weight: bold; }
    .btn-primary:hover { background-color: #e6c200; border-color: #e6c200; color: #000; }
</style>

@endsection