@extends('superadmin.layout.navbar')
@section('title', 'Listes des factures | kaoural')
@section('suite')


    @if (session('ajoutcateg'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('ajoutcateg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif



    @if (session('catjour'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('catjour') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif



    @if (session('catdel'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('catdel') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif



    @if (session(key: 'error'))
        <div class="alert alert-danger alert-dismissible fade show">
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
                        <h1 class="mb-3 h2">Listes des catégories</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('superadmin.categorie.index') }}">catégories</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Listes</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <div>
                            <a class="btn btn-dark d-md-flex align-items-center gap-2"
                                href="{{ route('superadmin.categorie.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Ajouter une nouvelle catégorie
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div>
            <!-- row -->
            <div class="row g-6 mb-6">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card card-lg">
                        <div class="card-body px-6 py-5">
                            <div class="d-flex flex-column gap-5">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="icon-shape icon-md bg-warning-subtle text-warning-emphasis rounded-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-up-right" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M17 7l-10 10" />
                                                <path d="M8 7l9 0l0 9" />
                                            </svg>
                                            +9.18 %
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-secondary">Catégories</span>
                                    <div class="fs-3 fw-bold">
                                        <span class="counter-value" data-target="3156">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card card-lg">
                        <div class="card-body px-6 py-5">
                            <div class="d-flex flex-column gap-5">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="icon-shape icon-md bg-info-subtle text-info-emphasis text-info rounded-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-text" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                            <path d="M9 9l1 0" />
                                            <path d="M9 13l6 0" />
                                            <path d="M9 17l6 0" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-down-right" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7l10 10" />
                                                <path d="M17 8l0 9l-9 0" />
                                            </svg>
                                            -3.18 %
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-secondary">Produits</span>
                                    <div class="fs-3 fw-bold">
                                        <span class="counter-value" data-target="167">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card card-lg">
                        <div class="card-body px-6 py-5">
                            <div class="d-flex flex-column gap-5">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="icon-shape icon-md bg-danger-subtle text-danger-emphasis rounded-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-download" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                            <path d="M7 11l5 5l5 -5" />
                                            <path d="M12 4v12" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-up-right" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M17 7l-10 10" />
                                                <path d="M8 7l9 0l0 9" />
                                            </svg>
                                            +183
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-secondary">Télechargements</span>
                                    <div class="fs-3 fw-bold">
                                        $
                                        <span class="counter-value" data-target="41.56">0</span>
                                        k
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card card-lg">
                        <div class="card-body px-6 py-5">
                            <div class="d-flex flex-column gap-5">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="icon-shape icon-md bg-primary-subtle text-primary-emphasis rounded-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-x" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                            <path d="M10 14l4 4m0 -4l-4 4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-up-right" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M17 7l-10 10" />
                                                <path d="M8 7l9 0l0 9" />
                                            </svg>
                                            +6.18 %
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-secondary">Non payé</span>
                                    <div class="fs-3 fw-bold">
                                        $
                                        <span class="counter-value" data-target="33.16">0</span>
                                        k
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- card -->
                    <div class="card card-lg" id="invoiceList"
                        data-list="invoice_number,invoice_status,invoice_info,invoice_date,invoice_email,invoice_amount">
                        <div class="card-header border-bottom-0">
                            <div class="row gy-2">
                                <div class="col-lg-4">
                                    <input type="search" class="form-control listjs-search" placeholder="Rechercher" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-flex gap-2 justify-content-md-end">
                                        <div class="col-lg-4">
                                            <select class="form-select" data-choices="Status">
                                                <option value="Paid">Payé</option>
                                                <option value="Pending">Impayé</option>
                                                <option value="Refunded">Pro-format</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-checkbox" data-simplebar style="height: 600px">
                        <table class="table text-nowrap table-centered table-hover mb-0" data-check-container>
                            <thead class="sticky-top">
                                <tr>

                                    <th class="" data-sort="invoice_number">Numerotation</th>
                                    <th class="" data-sort="invoice_date">catégorie</th>
                                    <th class="" data-sort="invoice_amount">Stocks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($categories as $index => $categorie)
                                    <tr>

                                        <td>
                                            {{ $index + 1 }}</td>
                                        </td>

                                        <td class="invoice_status">
                                            <span>{{ ucfirst($categorie->name) }}</span>
                                        </td>
                                        <td class="ps-1 invoice_info">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <span>{{ $categorie->stocks_count }}
                                                        stock{{ $categorie->stocks_count > 1 ? 's' : '' }}</span>
                                                </div>
                                            </div>
                                        </td>


                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-ghost btn-icon rounded-circle" href="#!"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-dots-vertical" width="20"
                                                        height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <!-- Voir les détails -->
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('superadmin.categorie.show', $categorie->public_id) }}">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-eye" width="16"
                                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                <path
                                                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                            </svg>
                                                        </span>
                                                        <span class="ms-2">Détails</span>
                                                    </a>

                                                    <!-- Modifier -->
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('superadmin.categorie.edit', $categorie->public_id) }}">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-edit" width="16"
                                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                <path
                                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                <path d="M16 5l3 3" />
                                                            </svg>
                                                        </span>
                                                        <span class="ms-2">Modifier</span>
                                                    </a>

                                                    <!-- Supprimer -->
                                                    <a href="#!"
                                                        class="dropdown-item d-flex align-items-center text-danger"
                                                        onclick="event.preventDefault(); confirmDelete('{{ $categorie->public_id }}', {{ $categorie->stocks()->count() > 0 ? 'true' : 'false' }})">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-trash" width="16"
                                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 7l16 0" />
                                                                <path d="M10 11l0 6" />
                                                                <path d="M14 11l0 6" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                        </span>
                                                        <span class="ms-2">Supprimer</span>
                                                    </a>

                                                    <!-- Formulaire caché -->
                                                    <form id="delete-form-{{ $categorie->public_id }}"
                                                        action="{{ route('superadmin.categorie.delete', $categorie->public_id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">
                                            Aucune catégorie
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>


                        </table>

                        <nav aria-label="Page navigation example" class="mt-4">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $categories->previousPageUrl() }}">Précedent</a>
                                </li>

                                @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                    <li class="page-item {{ $categories->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <li class="page-item {{ $categories->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $categories->nextPageUrl() }}">Suivant</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(publicId, hasStocks) {
            // if (hasStocks) {
            //     // Message si la catégorie contient des stocks
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Impossible de supprimer',
            //         text: 'Cette catégorie contient des stocks et ne peut pas être supprimée.',
            //         confirmButtonColor: '#3085d6',
            //         confirmButtonText: 'OK'
            //     });
            // } else {
            // Confirmation normale de suppression
            Swal.fire({
                title: 'Êtes-vous sûr de supprimer cette catégorie ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + publicId).submit();
                }
            });
            // }
        }
    </script>






@endsection
