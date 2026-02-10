@extends('admin.layout.navbar')
@section('title', 'Ajouter un bon de commande | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">

            <!-- ALERT SUCCESS -->
            @if(session('success'))
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

            <!-- HEADER -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Ajouter un bon de commande</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.bon.index') }}">Bons de commande</a></li>
                            <li class="breadcrumb-item active">Création</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <form action="{{ route('admin.bon.store') }}" method="POST">
                @csrf

                <!-- ================= INFOS BON ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Informations du bon de commande</h5>
                        <p class="mb-0 text-secondary">Détails du destinataire et du bon</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label class="form-label">ID du bon</label>
                                <input type="text" class="form-control"
                                    value="{{ 'BON-' . now()->format('YmdHis') }}" readonly>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Nom du destinataire</label>
                                <input type="text" name="destinataire"
                                    class="form-control @error('destinataire') is-invalid @enderror"
                                    placeholder="Nom complet" value="{{ old('destinataire') }}" required>
                                @error('destinataire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Date d'émission</label>
                                <input type="date" name="date_emission"
                                    class="form-control @error('date_emission') is-invalid @enderror"
                                    value="{{ old('date_emission', date('Y-m-d')) }}" required>
                                @error('date_emission')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="non_livre" {{ old('status') == 'non_livre' ? 'selected' : '' }}>Non livré</option>
                                    <option value="livre" {{ old('status') == 'livre' ? 'selected' : '' }}>Livré</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= AJOUT PRODUIT ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Ajouter un produit</h5>
                        <p class="mb-0 text-secondary">Détails du produit à inclure dans le bon</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label class="form-label">Désignation</label>
                                <input type="text" id="designation" class="form-control" placeholder="Nom du produit">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Quantité</label>
                                <input type="number" id="quantite" class="form-control" value="1" min="1">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Libellé</label>
                                <select id="libelle" class="form-select">
                                    <option value="pièce">Pièce</option>
                                    <option value="paquet">Paquet</option>
                                    <option value="carton">Carton</option>
                                    <option value="boîte">Boîte</option>
                                    <option value="litre">Litre</option>
                                    <option value="mètre">Mètre</option>
                                </select>
                            </div>

                            <div class="col-md-2 text-end">
                                <button type="button" class="btn btn-outline-primary mt-4" id="addProduct">
                                    + Ajouter
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= TABLE PRODUITS ================= -->
                <div class="card mb-6 card-lg">
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
                                    <!-- Les produits ajoutés apparaîtront ici -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer le bon</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- ================= SCRIPT AJOUT PRODUIT ================= -->
<script>
    const designationInput = document.getElementById('designation');
    const quantiteInput = document.getElementById('quantite');
    const libelleSelect = document.getElementById('libelle');
    const addProductBtn = document.getElementById('addProduct');
    const productsTable = document.getElementById('productsTable').getElementsByTagName('tbody')[0];

    addProductBtn.addEventListener('click', () => {
        const designation = designationInput.value.trim();
        const quantite = parseFloat(quantiteInput.value) || 0;
        const libelle = libelleSelect.value;

        if (!designation || quantite <= 0) {
            alert('Veuillez remplir correctement les champs du produit.');
            return;
        }

        const index = productsTable.rows.length;

        const row = productsTable.insertRow();
        row.innerHTML = `
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
        `;

        row.querySelector('button').addEventListener('click', () => row.remove());

        // Réinitialiser les champs
        designationInput.value = '';
        quantiteInput.value = 1;
        libelleSelect.value = 'pièce';
    });
</script>

@endsection
