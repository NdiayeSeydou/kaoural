@extends('superadmin.layout.navbar')
@section('title', 'Liste des ventes | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Listes des ventes</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">

                                  <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>

                                <li class="breadcrumb-item active"><a href="{{ route('superadmin.vente.index') }}">Ventes</a>
                                </li>

                            </ol>
                        </nav>

                    </div>
                    <div>
                        <div>
                            <a class="btn btn-dark d-md-flex align-items-center gap-2"
                                href="{{ route('superadmin.vente.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Ajouter une vente
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
                    <button id="btnBoutique" class="btn btn-dark px-4 ">
                        Boutique
                    </button>
                    <button id="btnMagasin" class="btn btn-outline-dark px-4">
                        Magasin
                    </button>
                </div>




                <div class="accordion" id="accordionVentes">

                    <!-- ================= VENTE DU 10 JANVIER ================= -->
                    <div id="ventesBoutique">
                        <div class="accordion-item mb-4">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold d-flex align-items-center gap-2" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#venteDateOne" aria-expanded="true"
                                    aria-controls="venteDateOne">

                                    <!-- ICONE -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M6 9l6 6l6-6" />
                                    </svg>

                                    <span>Vente du 10 Janvier 2026</span>
                                </button>
                            </h2>

                            <div id="venteDateOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionVentes">
                                <div class="accordion-body p-3 pb-4">

                                    <div class="table-responsive">
                                        <table class="table table-centered text-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Numérotation</th>
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
                                                    <td>1</td>
                                                    <td>205</td>
                                                    <td>
                                                        <img src="../../assets/images/ecommerce/product-1.jpg" class="rounded-3"
                                                            width="56" height="56">
                                                    </td>
                                                    <td>Transparent Sunglasses</td>
                                                    <td>2</td>
                                                    <td>2700 FCFA</td>
                                                    <td>Boutique</td>
                                                    <td>5400 FCFA</td>
                                                    <td>

                                                        <a href="#!"
                                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                            data-template="viewOne">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-eye" width="16"
                                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
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
                                                        <a href="#!"
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

                                                        <a href="#!"
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
                                                            <div id="trashTwo" class="d-none">
                                                                <span>Delete</span>
                                                            </div>
                                                        </a>



                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>




                    <div id="ventesMagasin" class="d-none">
                        <!-- ================= VENTE DU 12 JANVIER ================= -->
                        <div class="accordion-item mb-4">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-bold d-flex align-items-center gap-2"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#venteDateTwo"
                                    aria-expanded="false" aria-controls="venteDateTwo">

                                    <!-- ICONE -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 9l6 6l6-6" />
                                    </svg>

                                    <span>Vente du 12 Janvier 2026</span>
                                </button>
                            </h2>

                            <div id="venteDateTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionVentes">
                                <div class="accordion-body p-3 pb-4">

                                    <div class="table-responsive">
                                        <table class="table table-centered text-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Numérotation</th>
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
                                                    <td>1</td>
                                                    <td>310</td>
                                                    <td>
                                                        <img src="../../assets/images/ecommerce/product-2.jpg"
                                                            class="rounded-3" width="56" height="56">
                                                    </td>
                                                    <td>Casque Bluetooth</td>
                                                    <td>1</td>
                                                    <td>15000 FCFA</td>
                                                    <td>Magasin</td>
                                                    <td>15000 FCFA</td>
                                                    <td>

                                                        <a href="/superadmin/ventes/details"
                                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                            data-template="viewOne">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-eye" width="16"
                                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
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

                                                        <a href="/superadmin/ventes/modifier"
                                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                            data-template="editOne">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
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
                                                            <div id="editOne" class="d-none"><span>Modifier</span></div>
                                                        </a>


                                                        <a href="#!"
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
                                                            <div id="trashTwo" class="d-none">
                                                                <span>Delete</span>
                                                            </div>
                                                        </a>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <nav aria-label="Page navigation example">
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


        <script>
            const btnBoutique = document.getElementById('btnBoutique');
            const btnMagasin = document.getElementById('btnMagasin');
            const ventesBoutique = document.getElementById('ventesBoutique');
            const ventesMagasin = document.getElementById('ventesMagasin');

            btnBoutique.addEventListener('click', () => {
                ventesBoutique.classList.remove('d-none');
                ventesMagasin.classList.add('d-none');

                btnBoutique.classList.add('btn-dark');
                btnBoutique.classList.remove('btn-outline-dark');

                btnMagasin.classList.add('btn-outline-dark');
                btnMagasin.classList.remove('btn-dark');
            });

            btnMagasin.addEventListener('click', () => {
                ventesMagasin.classList.remove('d-none');
                ventesBoutique.classList.add('d-none');

                btnMagasin.classList.add('btn-dark');
                btnMagasin.classList.remove('btn-outline-dark');

                btnBoutique.classList.add('btn-outline-dark');
                btnBoutique.classList.remove('btn-dark');
            });
        </script>




    @endsection
