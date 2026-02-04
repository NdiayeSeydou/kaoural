@extends('superadmin.layout.navbar')
@section('title', 'Modifier un bon de commande | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-md-12 col-12">


                <!-- ALERT SUCCESS -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- ALERT ERRORS -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('superadmin.bon.update', $bon->public_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- INFOS BON -->
                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Informations du bon de commande</h5>
                        </div>
                        <div class="card-body px-6 py-5">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <label class="form-label">ID du bon</label>
                                    <input type="text" class="form-control" value="BON-{{ $bon->public_id }}" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Nom du destinataire</label>
                                    <input type="text" name="destinataire"
                                        class="form-control @error('destinataire') is-invalid @enderror"
                                        value="{{ old('destinataire', $bon->destinataire) }}" required>
                                    @error('destinataire')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Date d'émission</label>
                                    <input type="date" name="date_emission"
                                        class="form-control @error('date_emission') is-invalid @enderror"
                                        value="{{ old('date_emission', $bon->date_emission) }}" required>
                                    @error('date_emission')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror"
                                        required>
                                        <option value="non_livre"
                                            {{ old('status', $bon->status) == 'non_livre' ? 'selected' : '' }}>Non livré
                                        </option>
                                        <option value="livre"
                                            {{ old('status', $bon->status) == 'livre' ? 'selected' : '' }}>Livré</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- AJOUT PRODUIT -->
                    <div class="card mb-6 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Modifier ou ajouter des produits</h5>
                        </div>
                        <div class="card-body px-6 py-5">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Désignation</label>
                                    <input type="text" id="designation" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Quantité</label>
                                    <input type="number" id="quantite" class="form-control" value="1" min="1">
                                </div>
                                <div class="col-md-3 text-end">
                                    <button type="button" class="btn btn-outline-primary mt-4" id="addProduct">
                                        + Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TABLE PRODUITS -->
                    <div class="card mb-12 card-lg">
                        <div class="card-header border-bottom border-dashed">
                            <h5>Produits du bon de commande</h5>
                        </div>
                        <div class="card-body px-6 py-5">
                            <div class="table-responsive">
                                <table class="table table-centered mb-0" id="productsTable">
                                    <thead>
                                        <tr>
                                            <th>Désignation</th>
                                            <th>Quantité</th>
                                            <th>Libellé</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bon->produits as $index => $produit)
                                            <tr>
                                                <td>
                                                    <input type="text" name="produits[{{ $index }}][designation]"
                                                        class="form-control"
                                                        value="{{ old("produits.$index.designation", $produit->produit) }}"
                                                        style="min-width: 250px; width: 100%;" required>
                                                </td>
                                                <td>
                                                    <input type="number" name="produits[{{ $index }}][quantite]"
                                                        class="form-control"
                                                        value="{{ old("produits.$index.quantite", $produit->quantite) }}"
                                                        min="1" step="0.01" style="width: 100px;" required>
                                                </td>
                                                <td>
                                                    <input type="text" name="produits[{{ $index }}][libelle]"
                                                        class="form-control"
                                                        value="{{ old("produits.$index.libelle", $produit->libelle) }}"
                                                        style="min-width: 150px; width: 100%;" required>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-danger">Supprimer</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('superadmin.bon.index') }}" class="btn btn-outline-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Mettre à jour le bon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPT PRODUITS -->
    <script>
        const designationInput = document.getElementById('designation');
        const quantiteInput = document.getElementById('quantite');
        const addProductBtn = document.getElementById('addProduct');
        const productsTable = document.querySelector('#productsTable tbody');

        function refreshIndexes() {
            [...productsTable.rows].forEach((row, index) => {
                row.querySelectorAll('input').forEach(input => {
                    input.name = input.name.replace(/produits\[\d+\]/, `produits[${index}]`);
                });
            });
        }

        // Supprimer un produit
        productsTable.addEventListener('click', e => {
            if (e.target.tagName === 'BUTTON') {
                e.target.closest('tr').remove();
                refreshIndexes();
            }
        });

        // Ajouter un produit
        addProductBtn.addEventListener('click', () => {
            const designation = designationInput.value.trim();
            const quantite = parseFloat(quantiteInput.value);
            const libelle = 'pièce'; // Tu peux rendre dynamique si tu veux

            if (!designation || quantite <= 0) {
                alert('Veuillez remplir correctement les champs du produit.');
                return;
            }

            const index = productsTable.rows.length;
            productsTable.insertAdjacentHTML('beforeend', `
        <tr>
            <td>
                <input type="hidden" name="produits[${index}][designation]" value="${designation}">
                ${designation}
            </td>
            <td>
                <input type="hidden" name="produits[${index}][quantite]" value="${quantite}">
                ${quantite}
            </td>
            <td>
                <input type="hidden" name="produits[${index}][libelle]" value="${libelle}">
                ${libelle}
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button>
            </td>
        </tr>
    `);

            designationInput.value = '';
            quantiteInput.value = 1;
        });
    </script>

@endsection
