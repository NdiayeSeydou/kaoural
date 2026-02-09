@extends('superadmin.layout.navbar')
@section('title', 'Modifier un créancier | kaoural')

{{-- CSS intl-tel-input (VERSION IDENTIQUE AU JS) --}}
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

<style>
    .iti {
        width: 100%;
    }

    .iti__country-list {
        z-index: 9999;
    }

    .invalid-feedback {
        display: block;
    }

    /* Correction affichage drapeaux (Bootstrap safe) */
    .iti__flag {
        background-image: url("https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/img/flags.png");
    }

    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .iti__flag {
            background-image: url("https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/img/flags@2x.png");
        }
    }
</style>

@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-12">

            <div class="mb-6 d-flex justify-content-between align-items-center">
                <h1 class="h2">Modifier le créancier</h1>
                <a class="btn btn-dark" href="{{ route('superadmin.creance.index') }}">
                    Retour à la liste
                </a>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('superadmin.dashboard') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('superadmin.creance.index') }}">Clients</a>
                    </li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>

            <form action="{{ route('superadmin.creance.update', $creance->public_id) }}"
                  method="POST"
                  id="editForm"
                  novalidate>

                @csrf
                @method('PUT')

                <div class="card shadow-sm border-0 p-4">

                    <div class="mb-5">
                        <h3 class="h5 border-bottom pb-3">
                            Informations Générales
                        </h3>
                    </div>

                    <div class="row g-4">

                        <div class="col-md-4">
                            <label class="form-label fw-bold">ID Créancier</label>
                            <input type="text"
                                   class="form-control bg-light"
                                   value="{{ $creance->public_id }}"
                                   readonly>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label fw-bold">Nom du créancier</label>
                            <input type="text"
                                   name="nom"
                                   class="form-control @error('nom') is-invalid @enderror"
                                   value="{{ old('nom', $creance->nom) }}"
                                   placeholder="Ex : Jean Dupont"
                                   required>

                            @error('nom')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Numéro de téléphone</label>
                            <input type="tel"
                                   id="phone"
                                   name="telephone"
                                   class="form-control @error('telephone') is-invalid @enderror"
                                   value="{{ old('telephone', $creance->telephone) }}"
                                   required>

                            {{-- Erreur Laravel --}}
                            @error('telephone')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Erreur JS --}}
                            <div class="invalid-feedback" id="phone-error" style="display:none;">
                                Numéro de téléphone invalide
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Adresse</label>
                            <input type="text"
                                   name="adresse"
                                   class="form-control @error('adresse') is-invalid @enderror"
                                   value="{{ old('adresse', $creance->adresse) }}"
                                   placeholder="Ex : Dakar, Plateau">

                            @error('adresse')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary px-5">
                                Mettre à jour le créancier
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- JS intl-tel-input --}}
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("editForm");
    const phoneInput = document.getElementById("phone");
    const phoneError = document.getElementById("phone-error");

    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "auto",
        separateDialCode: true,
        nationalMode: false,
        preferredCountries: ["ml", "sn", "ci", "fr", "us"],
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("ml"));
        }
    });

    form.addEventListener("submit", function (e) {
        phoneError.style.display = "none";
        phoneInput.classList.remove("is-invalid");

        if (!iti.isValidNumber()) {
            e.preventDefault();
            phoneError.style.display = "block";
            phoneInput.classList.add("is-invalid");
            phoneInput.focus();
            return false;
        }

        // Numéro au format international
        phoneInput.value = iti.getNumber();
    });

});
</script>

@endsection
