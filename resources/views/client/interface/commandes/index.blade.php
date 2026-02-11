@extends('client.layouts.navbar')
@section('title', 'Historique de mes commandes')
@section('suite')

<div class="custom-container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-4 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-1 h2">Mes Commandes</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Historique des commandes</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="#!" class="btn btn-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Nouvelle commande
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form action="" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Recherche</label>
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="N° Commande, nom..." value="">
                            <span class="input-group-text bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Catégorie</label>
                        <select name="categorie" class="form-select">
                            <option value="">Toutes</option>
                            <option value="1">Matériaux</option>
                            <option value="2">Outillage</option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Statut Paiement</label>
                        <select name="pay_status" class="form-select">
                            <option value="">Tous</option>
                            <option value="paid">Payé</option>
                            <option value="pending">En attente</option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Statut Commande</label>
                        <select name="status" class="form-select">
                            <option value="">Tous</option>
                            <option value="shipped">Expédié</option>
                            <option value="progress">En cours</option>
                            <option value="cancel">Annulé</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">Filtrer</button>
                        <a href="" class="btn btn-outline-danger w-100">Réinitialiser</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                    <table class="table text-nowrap mb-0 table-centered table-hover">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th class="py-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                    </div>
                                </th>
                                <th class="py-3">ID Commande</th>
                                <th class="py-3">Client</th>
                                <th class="py-3">Date</th>
                                <th class="py-3">Paiement</th>
                                <th class="py-3">Total</th>
                                <th class="py-3">Statut</th>
                                <th class="py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td class="align-middle fw-bold"><a href="#">#KA-0017</a></td>
                                <td class="align-middle">Mountaga N'DIAYE</td>
                                <td class="align-middle">3 Oct, 2025 22:02</td>
                                <td class="align-middle">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3">Payé</span>
                                </td>
                                <td class="align-middle fw-bold">120.000 FCFA</td>
                                <td class="align-middle">
                                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill">Expédié</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm" title="Voir les détails">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-middle">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td class="align-middle fw-bold"><a href="#">#KA-0016</a></td>
                                <td class="align-middle">Seydou N'DIAYE</td>
                                <td class="align-middle">19 Août, 2025 18:22</td>
                                <td class="align-middle">
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3">En attente</span>
                                </td>
                                <td class="align-middle fw-bold">45.500 FCFA</td>
                                <td class="align-middle">
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill">En cours</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="#!" class="btn btn-light btn-sm rounded-circle border shadow-sm" title="Voir les détails">
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
    .btn-ghost:hover { background-color: rgba(0,0,0,0.05); }
    /* Style pour la scrollbar */
    .table-responsive::-webkit-scrollbar { width: 5px; height: 5px; }
    .table-responsive::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; }
</style>

@endsection