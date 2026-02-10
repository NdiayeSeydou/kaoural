@extends('admin.layout.navbar')
@section('title', 'Ajouter un stock | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-12">

                <!-- HEADER -->
                <div class="mb-6 d-flex justify-content-between align-items-center">
                    <h1 class="h2">Ajouter un stock</h1>
                    <a class="btn btn-dark" href="{{ route('admin.stock.index') }}">
                        Retour à la liste
                    </a>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.stock.index') }}">Stocks</a></li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </nav>

                <!-- ================== NOUVEAU PRODUIT ================== -->
                <form action="{{ route('admin.stock.nouveau') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-5">
                        <h3>Nouveau produit</h3>

                        <div class="row g-4">

                            <div class="col-md-6">
                                <label class="form-label">Code produit</label>
                                <input type="text" class="form-control" readonly placeholder="Généré automatiquement">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Nom du produit</label>
                                <input type="text" name="designation"
                                    class="form-control @error('designation') is-invalid @enderror"
                                    value="{{ old('designation') }}" required>
                                @error('designation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Catégorie</label>
                                <select name="categorie_id" class="form-select @error('categorie_id') is-invalid @enderror"
                                    required>
                                    <option value="">-- Choisir une catégorie --</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"
                                            {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                            {{ $categorie->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Emplacement</label>
                                <select name="emplacement" class="form-select @error('emplacement') is-invalid @enderror"
                                    required>
                                    <option value="boutique" {{ old('emplacement') == 'boutique' ? 'selected' : '' }}>
                                        Boutique
                                    </option>
                                    <option value="magasin" {{ old('emplacement') == 'magasin' ? 'selected' : '' }}>
                                        Magasin
                                    </option>
                                </select>
                                @error('emplacement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Quantité</label>
                                <input type="number" step="0.01" min="0.01" id="stock_initial" name="stock_initial"
                                    class="form-control @error('stock_initial') is-invalid @enderror"
                                    value="{{ old('stock_initial') }}" placeholder="Ex : 2,5">
                                @error('stock_initial')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Prix unitaire</label>
                                <input type="number" step="0.01" min="0" id="prix_unitaire" name="prix_unitaire"
                                    class="form-control @error('prix_unitaire') is-invalid @enderror"
                                    value="{{ old('prix_unitaire', 0) }}">
                                @error('prix_unitaire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Fournisseur</label>
                                <select name="fournisseur_id"
                                    class="form-select @error('fournisseur_id') is-invalid @enderror" required>
                                    <option value="">-- Choisir un fournisseur --</option>
                                    @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{ $fournisseur->id }}"
                                            {{ old('fournisseur_id') == $fournisseur->id ? 'selected' : '' }}>
                                            {{ $fournisseur->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('fournisseur_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Date d'ajout</label>
                                <input type="date" name="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date', date('Y-m-d')) }}" required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image du produit</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Prix total</label>
                                <input type="number" id="prix_total" class="form-control bg-light" readonly>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-success">
                                    Enregistrer nouveau produit
                                </button>
                            </div>

                        </div>
                    </div>
                </form>

                <!-- ================== ANCIEN STOCK ================== -->
                <div class="mb-5">
                    <h3>Ancien stock</h3>

                    <div class="card">
                        <div class="card-header">Ajouter un article</div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('admin.stock.ancien') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Rechercher un article</label>
                                    <select id="article_select" class="form-control" style="width:100%"></select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Désignation</label>
                                    <input type="text" id="designation" class="form-control" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Code article</label>
                                    <input type="text" id="code_article" name="code_article" class="form-control"
                                        readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Fournisseur</label>
                                    <select name="fournisseur_id" class="form-control">
                                        @foreach ($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->public_id }}">
                                                {{ $fournisseur->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Quantité</label>
                                    <input type="number" step="0.01" min="0.01" name="quantite"
                                        class="form-control" placeholder="Ex : 1,5">
                                </div>

                                <div class="text-end">
                                    <button class="btn btn-primary">Enregistrer</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ================== JS ================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const q = document.getElementById('stock_initial');
            const p = document.getElementById('prix_unitaire');
            const t = document.getElementById('prix_total');

            function normalize(v) {
                return parseFloat(v.replace(',', '.')) || 0;
            }

            function calc() {
                t.value = (normalize(q.value) * normalize(p.value)).toFixed(0);
            }

            q.addEventListener('input', calc);
            p.addEventListener('input', calc);
            calc();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#article_select').select2({
                placeholder: 'Tapez le code ou la désignation',
                minimumInputLength: 1,
                ajax: {
                    url: '{{ route('superadmin.stock.search') }}',
                    dataType: 'json',
                    delay: 300,
                    data: params => ({
                        q: params.term
                    }),
                    processResults: data => ({
                        results: data
                    })
                }
            });

            $('#article_select').on('select2:select', function(e) {
                $('#designation').val(e.params.data.designation);
                $('#code_article').val(e.params.data.code_article);
            });
        });
    </script>

@endsection
