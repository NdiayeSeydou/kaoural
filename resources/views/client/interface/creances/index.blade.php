@extends('client.layouts.navbar')
@section('title', 'Suivi de mes créances clients')
@section('suite')

<div class="custom-container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-4 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-1 h2">Gestion des Créances</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">État des dettes clients</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-primary text-white">
                <div class="card-body">
                    <h6 class="text-white-50">Total Créances</h6>
                    <h3 class="mb-0">2.450.000 FCFA</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-warning text-dark">
                <div class="card-body">
                    <h6 class="text-dark-50">En Retard</h6>
                    <h3 class="mb-0">850.000 FCFA</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-success text-white">
                <div class="card-body">
                    <h6 class="text-white-50">Recouvré ce mois</h6>
                    <h3 class="mb-0">1.200.000 FCFA</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form action="" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Rechercher un Client</label>
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Nom du client, N° facture..." value="">
                            <span class="input-group-text bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Niveau d'Urgence</label>
                        <select name="priority" class="form-select">
                            <option value="">Tous les niveaux</option>
                            <option value="high">Critique (Retard > 30j)</option>
                            <option value="medium">Modéré</option>
                            <option value="low">Normal</option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Statut</label>
                        <select name="status" class="form-select">
                            <option value="">Tous</option>
                            <option value="unpaid">Non Payé</option>
                            <option value="partial">Partiel</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-12 d-flex gap-2">
                        <button type="submit" class="btn btn-dark w-100">Appliquer</button>
                        <a href="" class="btn btn-outline-danger w-100">Réinitialiser</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="table-responsive" style="max-height: 500px;">
                    <table class="table text-nowrap mb-0 table-centered table-hover">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th class="py-3">Réf. Facture</th>
                                <th class="py-3">Client</th>
                                <th class="py-3">Date Échéance</th>
                                <th class="py-3">Montant Total</th>
                                <th class="py-3">Reste à Payer</th>
                                <th class="py-3">Statut</th>
                                <th class="py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle fw-bold">#FAC-2025-042</td>
                                <td class="align-middle">Entreprise BTP - Traoré</td>
                                <td class="align-middle text-danger fw-bold">10 Fév, 2026</td>
                                <td class="align-middle">1.500.000 FCFA</td>
                                <td class="align-middle text-danger">500.000 FCFA</td>
                                <td class="align-middle">
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3">En retard</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm" title="Détails du paiement">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-middle fw-bold">#FAC-2025-058</td>
                                <td class="align-middle">M. Abdoulaye Koné</td>
                                <td class="align-middle">25 Fév, 2026</td>
                                <td class="align-middle">250.000 FCFA</td>
                                <td class="align-middle text-warning">250.000 FCFA</td>
                                <td class="align-middle">
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3">Partiel</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm" title="Détails du paiement">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </a>
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
    .card { transition: transform 0.2s; }
    .card:hover { transform: translateY(-2px); }
    .table-responsive::-webkit-scrollbar { width: 5px; height: 5px; }
    .table-responsive::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; }
</style>

@endsection