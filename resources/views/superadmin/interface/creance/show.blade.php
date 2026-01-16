@extends('superadmin.layout.navbar')
@section('title', 'Détails Client | kaoural')
@section('suite')

    <div class="custom-container">

        <!-- ================= HEADER CLIENT ================= -->
        <div class="row align-items-center mb-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Bg -->

                <div class="card card-lg overflow-hidden">
                    <div class="pt-16 rounded-top position-relative"
                        style="background: url('{{ asset('dash/assets/images/background/profile-cover.jpg') }}') no-repeat; background-size: cover;">

                        <div class="position-absolute top-0 end-0 m-4">
                            <a href="#!" class="icon-shape icon-md bg-white rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit text-secondary">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column flex-lg-row gap-4">
                            <div>
                                <img src="{{ asset('dash/assets/images/avatar/avatar-1.jpg') }}" alt=""
                                    class="rounded-circle avatar avatar-xl" />
                            </div>
                            <div class="d-flex flex-column flex-lg-row justify-content-between w-100 gap-2">
                                <div class="d-lg-flex flex-lg-column">
                                    <h3 class="mb-0">Jitu Chauhan</h3>
                                    <div class="d-lg-flex align-items-center gap-2">
                                        <span>89 09 47 87</span>

                                    </div>
                                    <div class="mt-4">
                                        <a href="#!"
                                            class="btn btn-white d-inline-flex align-items-center gap-2">Ajouter une
                                            créance<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                                                <path d="M11 13l9 -9" />
                                                <path d="M15 4h5v5" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-10">
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold fs-5">12,500</span>
                                        <span class="text-secondary">Total à payé</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold fs-5">350</span>
                                        <span class="text-secondary">Reste à payé</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ================= HISTORIQUE ================= -->
        <h4 class="mb-4">Historique des créances</h4>

        <div class="accordion" id="accordionHistorique">

            <!-- ===== JOUR 1 ===== -->
            <div class="accordion-item mb-4">
                <h2 class="accordion-header" id="headingJan14">
                    <button class="accordion-button fw-bold d-flex align-items-center gap-2 py-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseJan14" aria-expanded="true">

                        <!-- ICONE -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M6 9l6 6l6-6" />
                        </svg>

                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span>Jeudi, 14 Janvier 2026</span>
                            <span class="badge bg-soft-info text-info rounded-pill px-3">
                                2 créances enregistrées
                            </span>
                        </div>
                    </button>
                </h2>

                <div id="collapseJan14" class="accordion-collapse collapse show" data-bs-parent="#accordionHistorique">
                    <div class="accordion-body p-3 pb-4">

                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Code</th>
                                        <th>Désignation</th>
                                        <th>Quantité</th>
                                        <th>Prix unitaire</th>
                                        <th>Emplacement</th>


                                        <th>Montant dû</th>
                                       
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#CR-90</td>
                                        <td>Achat Cimen</td>
                                        <td>450</td>
                                        <td>450 000 </td>
                                        <td>Boutique</td>


                                        <td>450 000 FCFA</td>
                                        
                                        <td>Impayée</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                data-template="editOne">
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
                                                <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                            </a>

                                            <a href="#"
                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
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

                                    <tr>
                                       <td>#CR-90</td>
                                        <td>Achat Cime</td>
                                        <td>450</td>
                                        <td>450 000 </td>
                                        <td>Boutique</td>


                                        <td>450 000</td>
                                        
                                        <td>Impayée</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                data-template="editOne">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="16"
                                                    height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                                <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                            </a>

                                            <a href="#"
                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
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
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ===== JOUR 2 ===== -->
            <div class="accordion-item mb-4">
                <h2 class="accordion-header" id="headingJan08">
                    <button class="accordion-button collapsed fw-bold d-flex align-items-center gap-2 py-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseJan08">

                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M6 9l6 6l6-6" />
                        </svg>

                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span>Vendredi, 08 Janvier 2026</span>
                            <span class="badge bg-soft-info text-info rounded-pill px-3">
                                1 créance enregistrée
                            </span>
                        </div>
                    </button>
                </h2>

                <div id="collapseJan08" class="accordion-collapse collapse" data-bs-parent="#accordionHistorique">
                    <div class="accordion-body p-3 pb-4">

                        <table class="table align-middle mb-0">
                            <tr>
                                <td>#CR-05</td>
                                <td>Achat Peinture Glycéro</td>
                                <td>150 000 FCFA</td>
                                <td>12 Janvier 2026</td>
                                <td>
                                    <a href="#" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
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
                                        <div id="viewOne" class="d-none"><span>Voir</span></div>
                                    </a>

                                    <a href="#" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                        data-template="editOne">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                            width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                        <div id="editOne" class="d-none"><span>Modifier</span></div>
                                    </a>

                                    <a href="#" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                        data-template="trashTwo">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                            width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5"
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
                        </table>

                    </div>
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
    </div>

@endsection
