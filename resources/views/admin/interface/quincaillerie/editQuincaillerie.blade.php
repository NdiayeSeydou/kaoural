@extends('admin.layout.navbar')
@section('title', 'Modifier une quincaillerie | kaoural')
@section('suite')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css" />

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-10 col-12">

                <!-- HEADER -->
                <div class="mb-6 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-2 h2">Modifier la quincaillerie</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Accueil</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.quincaillerie.index') }}">
                                        Quincailleries partenaires
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Modifier un partenaire
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- FORM -->
                <form action="{{ route('admin.quincaillerie.update', $quincaillerie->public_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card card-lg shadow-sm">

                        <div class="card-header border-bottom border-dashed py-4">
                            <h5 class="mb-0">Informations Générales</h5>
                        </div>

                        <div class="card-body p-6">
                            <div class="row g-4">

                                {{-- ID --}}
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">ID Quincaillerie</label>
                                    <input type="text" class="form-control bg-light"
                                        value="{{ $quincaillerie->public_id }}" readonly>
                                </div>

                                {{-- Nom --}}
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">Nom de la quincaillerie</label>
                                    <input type="text" name="nom"
                                        class="form-control @error('nom') is-invalid @enderror"
                                        value="{{ old('nom', $quincaillerie->nom) }}">

                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Téléphone --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Numéro de téléphone</label>

                                    <input type="tel" id="telephone"
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        value="{{ old('telephone', $quincaillerie->telephone) }}">

                                    {{-- champ caché pour Laravel --}}
                                    <input type="hidden" name="telephone" id="telephone_hidden">

                                    {{-- erreur JS --}}
                                    <small id="telephone_error" class="text-danger d-none"></small>

                                    @error('telephone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Adresse --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Adresse</label>
                                    <input type="text" name="adresse"
                                        class="form-control @error('adresse') is-invalid @enderror"
                                        value="{{ old('adresse', $quincaillerie->adresse) }}">

                                    @error('adresse')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-top-0 px-6 py-4">
                            <div class="d-flex justify-content-end gap-2">

                                <a href="{{ route('admin.quincaillerie.index') }}"
                                    class="btn btn-outline-secondary px-4">
                                    Annuler
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    Mettre à jour
                                </button>

                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>


    <script>
        const input = document.querySelector("#telephone");
        const hiddenInput = document.querySelector("#telephone_hidden");
        const errorMsg = document.querySelector("#telephone_error");

        const iti = window.intlTelInput(input, {
            initialCountry: "auto",
            separateDialCode: true,
            preferredCountries: ["ml", "sn", "ci", "fr"],
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
            2: "Numéro trop court pour ce pays",
            3: "Numéro trop long pour ce pays",
            4: "Numéro invalide"
        };

        function validatePhone() {
            errorMsg.classList.add("d-none");
            input.classList.remove("is-invalid");

            if (input.value.trim() === "") return true;

            if (!iti.isValidNumber()) {
                const errorCode = iti.getValidationError();
                errorMsg.textContent = errorMap[errorCode] || "Numéro non valide pour le pays sélectionné";
                errorMsg.classList.remove("d-none");
                input.classList.add("is-invalid");
                return false;
            }

            return true;
        }

        // Validation en temps réel
        input.addEventListener("blur", validatePhone);
        input.addEventListener("change", validatePhone);
        input.addEventListener("keyup", validatePhone);

        // Avant soumission du formulaire
        document.querySelector("form").addEventListener("submit", function(e) {
            if (!validatePhone()) {
                e.preventDefault();
                return false;
            }

            hiddenInput.value = iti.getNumber(); // numéro complet +223...
        });
    </script>

@endsection
