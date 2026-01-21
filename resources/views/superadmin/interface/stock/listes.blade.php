@extends('superadmin.layout.navbar')

@section('title', 'Listes des stocks | kaoural')

@section('suite')

    @if (session('stockajoutnew'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('stockajoutnew') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('stockupdt'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('stockupdt') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif



    @if (session('stockdel'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('stockdel') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('ajoutstockaancien'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('ajoutstockaancien') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Listes des stocks</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>

                                <li class="breadcrumb-item active"><a
                                        href="{{ route('superadmin.stock.index') }}">Stocks</a>
                                </li>

                            </ol>
                        </nav>

                    </div>
                    <div>
                        <div>
                            <a class="btn btn-dark d-md-flex align-items-center gap-2"
                                href="{{ route('superadmin.stock.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Ajouter un stock
                            </a>
                        </div>
                    </div>


                </div>


            </div>


            <!-- FILTRES & RECHERCHE -->
            <div class="card mb-5 shadow-sm">
                <div class="card-body">
                    <div class="row g-3 align-items-end">

                        <!-- Recherche -->


                        <!-- Filtre par date -->
                        <div class="col-lg-2 col-md-6 col-12">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" class="form-control">
                        </div>

                        <!-- Filtre par produit -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <label class="form-label fw-semibold">Produit</label>

                            <div class="input-group">


                                <input type="text" class="form-control" placeholder="Rechercher un produit">

                                <span class="input-group-text bg-white">
                                    <!-- Icône recherche -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8" />
                                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                    </svg>
                                </span>
                            </div>
                        </div>


                        <!-- Filtre par catégorie -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <label class="form-label fw-semibold">Catégorie</label>
                            <select class="form-select">
                                <option selected disabled>Choisir une catégorie</option>
                                <option>Accessoires</option>
                                <option>Électronique</option>
                                <option>Mode</option>
                            </select>
                        </div>

                        <!-- Bouton reset (optionnel UI) -->
                        <div class="col-lg-1 col-md-12 col-12 d-grid">
                            <button class="btn btn-outline-danger">
                                Réinitialiser
                            </button>
                        </div>

                    </div>
                </div>
            </div>


            <!-- BOUTONS BOUTIQUE / MAGASIN -->
            <div class="d-flex justify-content-center gap-3 mb-4">
                <button id="btnBoutique" class="btn btn-dark px-4">
                    Boutique
                </button>
                <button id="btnMagasin" class="btn btn-outline-dark px-4">
                    Magasin
                </button>
            </div>





            <div id="tableBoutique">

                <div class="table-responsive">


                    <table class="table table-centered text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Numérotation</th>
                                <th>Code article</th>
                                <th>Image</th>
                                <th>Désignation</th>
                                <th>Catégorie</th>
                                <th>Stock initial</th>
                                <th>Quantité entrée</th>
                                <th>Emplacement</th>
                                <th>Quantité sortie</th>
                                <th>Quantité restante</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($stocksBoutique as $index => $stock)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ $stock->code_article }}</td>
                                    <td>
                                        @if ($stock->image)
                                            <img src="{{ asset('storage/' . $stock->image) }}" class="rounded-3"
                                                width="56" height="56">
                                        @endif
                                    </td>


                                    <td>{{ ucwords($stock->designation) }}</td>


                                    <td>{{ $stock->categorie->name ?? '-' }}</td>

                                    <td>{{ $stock->stock_initial }}</td>

                                    <td>{{ $stock->quantite_entree }}</td>

                                    <td>
                                        {{ $stock->emplacement === 'boutique' ? 'Boutique' : '' }}
                                    </td>



                                    <td>{{ $stock->quantite_sortie }}</td>

                                    <td>{{ $stock->quantite_calculee }}</td>

                                    <td>
                                        @if ($stock->status === 'disponible')
                                            <span class="badge bg-success">Disponible</span>
                                        @elseif($stock->status === 'baisse')
                                            <span class="badge bg-warning">Stock en baisse</span>
                                        @else
                                            <span class="badge bg-danger">Rupture</span>
                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('superadmin.stock.show', $stock->public_id) }}"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                            data-template="viewOne">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                                width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 12a3 3 0 1 0 -6 0a3 3 0 0 0 6 0" />
                                                <path
                                                    d="M2 12c2.5 -4.5 6.5 -7 10 -7s7.5 2.5 10 7c-2.5 4.5 -6.5 7 -10 7s-7.5 -2.5 -10 -7" />
                                            </svg>
                                            <div id="viewOne" class="d-none">
                                                <span>Voir</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('superadmin.stock.edit', $stock->public_id) }}"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                            data-template="editOne"> <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                        </a>

                                        <form id="delete-form-{{ $stock->public_id }}"
                                            action="{{ route('superadmin.stock.supprimer', $stock->public_id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                onclick="confirmDelete('{{ $stock->public_id }}')"
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
                                        </form>





                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Aucun stock disponible en boutique
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>


                    </table>

                </div>

                <nav aria-label="Page navigation example" class="mt-4">
                    <ul class="pagination justify-content-center mb-0">
                        {{-- Lien précédent --}}
                        <li class="page-item {{ $stocksBoutique->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $stocksBoutique->previousPageUrl() }}">Précedent</a>
                        </li>

                        {{-- Pages --}}
                        @foreach ($stocksBoutique->getUrlRange(1, $stocksBoutique->lastPage()) as $page => $url)
                            <li class="page-item {{ $stocksBoutique->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- Lien suivant --}}
                        <li class="page-item {{ $stocksBoutique->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $stocksBoutique->nextPageUrl() }}">Suivant</a>
                        </li>
                    </ul>
                </nav>


            </div>

            <div id="tableMagasin" class="d-none">

                <div class="table-responsive">
                    <table class="table table-centered text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Numérotation</th>
                                <th>Code article</th>
                                <th>Image</th>
                                <th>Désignation</th>
                                <th>Catégorie</th>
                                <th>Stock initial</th>
                                <th>Quantité entrée</th>
                                <th>Emplacement</th>
                                <th>Quantité sortie</th>
                                <th>Quantité restante</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($stocksMagasin as $index => $stock)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ $stock->code_article }}</td>

                                    <td>
                                        @if ($stock->image)
                                            <img src="{{ asset('storage/' . $stock->image) }}" class="rounded-3"
                                                width="56" height="56">
                                        @endif
                                    </td>

                                    <td>{{ ucwords($stock->designation) }}</td>


                                    <td>{{ $stock->categorie->name ?? '-' }}</td>


                                    <td>{{ $stock->stock_initial }}</td>

                                    <td>{{ $stock->quantite_entree }}</td>

                                    <td>
                                        {{ $stock->emplacement === 'magasin' ? 'Magasin' : '' }}
                                    </td>



                                    <td>{{ $stock->quantite_sortie }}</td>

                                    <td>{{ $stock->quantite_restante }}</td>

                                    <td>
                                        @if ($stock->status === 'disponible')
                                            <span class="badge bg-success">Disponible</span>
                                        @elseif($stock->status === 'baisse')
                                            <span class="badge bg-warning">Stock en baisse</span>
                                        @else
                                            <span class="badge bg-danger">Rupture</span>
                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('superadmin.stock.show', $stock->public_id) }}"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                            data-template="viewOne">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-eye" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 12a3 3 0 1 0 -6 0a3 3 0 0 0 6 0" />
                                                <path
                                                    d="M2 12c2.5 -4.5 6.5 -7 10 -7s7.5 2.5 10 7c-2.5 4.5 -6.5 7 -10 7s-7.5 -2.5 -10 -7" />
                                            </svg>
                                            <div id="viewOne" class="d-none">
                                                <span>Voir</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('superadmin.stock.edit', $stock->public_id) }}"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                            data-template="editOne"> <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                        </a>

                                        <form id="delete-form-{{ $stock->public_id }}"
                                            action="{{ route('superadmin.stock.supprimer', $stock->public_id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                onclick="confirmDelete('{{ $stock->public_id }}')"
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
                                        </form>





                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Aucun stock disponible au magasin
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <nav aria-label="Page navigation example" class="mt-4">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item {{ $stocksMagasin->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $stocksMagasin->previousPageUrl() }}">Précedent</a>
                        </li>

                        @foreach ($stocksMagasin->getUrlRange(1, $stocksMagasin->lastPage()) as $page => $url)
                            <li class="page-item {{ $stocksMagasin->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <li class="page-item {{ $stocksMagasin->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $stocksMagasin->nextPageUrl() }}">Suivant</a>
                        </li>
                    </ul>
                </nav>


            </div>






        </div>


        <script>
            const btnBoutique = document.getElementById('btnBoutique');
            const btnMagasin = document.getElementById('btnMagasin');

            const tableBoutique = document.getElementById('tableBoutique');
            const tableMagasin = document.getElementById('tableMagasin');

            btnBoutique.addEventListener('click', () => {
                tableBoutique.classList.remove('d-none');
                tableMagasin.classList.add('d-none');

                btnBoutique.classList.add('btn-dark');
                btnBoutique.classList.remove('btn-outline-dark');

                btnMagasin.classList.add('btn-outline-dark');
                btnMagasin.classList.remove('btn-dark');
            });

            btnMagasin.addEventListener('click', () => {
                tableMagasin.classList.remove('d-none');
                tableBoutique.classList.add('d-none');

                btnMagasin.classList.add('btn-dark');
                btnMagasin.classList.remove('btn-outline-dark');

                btnBoutique.classList.add('btn-outline-dark');
                btnBoutique.classList.remove('btn-dark');
            });
        </script>



        <script>
            function confirmDelete(public_id) {
                Swal.fire({
                    title: 'Êtes-vous sûr de supprimer ce stock?',
                    text: "Cette action est irréversible !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + public_id).submit();
                    }
                });
            }
        </script>

        <script>
            function confirmDelete(public_id) {
                Swal.fire({
                    title: 'Êtes-vous sûr de supprimer ce stock?',
                    text: "Cette action est irréversible !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + public_id).submit();
                    }
                });
            }
        </script>




    @endsection
