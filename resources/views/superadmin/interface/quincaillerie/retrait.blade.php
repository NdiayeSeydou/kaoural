@extends('superadmin.layout.navbar')
@section('title', 'Retrait de produits | kaoural')
@section('suite')

    <div class="custom-container">

        <!-- ================= TITRE ================= -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Retrait de produits</h3>

        </div>

        <!-- ================= FORMULAIRE ================= -->
        <form action="#" method="POST">
            @csrf

            <!-- ================= QUINCAILLERIE ================= -->
          <div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
        <h5 class="mb-4 d-flex align-items-center">
            <i class="bi bi-info-circle me-2 text-primary"></i> Informations générales
        </h5>

        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Quincaillerie</label>
                <input type="text" class="form-control bg-light" value="Quincaillerie La Paix" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Date du retrait</label>
                <input type="date" class="form-control" value="2026-01-15" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Type de retrait (Statut)</label>
                <select class="form-select border-primary-subtle" required>
                    <option value="" selected disabled>Choisir le statut...</option>
                    <option value="bon">Avec Bon de commande</option>
                    <option value="sans_bon text-danger">Sans Bon (Retrait direct)</option>
                </select>
            </div>
        </div>
    </div>
</div>



            <!-- ================= PRODUITS ================= -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-centered text-nowrap mb-0" id="tableRetrait">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code article</th>
                                    <th>Image</th>
                                    <th>Désignation</th>
                                    <th>Quantité</th>
                                    <th>Prix unitaire</th>
                                    <th>Emplacement</th>
                                    <th>Prix total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="index">1</td>

                                    <td>
                                        <input type="text" class="form-control form-control-sm" placeholder="205">
                                    </td>

                                    <td>
                                        <input type="file" class="form-control form-control-sm">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Désignation">
                                    </td>

                                    <td>
                                        <input type="number" min="1" class="form-control form-control-sm qty"
                                            value="1">
                                    </td>

                                    <td>
                                        <input type="number" class="form-control form-control-sm price" placeholder="2700">
                                    </td>

                                    <td>
                                        <select class="form-select form-select-sm">
                                            <option>Boutique</option>
                                            <option>Magasin</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control form-control-sm bg-light total"
                                            value="0 FCFA" readonly>
                                    </td>

                                    <td>
                                        <button type="button"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle btn-delete">
                                            <!-- ICON DELETE -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- BOUTON AJOUT -->
                    <div class="mt-3">
                        <button type="button" class="btn btn-primary" id="addRow">
                            <i class="bi bi-plus-circle"></i> Ajouter un produit
                        </button>
                    </div>


                </div>
            </div>

            <!-- ================= ACTIONS ================= -->
            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Valider le retrait
                </button>
            </div>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const tableBody = document.querySelector('#tableRetrait tbody');
            const addRowBtn = document.getElementById('addRow');

            // ===== Calcul prix total =====
            function calculateTotal(row) {
                const qty = row.querySelector('.qty').value || 0;
                const price = row.querySelector('.price').value || 0;
                const total = qty * price;
                row.querySelector('.total').value = total.toLocaleString() + ' FCFA';
            }

            // ===== Mise à jour numérotation =====
            function updateIndexes() {
                document.querySelectorAll('.index').forEach((el, i) => {
                    el.textContent = i + 1;
                });
            }

            // ===== Ajout nouvelle ligne =====
            addRowBtn.addEventListener('click', function() {
                const newRow = tableBody.rows[0].cloneNode(true);

                newRow.querySelectorAll('input').forEach(input => {
                    input.value = '';
                });

                newRow.querySelector('.qty').value = 1;
                newRow.querySelector('.total').value = '0 FCFA';

                tableBody.appendChild(newRow);
                updateIndexes();
            });

            // ===== Events dynamiques =====
            tableBody.addEventListener('input', function(e) {
                const row = e.target.closest('tr');
                if (e.target.classList.contains('qty') || e.target.classList.contains('price')) {
                    calculateTotal(row);
                }
            });

            // ===== Suppression ligne =====
            tableBody.addEventListener('click', function(e) {
                if (e.target.closest('.btn-delete')) {
                    if (tableBody.rows.length > 1) {
                        e.target.closest('tr').remove();
                        updateIndexes();
                    }
                }
            });

        });
    </script>


@endsection
