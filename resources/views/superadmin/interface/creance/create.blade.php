@extends('superadmin.layout.navbar')

@section('title', 'Ajouter un créancier | Kaoural')

@section('suite')

    {{-- CSS pour intl-tel-input --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css" />

    <div class="custom-container" style="padding: 1.5rem;">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-10 col-12">

                {{-- Header --}}
                <div class="mb-6 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-2 h2 fw-bold">Nouveau Créancier</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.creance.index') }}">Gestion des créances</a></li>
                                <li class="breadcrumb-item active">Ajouter un créancier</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('superadmin.creance.index') }}" class="btn btn-dark">
                        <i class="fe fe-arrow-left me-1"></i> Retour à la liste
                    </a>
                </div>

                {{-- Formulaire --}}
                <form action="{{ route('superadmin.creance.store') }}" method="POST">
                    @csrf

                    <div class="card card-lg shadow-sm border-0">
                        <div class="card-header border-bottom border-dashed py-4 bg-white">
                            <h5 class="mb-0 text-primary"><i class="fe fe-user-plus me-2"></i>Identification du client</h5>
                        </div>

                        <div class="card-body p-6">
                            <div class="row g-4">

                                {{-- Public ID (Lecture seule) --}}
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-muted">ID Creance</label>
                                    <input type="text" class="form-control bg-light" value="Auto-généré" readonly>
                                    <small class="text-muted">Généré par le système</small>
                                </div>

                                {{-- Nom --}}
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">Nom complet du créancier <span class="text-danger">*</span></label>
                                    <input type="text" name="nom"
                                        class="form-control @error('nom') is-invalid @enderror"
                                        value="{{ old('nom') }}" placeholder="Ex: Amadou Diallo" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Téléphone (Support intl-tel-input) --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-bold d-block">Numéro de téléphone</label>
                                    <input type="tel" id="telephone"
                                        class="form-control @error('telephone') is-invalid @enderror" placeholder="">
                                    
                                    {{-- champ caché pour envoyer le numéro formaté au controller --}}
                                    <input type="hidden" name="telephone" id="telephone_hidden" value="{{ old('telephone') }}">

                                    {{-- Message d'erreur JS --}}
                                    <small id="telephone_error" class="text-danger d-none"></small>

                                    @error('telephone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Adresse --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Adresse / Quartier</label>
                                    <input type="text" name="adresse"
                                        class="form-control @error('adresse') is-invalid @enderror"
                                        value="{{ old('adresse') }}" placeholder="Ex: Bamako, Kalaban Coura">
                                    @error('adresse')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer bg-light border-top-0 px-6 py-4">
                            <div class="d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-outline-secondary px-4">Réinitialiser</button>
                                <button type="submit" class="btn btn-primary px-5 fw-bold">
                                    <i class="fe fe-save me-2"></i>Enregistrer le créancier
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="alert alert-info border-0 shadow-sm mt-4 d-flex align-items-center">
                    <i class="fe fe-info fs-3 me-3"></i>
                    <div>
                        <strong>Note :</strong> Une fois le créancier créé, vous pourrez enregistrer ses retraits de marchandises via le bouton <strong>"Ajouter un nouveau Retrait"</strong> dans la liste.
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Scripts JS pour intl-tel-input --}}
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#telephone");
        const hiddenInput = document.querySelector("#telephone_hidden");
        const errorMsg = document.querySelector("#telephone_error");

        const iti = window.intlTelInput(input, {
            initialCountry: "auto",
            separateDialCode: true,
            preferredCountries: ["ml", "sn", "ci", "bf"],
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
            geoIpLookup: function(callback) {
                fetch('https://ipapi.co/json')
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback('ml'));
            }
        });

        const errorMap = {
            0: "Numéro invalide",
            1: "Indicatif de pays incorrect",
            2: "Numéro trop court",
            3: "Numéro trop long",
            4: "Format non reconnu"
        };

        function validatePhone() {
            errorMsg.classList.add("d-none");
            input.classList.remove("is-invalid");

            if (input.value.trim() === "") return true;

            if (!iti.isValidNumber()) {
                const errorCode = iti.getValidationError();
                errorMsg.textContent = errorMap[errorCode] || "Numéro non valide";
                errorMsg.classList.remove("d-none");
                input.classList.add("is-invalid");
                return false;
            }
            return true;
        }

        // Événements
        input.addEventListener("blur", validatePhone);
        input.addEventListener("keyup", validatePhone);

        // Avant soumission : on récupère le numéro formaté (ex: +22370000000)
        document.querySelector("form").addEventListener("submit", function(e) {
            if (!validatePhone()) {
                e.preventDefault();
                return false;
            }
            hiddenInput.value = iti.getNumber(); 
        });
    </script>

@endsection