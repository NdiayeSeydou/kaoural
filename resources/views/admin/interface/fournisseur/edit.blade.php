@extends('admin.layout.navbar')
@section('title', 'Modifier un fournisseur | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-12">

            <!-- HEADER -->
            <div class="mb-6 d-flex justify-content-between align-items-center">
                <h1 class="h2">Modifier un fournisseur</h1>
                <a class="btn btn-dark" href="{{ route('admin.fournisseur.index') }}">
                    Retour à la liste
                </a>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.fournisseur.index') }}">Fournisseurs</a></li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>

            <!-- FORMULAIRE -->
            <form action="{{ route('admin.fournisseur.update', $fournisseur->public_id) }}" method="POST" id="fournisseur-form" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <h3>Détails du fournisseur</h3>
                    <div class="row g-4">

                        <!-- Nom du fournisseur -->
                        <div class="col-md-6">
                            <label class="form-label">Nom du fournisseur</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Ex: Seydou Traoré"
                                value="{{ old('name', $fournisseur->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Adresse -->
                        <div class="col-md-6">
                            <label class="form-label">Adresse</label>
                            <input type="text" name="adresse"
                                class="form-control"
                                placeholder="Ex: Bamako, Bacodjicoroni golf"
                                value="{{ old('adresse', $fournisseur->adresse) }}">
                        </div>

                        <!-- Téléphone avec validation JS + Laravel -->
                        <div class="col-md-6">
                            <label class="form-label">Numéro de téléphone</label>
                            <input type="tel" id="phone" name="telephone"
                                class="form-control @error('telephone') is-invalid @enderror"
                                value="{{ old('telephone', $fournisseur->telephone) }}" required>

                            {{-- Erreur Laravel --}}
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- Erreur JS --}}
                            <div class="invalid-feedback" id="phone-error" style="display: none;">
                                Numéro de téléphone invalide
                            </div>
                        </div>

                        <!-- Catégorie -->
                        <div class="col-md-6">
                            <label class="form-label">Catégorie</label>
                            <select name="categorie_id" class="form-select @error('categorie_id') is-invalid @enderror" required>
                                <option value="" disabled>-- Sélectionner une catégorie --</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"
                                        {{ (old('categorie_id', $fournisseur->categorie_id) == $categorie->id) ? 'selected' : '' }}>
                                        {{ $categorie->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categorie_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Boutons -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">
                                Mettre à jour le fournisseur
                            </button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- JS pour intl-tel-input --}}
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("fournisseur-form");
    const phoneInput = document.getElementById("phone");
    const phoneError = document.getElementById("phone-error");

    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "auto",
        separateDialCode: true,
        nationalMode: false,
        preferredCountries: ["ml", "sn", "ci", "fr", "us"],
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        geoIpLookup: function(callback) {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("ml"));
        }
    });

    form.addEventListener("submit", function (e) {
        // Réinitialisation
        phoneError.style.display = "none";
        phoneInput.classList.remove("is-invalid");

        // Validation
        if (!iti.isValidNumber()) {
            e.preventDefault();
            phoneError.style.display = "block";
            phoneInput.classList.add("is-invalid");
            phoneInput.focus();
            return false;
        }

        // Remplacement par le format international
        phoneInput.value = iti.getNumber();
    });
});
</script>

@endsection
