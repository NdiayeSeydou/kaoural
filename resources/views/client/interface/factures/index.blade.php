@extends('client.layouts.navbar')
@section('title', 'Mes Factures - Kaoural')
@section('suite')

<div class="custom-container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-4 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-1 h2">Mes Factures</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Historique des factures</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Tout télécharger
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form action="" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">N° de Facture</label>
                        <input type="text" name="invoice_no" class="form-control" placeholder="Ex: FAC-001..." value="">
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Période</label>
                        <select name="period" class="form-select">
                            <option value="">Toute la période</option>
                            <option value="month">Ce mois-ci</option>
                            <option value="year">Cette année</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">État du paiement</label>
                        <select name="status" class="form-select">
                            <option value="">Tous les états</option>
                            <option value="paid">Payé</option>
                            <option value="unpaid">Impayé</option>
                            <option value="partial">Partiel</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">Filtrer</button>
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
                                <th class="py-3">N° Facture</th>
                                <th class="py-3">Date d'émission</th>
                                <th class="py-3">Mode de paiement</th>
                                <th class="py-3">Montant TTC</th>
                                <th class="py-3">Statut</th>
                                <th class="py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle fw-bold">#FAC-2026-102</td>
                                <td class="align-middle">11 Fév, 2026</td>
                                <td class="align-middle">Orange Money</td>
                                <td class="align-middle fw-bold">150.000 FCFA</td>
                                <td class="align-middle">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3">Payé</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm action-btn" title="Télécharger PDF">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                        </a>
                                        <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm action-btn" title="Voir les détails">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-middle fw-bold">#FAC-2026-098</td>
                                <td class="align-middle">05 Fév, 2026</td>
                                <td class="align-middle">Virement Bancaire</td>
                                <td class="align-middle fw-bold">450.000 FCFA</td>
                                <td class="align-middle">
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3">Impayé</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-success btn-sm px-3 rounded-pill fw-bold">Payer</button>
                                        <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                                        </a>
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
    .badge { font-weight: 500; font-size: 0.85rem; }
    .action-btn { transition: all 0.2s; width: 34px; height: 34px; display: flex; align-items: center; justify-content: center; }
    .action-btn:hover { background-color: #f8f9fa; transform: translateY(-2px); }
    /* Personnalisation bouton Payer */
    .btn-success { background-color: #28a745; border: none; font-size: 0.8rem; }
    .btn-success:hover { background-color: #218838; }
    /* Style scrollbar */
    .table-responsive::-webkit-scrollbar { width: 5px; height: 5px; }
    .table-responsive::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; }
    .btn-primary { background-color: #FFD700; border-color: #FFD700; color: #000; font-weight: bold; }
    .btn-primary:hover { background-color: #e6c200; border-color: #e6c200; color: #000; }
</style>

@endsection