@extends('superadmin.layout.navbar')
@section('title', 'Détails du stock | kaoural')
@section('suite')


    @if (session('edithistory'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('edithistory') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('historydel') || session('enrtydel'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('historydel') ?? session('enrtydel') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 col-12">

                <!-- HEADER -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Détails du stock</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.stock.index') }}">Stocks</a></li>
                                <li class="breadcrumb-item active">Détails</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-2">
                        <a class="btn btn-dark" href="{{ route('superadmin.stock.index') }}">
                            Retour à la liste
                        </a>
                    </div>
                </div>

                <!-- ================= INFOS STOCK ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Informations du stock</h5>
                        <p class="mb-0 text-secondary">Détails généraux du produit</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nom du produit</label>
                                <div class="form-control bg-light">{{ $stock->designation }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Emplacement</label>
                                <div class="form-control bg-light">{{ $stock->emplacement }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Code produit</label>
                                <div class="form-control bg-light">{{ $stock->code_article }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Quantité en stock restants</label>
                                <div class="form-control bg-light">{{ $stock->quantite_restante }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Categories</label>
                                <div class="form-control bg-light">{{ $stock->categorie->name ?? '-' }}</div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= IMAGE PRODUIT ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Image du produit</h5>
                    </div>

                    <div class="card-body px-6 py-5 text-center">
                        @if ($stock->image)
                            <img src="{{ asset('storage/' . $stock->image) }}" class="img-fluid rounded-4 shadow-sm w-100"
                                style="max-height: 350px; object-fit: contain;" alt="{{ $stock->designation }}">
                        @else
                            <div class="text-muted">Aucune image disponible</div>
                        @endif
                    </div>


                </div>

                <!-- ================= TARIFICATION / DETAILS ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Détails financiers</h5>
                        <p class="mb-0 text-secondary">Valeur du stock</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Prix unitaire</label>
                                <div class="form-control bg-light"> {{ number_format($stock->prix_unitaire, 0, ',', ' ') }}
                                    FCFA
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Valeur totale</label>
                                <div class="form-control bg-light fw-bold text-success">
                                    {{ number_format($stock->quantite_restante * $stock->prix_unitaire, 0, ',', ' ') }}
                                    FCFA


                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Dernière mise à jour</label>
                                <div class="form-control bg-light">{{ $stock->date_formatee }}</div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= HISTORIQUE DES ENTRÉES ================= -->
                <div class="card mb-6 card-lg">
                    <div class="card-header border-bottom border-dashed">
                        <h5>Historique des entrées</h5>
                        <p class="mb-0 text-secondary">Suivi des ajouts au stock</p>
                    </div>

                    <div class="card-body px-6 py-5">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Quantité ajoutée</th>
                                        <th>Emplacement</th>
                                        <th>Nom du fourniseur</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($histories as $index => $history)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>

                                            <td>{{ $history->date_formatee }}</td>


                                            <td>{{ $history->quantite_entree }}</td>

                                            <td>{{ ucfirst($history->emplacement) }}</td>

                                            <td>{{ $history->fournisseur->name }}</td>

                                            <td>


                                                <a href="{{ route('superadmin.stock.history.edit', $history->public_id) }}"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                    data-template="editOne"> <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                                </a>


                                                <a href="javascript:void(0);"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                    onclick="confirmDelete('{{ $history->public_id }}')"
                                                    data-template="trashTwo">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                    <div id="trashTwo" class="d-none"><span>Supprimer</span></div>
                                                </a>







                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Aucune entrée enregistrée pour ce
                                                produit.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation example" class="mt-4">
                                <ul class="pagination justify-content-center mb-0">
                                    {{-- Lien précédent --}}
                                    <li class="page-item {{ $histories->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $histories->previousPageUrl() }}">Précedent</a>
                                    </li>

                                    {{-- Pages --}}
                                    @foreach ($histories->getUrlRange(1, $histories->lastPage()) as $page => $url)
                                        <li class="page-item {{ $histories->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Lien suivant --}}
                                    <li class="page-item {{ $histories->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $histories->nextPageUrl() }}">Suivant</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>



                </div>

                <!-- ACTIONS -->

            </div>
        </div>
    </div>

    <script>
        function confirmDelete(public_id) {
            Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer cette entrée de stock ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = "{{ route('superadmin.stock.history.destroy', ':id') }}".replace(':id', public_id);

                    const form = document.createElement('form');
                    form.action = url;
                    form.method = 'POST';

                    const token = document.createElement('input');
                    token.type = 'hidden';
                    token.name = '_token';
                    token.value = '{{ csrf_token() }}';
                    form.appendChild(token);

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';
                    form.appendChild(method);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>


@endsection
