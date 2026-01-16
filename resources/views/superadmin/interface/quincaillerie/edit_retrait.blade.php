@extends('superadmin.layout.navbar')
@section('title', 'Modifier produit retiré | kaoural')
@section('suite')

<div class="custom-container">

    <div class="mb-5 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="mb-1">Modifier le produit retiré</h2>
            <p class="text-muted mb-0">
                Ajustez la quantité ou les informations du bon de retrait.
            </p>
        </div>
    
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom border-dashed">
            <div class="d-flex align-items-center">
              
                <h5 class="mb-0">Détails de la ligne de retrait</h5>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table align-middle table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 15%;">Code Article</th>
                            <th style="width: 35%;">Désignation</th>
                            <th style="width: 15%;">Quantité</th>
                            <th style="width: 15%;">Prix Unitaire (FCFA)</th>
                            <th style="width: 20%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control bg-light fw-bold" value="#P-90" readonly>
                            </td>

                            <td>
                                <input type="text" class="form-control" value="Ciment CPJ 45">
                            </td>

                            <td>
                                <input type="number" class="form-control fw-bold text-primary qty" value="5" min="1">
                            </td>

                            <td>
                                <input type="number" class="form-control price" value="90000">
                            </td>

                            <td>
                                <input type="text" class="form-control bg-light fw-bold total" value="450 000 FCFA" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-5">
                <a href="javascript:history.back()" class="btn btn-outline-secondary px-4">
                    Annuler
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    Enregistrer les modifications
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-soft-primary { background-color: #e7f0ff; }
    .icon-shape { width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; }
    .form-control:focus { border-color: #0d6efd; box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .10); }
    .table-nowrap th, .table-nowrap td { white-space: nowrap; }
</style>

@endsection