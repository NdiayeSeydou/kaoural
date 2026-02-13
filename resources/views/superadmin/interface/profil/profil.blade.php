@extends('superadmin.layout.navbar')
@section('title', 'Mon profil')

@section('suite')
{{-- Ressources intl-tel-input --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
<style>
    .iti { width: 100%; }
    .iti__country-list { z-index: 1050; border-radius: 8px; }
    .iti--allow-dropdown input { padding-top: 0.6rem; padding-bottom: 0.6rem; }
</style>

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-12">
                    <div class="mb-8">
                        <h1 class="mb-3 h2">Paramètres</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#">Profil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Paramètres</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            {{-- Affichage des messages de succès ou d'erreur --}}
            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger border-0 shadow-sm mb-4">{{ session('error') }}</div>
            @endif

            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-lb-tab border-dashed border-bottom mb-6" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#!" class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab">
                                <div class="d-flex align-items-center gap-2 lh-1">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-user"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg></span>
                                    <span>Profil</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#!" class="nav-link" id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security" role="tab">
                                <div class="d-flex align-items-center gap-2 lh-1">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-lock"><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" /><path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /></svg></span>
                                    <span>Sécurité</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
                            <div class="card card-lg">
                                <div class="card-body">
                                    <div class="mb-5">
                                        <h5 class="mb-1">Informations du compte</h5>
                                        <p class="mb-0 text-secondary">Modifiez vos informations personnelles de base.</p>
                                    </div>
                                    
                                    {{-- FORMULAIRE DE PROFIL --}}
                                    <form action="{{ route('superadmin.profil.update') }}" method="POST" class="row g-3 needs-validation" novalidate id="profileForm">
                                        @csrf
                                        <div class="col-lg-6 col-md-12">
                                            <label for="firstName" class="form-label">Prénom</label>
                                            <input type="text" name="prenom" class="form-control" id="firstName" value="{{ auth()->user()->prenom }}" required />
                                            <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="lastName" class="form-label">Nom</label>
                                            <input type="text" name="nom" class="form-control" id="lastName" value="{{ auth()->user()->nom }}" required />
                                            <div class="invalid-feedback">Veuillez entrer votre nom.</div>
                                        </div>

                                        <div class="col-lg-12">
                                            <label for="phone" class="form-label d-block">Numéro de téléphone</label>
                                            <input type="tel" class="form-control" id="phone" value="{{ auth()->user()->phone }}" required>
                                            <input type="hidden" name="full_phone" id="full_phone" value="{{ auth()->user()->phone }}">
                                            <div class="invalid-feedback" id="phone-error">Numéro de téléphone invalide.</div>
                                        </div>

                                        <div class="col-lg-12">
                                            <label for="address" class="form-label">Adresse</label>
                                            <input type="text" name="adresse" class="form-control" id="address" value="{{ auth()->user()->adresse }}" placeholder="Ex: Rue 123, Bamako" required />
                                            <div class="invalid-feedback">Veuillez entrer votre adresse.</div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            <button class="btn btn-primary me-2" type="submit">Enregistrer les modifications</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-security" role="tabpanel">
                            <div class="card card-lg mb-6">
                                <div class="card-body">
                                    <div class="mb-5">
                                        <h5 class="mb-1">Changer le mot de passe</h5>
                                        <p class="mb-0 text-secondary">Assurez-vous d'utiliser un mot de passe complexe.</p>
                                    </div>
                                    {{-- FORMULAIRE DE SÉCURITÉ --}}
                                    <form action="{{ route('superadmin.profil.update') }}" method="POST" class="row gy-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-lg-7">
                                            <label class="form-label">Ancien mot de passe</label>
                                            <input type="password" name="old_password" class="form-control" required>
                                        </div>
                                        <div class="col-lg-7">
                                            <label class="form-label">Nouveau mot de passe</label>
                                            <input type="password" name="new_password" class="form-control" required>
                                        </div>
                                        <div class="col-lg-7">
                                            <label class="form-label">Confirmer le nouveau mot de passe</label>
                                            <input type="password" name="new_password_confirmation" class="form-control" required>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Mettre à jour le mot de passe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const phoneInput = document.querySelector("#phone");
        const fullPhoneHidden = document.querySelector("#full_phone");
        const errorMsg = document.querySelector("#phone-error");
        const form = document.querySelector("#profileForm");

        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "ml",
            separateDialCode: true,
            preferredCountries: ["ml", "sn", "ci", "fr"],
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
        });

        const validate = () => {
            if (phoneInput.value.trim()) {
                if (iti.isValidNumber()) {
                    phoneInput.classList.remove("is-invalid");
                    phoneInput.classList.add("is-valid");
                    errorMsg.style.display = "none";
                    fullPhoneHidden.value = iti.getNumber();
                    return true;
                } else {
                    phoneInput.classList.add("is-invalid");
                    errorMsg.style.display = "block";
                    return false;
                }
            }
            return false;
        };

        phoneInput.addEventListener('blur', validate);
        phoneInput.addEventListener('change', validate);

        form.addEventListener('submit', function(e) {
            if (!validate() || !form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
</script>

@endsection