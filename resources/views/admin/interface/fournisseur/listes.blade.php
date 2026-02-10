@extends('admin.layout.navbar')
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

                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>


                                <li class="breadcrumb-item active"><a
                                        href="{{ route('admin.fournisseur.index') }}">Fournisseurs</a>
                                </li>

                            </ol>
                        </nav>

                    </div>
                    <div>
                        <div>
                            <a class="btn btn-dark d-md-flex align-items-center gap-2"
                                href="{{ route('admin.fournisseur.create') }}">
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
                    <form action="{{ route('admin.fournisseur.index') }}" method="GET">
                        <div class="row g-3 align-items-end">

                            <div class="col-lg-3 col-md-6 col-12">
                                <label class="form-label fw-semibold">Nom du fournisseur</label>
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Rechercher un nom..." value="{{ request('search') }}">
                                    <span class="input-group-text bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8" />
                                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                          <div class="col-lg-3 col-md-6 col-12">
    <label class="form-label fw-semibold">Numéro de téléphone</label>
    <input type="tel" id="phone_input" name="phone" class="form-control" 
           value="{{ request('phone') }}">
</div>

                          

                            <div class="col-lg-3 col-md-6 col-12">
                                <label class="form-label fw-semibold">Catégorie</label>
                                <select name="categorie" class="form-select">
                                    <option value="">Toutes les catégories</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ request('categorie') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12 d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-grow-1">
                                    Filtrer
                                </button>
                                <a href="{{ route('admin.fournisseur.index') }}"
                                    class="btn btn-outline-danger flex-grow-1 text-center">
                                    Reset
                                </a>
                            </div>

                        </div>
                    </form>
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

                                        <a href="{{ route('admin.fournisseur.show', $fournisseur->public_id) }}"
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

                                        <a href="{{ route('admin.fournisseur.edit', $fournisseur->public_id) }}"
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
                                            action="{{ route('admin.fournisseur.delete', $fournisseur->public_id) }}"
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


      <script>
    const input = document.querySelector("#phone_input");
    
    const iti = window.intlTelInput(input, {
        initialCountry: "auto",
        // 1. On active le placeholder automatique
        autoPlaceholder: "aggressive", 
        // 2. On précise qu'on veut un exemple de numéro mobile
        placeholderNumberType: "MOBILE",
        
        geoIpLookup: function(callback) {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("ci")); // CI ou FR par défaut
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/utils.js",
        separateDialCode: true,
    });

    // Optionnel : Si tu veux quand même que le champ ne soit pas vide 
    // et affiche l'indicatif en plus du placeholder au changement de pays
    input.addEventListener("countrychange", function() {
        const countryData = iti.getSelectedCountryData();
        // On réinitialise la valeur pour laisser voir le nouveau placeholder du pays
        input.value = ""; 
        // Si tu veux forcer l'indicatif dedans, décommente la ligne suivante :
        // input.value = "+" + countryData.dialCode;
    });
</script>





    @endsection
