@extends('superadmin.layout.navbar')
@section('title', 'Listes des fournisseurs | kaoural')
@section('suite')

    @if (session('ajoutfourn'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('ajoutfourn') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('fourjour'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('fourjour') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('fourdel'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('fourdel') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


     @if (session('error'))
        <div class="alert alert-danger  alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif



    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Listes des fournisseurs</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>


                                <li class="breadcrumb-item active"><a
                                        href="{{ route('superadmin.fournisseur.index') }}">Fournisseurs</a>
                                </li>

                            </ol>
                        </nav>

                    </div>
                    <div>
                        <div>
                            <a class="btn btn-dark d-md-flex align-items-center gap-2"
                                href="{{ route('superadmin.fournisseur.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Ajouter un fournisseur
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
                            <label class="form-label fw-semibold">Numero de télephone</label>
                            <input type="number" class="form-control">
                        </div>

                        <!-- Filtre par produit -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <label class="form-label fw-semibold">Fournisseur</label>

                            <div class="input-group">


                                <input type="text" class="form-control" placeholder="Rechercher un fournisseur">

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








            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-centered text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Numérotation</th>
                                <th>Nom du fournisseur</th>
                                <th>Adresse</th>
                                <th>Numero de télephone</th>
                                <th>Catégorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fournisseurs as $index => $fournisseur)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ ucwords($fournisseur->name) }}</td>


                                    <td>{{ $fournisseur->adresse }}</td>

                                    <td>{{ $fournisseur->telephone_formatte }}</td>


                                    <td>{{ $fournisseur->categorie->name ?? '__' }}</td>

                                    <td>

                                        <a href="{{ route('superadmin.fournisseur.show', $fournisseur->public_id) }}"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                            data-template="viewOne-{{ $fournisseur->public_id }}">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                                width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 12a3 3 0 1 0 -6 0a3 3 0 0 0 6 0" />
                                                <path
                                                    d="M2 12c2.5 -4.5 6.5 -7 10 -7s7.5 2.5 10 7c-2.5 4.5 -6.5 7 -10 7s-7.5 -2.5 -10 -7" />
                                            </svg>

                                            <div id="viewOne-{{ $fournisseur->public_id }}" class="d-none">
                                                <span>Details</span>
                                            </div>
                                        </a>

                                        <a href="{{ route('superadmin.fournisseur.edit', $fournisseur->public_id) }}"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                            data-template="editOne-{{ $fournisseur->public_id }}">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>

                                            <div id="editOne-{{ $fournisseur->public_id }}" class="d-none">
                                                <span>Modifier</span>
                                            </div>
                                        </a>


                                        <a href="#!"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip "
                                            data-template="trashTwo-{{ $fournisseur->public_id }}"
                                            onclick="event.preventDefault(); confirmDeleteFournisseur('{{ $fournisseur->public_id }}')">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-trash" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>

                                            <div id="trashTwo-{{ $fournisseur->public_id }}" class="d-none">
                                                <span>Supprimer</span>
                                            </div>
                                        </a>
                                        <form id="delete-fournisseur-{{ $fournisseur->public_id }}"
                                            action="{{ route('superadmin.fournisseur.delete', $fournisseur->public_id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>




                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Aucun fournisseur enregistré
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>



            </div>






            <nav aria-label="Page navigation example" class="mt-4">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item"><a class="page-link disabled" href="#">Précedent</a></li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                </ul>
            </nav>




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


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            function confirmDeleteFournisseur(publicId) {
                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Ce fournisseur sera définitivement supprimé !",
                    icon: 'warning',
                    showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-fournisseur-' + publicId).submit();
                    }
                });
            }
        </script>





    @endsection
