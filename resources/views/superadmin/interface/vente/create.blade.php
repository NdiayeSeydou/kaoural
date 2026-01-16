@extends('superadmin.layout.navbar')
@section('title', 'Ajouter des ventes | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-12">

                <!-- HEADER -->
                <div class="mb-6 d-flex justify-content-between align-items-center">
                    <h1 class="h2">Ajouter des ventes</h1>

                    <a class="btn btn-dark" href="{{ route('superadmin.vente.index') }}">
                        Retour à la liste
                    </a>


                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('superadmin.vente.index') }}">Ventes</a></li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </nav>

                <!-- AJOUT -->
                <div class="mb-4 text-end">
                    <button class="btn btn-outline-primary" id="addSaleBtn">
                        + Ajouter une autre vente
                    </button>
                </div>

                <!-- ACCORDION -->
                <div class="accordion" id="accordionVentes"></div>

                <!-- ENREGISTRER -->
                <div class="mt-4 text-end">
                    <button class="btn btn-success">
                        Enregistrer les ventes
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- ================= TEMPLATE ================= -->
    <template id="saleTemplate">
        <div class="accordion-item mb-4">

            <!-- HEADER -->
            <h2 class="accordion-header">
                <div class="d-flex align-items-center justify-content-between px-3 py-2">

                    <!-- TOGGLE -->
                    <button class="accordion-button fw-bold collapsed flex-grow-1 me-3" type="button"
                        data-bs-toggle="collapse">
                        <!-- Flèche -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="me-2">
                            <path d="M6 9l6 6l6-6" />
                        </svg>
                        <!-- Texte -->
                        <span class="sale-title">Vente #</span>
                    </button>

                    <!-- SUPPRIMER -->
                    <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle delete-sale" title="Supprimer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="16"
                            height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </a>

                </div>
            </h2>

            <!-- BODY -->
            <div class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <div class="row g-4">

                        <!-- Date -->
                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control">
                        </div>

                        <!-- Code -->
                        <div class="col-md-4">
                            <label class="form-label">Code article</label>
                            <input type="text" class="form-control">
                        </div>

                        <!-- Désignation -->
                        <div class="col-md-4">
                            <label class="form-label">Désignation</label>
                            <input type="text" class="form-control">
                        </div>

                        <!-- Image -->
                        <div class="col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control">
                        </div>

                        <!-- Emplacement -->
                        <div class="col-md-6">
                            <label class="form-label">Emplacement</label>
                            <select class="form-select">
                                <option>Boutique</option>
                                <option>Magasin</option>
                            </select>
                        </div>

                        <!-- Quantité -->
                        <div class="col-md-4">
                            <label class="form-label">Quantité</label>
                            <input type="number" class="form-control quantity" value="1">
                        </div>

                        <!-- Prix unitaire -->
                        <div class="col-md-4">
                            <label class="form-label">Prix unitaire</label>
                            <input type="number" class="form-control unit-price" value="0">
                        </div>

                        <!-- Total -->
                        <div class="col-md-4">
                            <label class="form-label">Prix total</label>
                            <input type="number" class="form-control bg-light total-price" readonly>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </template>


    <!-- ================= JS ================= -->
    <script>
        let saleCount = 0;
        const accordion = document.getElementById('accordionVentes');
        const template = document.getElementById('saleTemplate');
        const addBtn = document.getElementById('addSaleBtn');

        function addSale() {
            saleCount++;

            const clone = template.content.cloneNode(true);
            const item = clone.querySelector('.accordion-item');
            const button = clone.querySelector('.accordion-button');
            const collapse = clone.querySelector('.accordion-collapse');
            const title = clone.querySelector('.sale-title');
            const deleteBtn = clone.querySelector('.delete-sale');

            const id = `vente_${saleCount}`;

            title.textContent = `Vente #${saleCount}`;
            button.setAttribute('data-bs-target', `#${id}`);
            collapse.id = id;

            // Calcul total
            const qty = clone.querySelector('.quantity');
            const unit = clone.querySelector('.unit-price');
            const total = clone.querySelector('.total-price');

            function calc() {
                total.value = (qty.value * unit.value) || 0;
            }

            qty.addEventListener('input', calc);
            unit.addEventListener('input', calc);

            // Supprimer
            deleteBtn.addEventListener('click', () => {
                item.remove();
            });

            accordion.appendChild(clone);
        }

        addSale(); // première vente
        addBtn.addEventListener('click', addSale);
    </script>

@endsection
