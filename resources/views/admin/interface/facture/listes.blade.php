@extends('admin.layout.navbar')
@section('title', 'Listes des factures | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Listes des factures</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.facture.index') }}">Factures</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Listes</li>
                            </ol>
                        </nav>
                    </div>
                                        <div>
                        <div>
                            <a class="btn btn-dark d-md-flex align-items-center gap-2"
                                href="{{ route('superadmin.facture.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Ajouter une nouvelle facture
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
                                    <span class="text-secondary">Clients</span>
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
                                                height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7l10 10" />
                                                <path d="M17 8l0 9l-9 0" />
                                            </svg>
                                            -3.18 %
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-secondary">Factures</span>
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

                                    <th class="" data-sort="invoice_number">Id Facture</th>
                                    <th class="" data-sort="invoice_status">Status</th>
                                    <th class="" data-sort="invoice_info">Nom du client</th>
                                    <th class="" data-sort="invoice_date">Date</th>
                                    <th class="" data-sort="invoice_amount">Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <tr>

                                    <td class="ps-0 invoice_number">
                                        <a href="#!">#88120</a>
                                    </td>
                                    <td class="invoice_status">
                                        <span
                                            class="badge text-warning-emphasis bg-warning-subtle rounded-pill">Pending</span>
                                    </td>
                                    <td class="ps-1 invoice_info">
                                        <div class="d-flex align-items-center">

                                            <div class="ms-2">
                                                <a href="#!" class="text-inherit">Jan Harmon</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invoice_date">19 Apr 2025</td>


                                    <td class="invoice_amount">$35.99</td>
                                    <td>
                                        <div>
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
                                                    <a class="dropdown-item d-flex align-items-center" href="/superadmin/facture/details">
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

                                                    <a class="dropdown-item d-flex align-items-center" href="/superadmin/facture/modifier">
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

                                                    <a class="dropdown-item d-flex align-items-center" href="#!">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-download"
                                                                width="16" height="16" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                <path d="M7 11l5 5l5 -5" />
                                                                <path d="M12 4l0 12" />
                                                            </svg>
                                                        </span>
                                                        <span class="ms-2">Télécharger</span>
                                                    </a>

                                                    <a class="dropdown-item d-flex align-items-center" href="#!">
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
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>

                                    <td class="ps-0 invoice_number">
                                        <a href="#!">#88119</a>
                                    </td>
                                    <td class="invoice_status">
                                        <span
                                            class="badge text-success-emphasis bg-success-subtle rounded-pill">Paid</span>
                                    </td>
                                    <td class="ps-1 invoice_info">
                                        <div class="d-flex align-items-center">

                                            <div class="ms-2">
                                                <a href="#!" class="text-inherit">Helen Mullins</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invoice_date">18 Apr 2025</td>

                                    <td class="invoice_amount">$135.99</td>
                                    <td>
                                        <div>
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
                                                    <a class="dropdown-item d-flex align-items-center" href="#!">
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

                                                    <a class="dropdown-item d-flex align-items-center" href="#!">
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

                                                    <a class="dropdown-item d-flex align-items-center" href="#!">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-download"
                                                                width="16" height="16" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                <path d="M7 11l5 5l5 -5" />
                                                                <path d="M12 4l0 12" />
                                                            </svg>
                                                        </span>
                                                        <span class="ms-2">Télécharger</span>
                                                    </a>

                                                    <a class="dropdown-item d-flex align-items-center" href="#!">
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
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>


                        </table>

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

                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
