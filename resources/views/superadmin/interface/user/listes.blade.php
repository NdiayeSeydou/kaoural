@extends('superadmin.layout.navbar')
@section('title', 'Listes des utilisateurs | kaoural')
@section('suite')

    <style>
        .avatar-initials {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            border-radius: 50%;
            background-color: #6366f1;
        }

        .bg-user-1 {
            background-color: #f59e0b;
        }

        .bg-user-2 {
            background-color: #10b981;
        }

        .bg-user-3 {
            background-color: #3b82f6;
        }

        .btn-action-group .btn {
            padding: 0.4rem;
            line-height: 1;
        }
    </style>



    @if (session('useradd'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('useradd') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('errortoggle'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('errortoggle') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif



    @if (session('updatetoogle'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('updatetoogle') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('deleteuser'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('deleteuser') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('userupt'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('userupt') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif




    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="mb-8 d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Gestion des Utilisateurs</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a class="btn btn-dark d-md-flex align-items-center gap-2"
                            href="{{ route('superadmin.user.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Ajouter une nouvelle utilisateur
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <p class="mb-3 ">{{ $users->count() }} utilisateurs </p>



        <div class="card mb-5 shadow-sm border-0">
            <div class="card-body p-3">
                <form action="#" method="GET">
                    <div class="row g-2 align-items-end">
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label fw-bold small text-dark">Utilisateur</label>
                            <div class="input-group input-group-sm"> <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-person text-muted"></i>
                                </span>
                                <input type="text" name="search" class="form-control border-start-0"
                                    placeholder="Nom ou email..." value="{{ request('search') }}">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <label class="form-label fw-bold small">Téléphone</label>
                            <input type="tel" id="phone"
                                class="form-control form-control-sm @error('telephone') is-invalid @enderror">
                            <input type="hidden" name="telephone" id="telephone" value="{{ old('telephone') }}">
                            <div class="invalid-feedback small" id="phone-error" style="display: none;">Invalide</div>
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <label class="form-label fw-bold small text-dark">Rôle</label>
                            <select name="role" class="form-select form-select-sm">
                                <option value="">Tous</option>
                                <option value="superadmin" {{ request('role') == 'superadmin' ? 'selected' : '' }}>
                                    Superadmin</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="client" {{ request('role') == 'client' ? 'selected' : '' }}>Client</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <label class="form-label fw-bold small text-dark">Statut</label>
                            <select name="status" class="form-select form-select-sm">
                                <option value="">Tous</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Actif</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Désactivé</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-4 d-flex gap-1">
                            <button type="submit" class="btn btn-sm btn-primary w-100 px-0">
                                Filtrer
                            </button>
                            <a href="#" class="btn btn-sm btn-outline-danger w-100 px-0">
                                Supprimer
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <style>
            .iti {
                width: 100%;
            }

            .iti__tel-input {
                height: 31px !important;
            }
        </style>

        <div class="row g-4">
            @forelse ($users as $user)
                <div class="col-xxl-4 col-xl-6 col-12">
                    <div class="card card-lg shadow-sm border-0">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-initials bg-primary text-white d-flex align-items-center justify-content-center rounded-circle"
                                        style="width: 48px; height: 48px; font-weight: bold;">
                                        {{ strtoupper(substr($user->surname, 0, 1)) }}{{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h5 class="mb-0">{{ $user->surname }} {{ $user->name }}</h5>

                                        @php
                                            $roleLabels = [0 => 'Super-Admin', 1 => 'Admin', 2 => 'Client'];
                                        @endphp
                                        <span class="badge bg-light-primary text-primary px-2 small">
                                            {{ $roleLabels[$user->role] ?? 'Utilisateur' }}
                                        </span>

                                        <div class="mt-1">
                                            @if ($user->is_active)
                                                <span class="badge bg-success" style="font-size: 0.7rem;">Actif</span>
                                            @else
                                                <span class="badge bg-danger" style="font-size: 0.7rem;">Désactivé</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex justify-content-center gap-2 btn-action-group">
                                <a href="javascript:void(0)"
                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                    data-bs-toggle="modal" data-bs-target="#userDetailsModal{{ $user->public_id }}">
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

                                <form action="{{ route('superadmin.user.toggle', $user->public_id) }}" method="POST"
                                    class="toggle-user-form" data-active="{{ $user->is_active ? '1' : '0' }}">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                        class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip {{ $user->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}">

                                        @if ($user->is_active)
                                            <!-- Icône Désactiver -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi-slash-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zM4.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        @else
                                            <!-- Icône Activer -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zM10.97 6.97a.75.75 0 0 1 1.07 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 9.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.492-3.447z" />
                                            </svg>
                                        @endif
                                    </button>
                                </form>


                                <a href="javascript:void(0)"
                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                    data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->public_id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                        width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                    <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                </a>

                               <form action="{{ route('superadmin.user.destroy', $user->public_id) }}" method="POST"
      class="delete-user-form">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip">
        <i class="bi bi-trash"></i>
    </button>
</form>

                            </div>
                        </div>
                    </div>
                </div>

            @empty

                <div class="mt-4 text-center">
                    <p class="mb-0 text-danger">Aucun Utilisateur disponible sur le site.</p>
                </div>
            @endforelse
        </div>

        <nav aria-label="Page navigation example" class="mt-4">
            <ul class="pagination justify-content-center mb-0">
                {{-- Lien précédent --}}
                <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $users->previousPageUrl() }}">Précedent</a>
                </li>

                {{-- Pages --}}
                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    <li class="page-item {{ $users->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Lien suivant --}}
                <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $users->nextPageUrl() }}">Suivant</a>
                </li>
            </ul>
        </nav>

    </div>


    <div class="row g-4">
        @forelse ($users as $user)
            <div class="modal fade" id="userDetailsModal{{ $user->public_id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow-lg border-0">
                        <div class="modal-header bg-light border-bottom-0 pb-0">
                            <h5 class="modal-title fw-bold text-dark">Détails du Profil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body pt-0">
                            <div class="text-center mb-4">
                                <div class="avatar-initials bg-gradient-primary mx-auto mb-3 shadow-sm"
                                    style="width: 90px; height: 90px; font-size: 2.2rem; background: linear-gradient(45deg, #6366f1, #a855f7); color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                    {{ strtoupper(substr($user->surname, 0, 1)) }}{{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <h3 class="fw-bold mb-1 text-capitalize">{{ $user->name }} {{ $user->surname }}</h3>

                                @if ($user->is_active)
                                    <span
                                        class="badge rounded-pill bg-success-soft text-success border border-success px-3">
                                        <i class="bi bi-check-circle-fill me-1"></i> Compte Actif
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-danger-soft text-danger border border-danger px-3">
                                        <i class="bi bi-x-circle-fill me-1"></i> Compte Désactivé
                                    </span>
                                @endif
                            </div>

                            <div class="card bg-light border-0 rounded-3">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush rounded-3">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-shield-lock text-primary me-3 fs-5"></i>
                                                <span class="text-secondary">Rôle Système</span>
                                            </div>
                                            @php
                                                $roles = [
                                                    0 => ['Super-Admin', 'bg-primary'],
                                                    1 => ['Admin', 'bg-info text-dark'],
                                                    2 => ['Client', 'bg-secondary'],
                                                ];
                                                $currentRole = $roles[$user->role] ?? ['Inconnu', 'bg-dark'];
                                            @endphp
                                            <span class="badge {{ $currentRole[1] }}">{{ $currentRole[0] }}</span>
                                        </li>

                                        <li class="list-group-item bg-transparent py-3">
                                            <div class="d-flex align-items-center mb-1">
                                                <i class="bi bi-envelope text-primary me-3 fs-5"></i>
                                                <span class="text-secondary">Adresse Email</span>
                                            </div>
                                            <div class="ms-5 fw-bold text-dark">{{ $user->email }}</div>
                                        </li>

                                        <li class="list-group-item bg-transparent py-3">
                                            <div class="d-flex align-items-center mb-1">
                                                <i class="bi bi-telephone text-primary me-3 fs-5"></i>
                                                <span class="text-secondary">Téléphone</span>
                                            </div>
                                            <div class="ms-5 fw-bold text-dark">

                                                {{ $user->formatted_phone }}
                                            </div>
                                        </li>

                                        <li class="list-group-item bg-transparent py-3">
                                            <div class="d-flex align-items-center mb-1">
                                                <i class="bi bi-geo-alt text-primary me-3 fs-5"></i>
                                                <span class="text-secondary">Adresse Physique</span>
                                            </div>
                                            <div class="ms-5 fw-bold text-dark">{{ $user->adresse ?? 'Non renseignée' }}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer border-top-0 pt-0">
                            <button type="button" class="btn btn-outline-secondary w-100 rounded-pill"
                                data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="editUserModal{{ $user->public_id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title">Modifier l'utilisateur : {{ $user->name }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('superadmin.user.update', $user->public_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Nom</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Prénom</label>
                                        <input type="text" name="surname"
                                            class="form-control @error('surname') is-invalid @enderror"
                                            value="{{ old('surname', $user->surname) }}" required>
                                        @error('surname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Téléphone</label>

                                        {{-- Champ visible : on utilise une classe au lieu d'un ID --}}
                                        <input type="tel"
                                            class="form-control phone-input @error('telephone') is-invalid @enderror"
                                            value="{{ old('telephone', $user->telephone) }}" placeholder="">

                                        {{-- Champ caché pour le backend --}}
                                        <input type="hidden" name="telephone" class="hidden-phone"
                                            value="{{ old('telephone', $user->telephone) }}">

                                        {{-- Message d'erreur dynamique --}}
                                        <div class="invalid-feedback phone-error" style="display: none;">
                                            Le numéro de téléphone n'est pas valide.
                                        </div>

                                        @error('telephone')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-8">
                                        <label class="form-label fw-bold">Adresse</label>
                                        <input type="text" name="adresse"
                                            class="form-control @error('adresse') is-invalid @enderror"
                                            value="{{ old('adresse', $user->adresse) }}">
                                        @error('adresse')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Rôle</label>
                                        <select name="role" class="form-select @error('role') is-invalid @enderror">
                                            <option value="0" {{ old('role', $user->role) == 0 ? 'selected' : '' }}>
                                                SuperAdmin</option>
                                            <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>
                                                Client</option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check form-switch p-3 bg-light rounded">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" name="is_active"
                                            id="active{{ $user->public_id }}" value="1"
                                            {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="active{{ $user->public_id }}">Compte
                                            Actif</label>
                                    </div>

                                    <div class="col-12">
                                        <hr class="my-3">
                                        <div class="alert alert-info py-2 small">
                                            <i class="bi bi-info-circle me-2"></i>Laissez vide pour ne pas modifier le mot
                                            de passe.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-danger">Nouveau mot de passe</label>
                                        <input type="password" name="password"
                                            class="form-control shadow-sm @error('password') is-invalid @enderror"
                                            placeholder="********">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-danger">Confirmer le mot de passe</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control shadow-sm @error('password_confirmation') is-invalid @enderror"
                                            placeholder="********">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-light">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary px-4">Enregistrer les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            {{-- <div class="col-12 mt-4 text-center">
            <p class="mb-0 text-danger">Aucun Utilisateur disponible sur le site.</p>
        </div> --}}
        @endforelse
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // On récupère tous les champs téléphone de la page
        const phoneInputs = document.querySelectorAll(".phone-input");

        phoneInputs.forEach(input => {
            // On trouve les éléments liés dans la même modale ou parent
            const parentContainer = input.closest('.col-md-6');
            const hiddenInput = parentContainer.querySelector(".hidden-phone");
            const errorDiv = parentContainer.querySelector(".phone-error");

            // Initialisation de intl-tel-input
            const iti = window.intlTelInput(input, {
                initialCountry: "ml",
                separateDialCode: true,
                preferredCountries: ["ml", "sn", "ci", "fr"],
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
            });

            // Fonction de validation et mise à jour
            const updatePhone = () => {
                if (input.value.trim()) {
                    if (iti.isValidNumber()) {
                        input.classList.remove("is-invalid");
                        errorDiv.style.display = "none";
                        // On stocke le numéro au format international (+223...) dans le champ caché
                        hiddenInput.value = iti.getNumber();
                    } else {
                        input.classList.add("is-invalid");
                        errorDiv.style.display = "block";
                    }
                }
            };

            // Événements
            input.addEventListener("blur", updatePhone);
            input.addEventListener("countrychange", updatePhone);

            // Avant de soumettre le formulaire spécifique à cette modale
            const form = input.closest("form");
            form.addEventListener("submit", function(e) {
                updatePhone();
                // Si on veut bloquer l'envoi si invalide, décommenter ci-dessous :
                // if (!iti.isValidNumber() && input.value.trim() !== "") e.preventDefault();
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // On vérifie s'il y a des erreurs de validation globales
        @if ($errors->any())
            // On récupère l'ID de la modale qui était en cours d'édition
            // Laravel ne sait pas laquelle c'est, donc on ouvre celle qui a des erreurs 
            // ou on utilise une astuce avec une variable de session si nécessaire.
            // Ici, on cherche la première modale contenant un input invalide et on l'affiche
            var firstErrorEl = document.querySelector('.is-invalid');
            if (firstErrorEl) {
                var modalEl = firstErrorEl.closest('.modal');
                if (modalEl) {
                    var myModal = new bootstrap.Modal(modalEl);
                    myModal.show();
                }
            }
        @endif
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const phoneInput = document.querySelector("#phone");
        const hiddenPhoneInput = document.querySelector("#telephone");
        const phoneErrorDiv = document.querySelector("#phone-error");

        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "ml",
            separateDialCode: true,
            preferredCountries: ["ml", "sn", "ci", "fr"],
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
        });

        function validatePhone() {
            const value = phoneInput.value.trim();

            if (!value) {
                phoneInput.classList.add("is-invalid");
                phoneErrorDiv.textContent = "Le numéro de téléphone est obligatoire.";
                phoneErrorDiv.style.display = "block";
                hiddenPhoneInput.value = "";
                return false;
            } else if (!iti.isValidNumber()) {
                phoneInput.classList.add("is-invalid");
                phoneErrorDiv.textContent = "Le numéro de téléphone n'est pas valide pour le pays sélectionné.";
                phoneErrorDiv.style.display = "block";
                hiddenPhoneInput.value = "";
                return false;
            } else {
                phoneInput.classList.remove("is-invalid");
                phoneErrorDiv.style.display = "none";
                // Récupère le numéro formaté (ex: +22376000000) pour le backend
                hiddenPhoneInput.value = iti.getNumber();
                return true;
            }
        }

        // Valider quand l'utilisateur quitte le champ
        phoneInput.addEventListener("blur", validatePhone);

        // Mettre à jour le champ caché avant l'envoi du formulaire
        const form = phoneInput.closest("form");
        if (form) {
            form.addEventListener("submit", function(e) {
                if (!validatePhone()) {
                    // Optionnel : empêcher l'envoi si invalide
                    // e.preventDefault(); 
                }
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll('.toggle-user-form').forEach(form => {

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const isActive = form.dataset.active === "1";

                Swal.fire({
                    title: isActive ? "Désactiver l'utilisateur ?" :
                        "Activer l'utilisateur ?",
                    text: isActive ?
                        "L'utilisateur ne pourra plus accéder à son compte." :
                        "L'utilisateur pourra à nouveau accéder à son compte.",
                    icon: isActive ? "warning" : "question",
                    showCancelButton: true,
                    confirmButtonColor: isActive ? "#d33" : "#198754",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: isActive ? "Oui, désactiver" : "Oui, activer",
                    cancelButtonText: "Annuler"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

        });

    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // Supprimer utilisateur avec SweetAlert2
    document.querySelectorAll('.delete-user-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Stop form submit

            Swal.fire({
                title: "Supprimer cet utilisateur ?",
                text: "Cette action est irréversible !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Oui, supprimer",
                cancelButtonText: "Annuler"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit si confirmé
                }
            });
        });
    });

});
</script>

