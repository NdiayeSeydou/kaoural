@extends('superadmin.layout.navbar')
@section('title', 'Création d\'un nouvel utilisateur')
@section('suite')

<style>
    .input-group-text-custom {
        background-color: transparent !important;
        border-left: none !important;
        cursor: pointer;
        color: #6c757d;
        display: flex;
        align-items: center;
        padding-right: 15px;
    }
    .form-control-no-right-border { border-right: none !important; }
    .full-width-form-container { padding: 40px 0; }
    .iti { width: 100% !important; }
    .iti__tel-input { height: 38px !important; }
    /* Style pour les erreurs intl-tel-input */
    .is-invalid-phone { border-color: #dc3545 !important; }
</style>

<div class="container-fluid full-width-form-container">
    <div class="row">
        <div class="col-12 mb-4">
            <h2 class="fw-bold text-dark">Création d'un nouvel utilisateur</h2>
            <hr>
        </div>

        <form id="registrationForm" method="POST" action="{{ route('superadmin.user.store') }}" class="col-12">
            @csrf
            <div class="row gy-4">

                <div class="col-md-6 col-lg-4">
                    <label class="form-label fw-semibold">Prénom *</label>
                    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control @error('surname') is-invalid @enderror" placeholder="Ex: Moussa" required>
                    @error('surname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label fw-semibold">Nom *</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Diarra" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label fw-semibold">Numéro de téléphone *</label>
                    <input type="tel" id="phone" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid-phone @enderror" required>
                    <input type="hidden" name="telephone" id="telephone" value="{{ old('telephone') }}">
                    @error('telephone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    <div class="invalid-feedback" id="phone-error">Numéro non valide.</div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label fw-semibold">Rôle *</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>Choisir un rôle</option>
                        <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super-Administrateur</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                        <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                    </select>
                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label fw-semibold">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="exemple@kaoural.com" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label fw-semibold">Adresse</label>
                    <input type="text" name="adresse" value="{{ old('adresse') }}" class="form-control @error('adresse') is-invalid @enderror" placeholder="Ex: Rue 14, Bamako">
                    @error('adresse') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Mot de passe *</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control form-control-no-right-border @error('password') is-invalid @enderror" required>
                        <span class="input-group-text bg-white input-group-text-custom border-start-0" onclick="togglePassword('password')">
                            <i class="bi bi-eye"></i>
                        </span>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Confirmer le mot de passe *</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-no-right-border" required>
                        <span class="input-group-text bg-white input-group-text-custom border-start-0" onclick="togglePassword('password_confirmation')">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="col-12 pt-3">
                    <a href="{{ route('superadmin.user.index') }}" class="btn btn-outline-secondary ms-2">Annuler</a>
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">
                        Créer le nouvel utilisateur
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

<script>
    const phoneInput = document.querySelector("#phone");
    const hiddenPhoneInput = document.querySelector("#telephone");
    const phoneErrorDiv = document.querySelector("#phone-error");

    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "ml",
        separateDialCode: true,
        preferredCountries: ["ml", "sn", "ci", "fr"],
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
    });

    // Pré-remplir si erreur de validation
    if(hiddenPhoneInput.value) {
        iti.setNumber(hiddenPhoneInput.value);
    }

    function validatePhone() {
        if (phoneInput.value.trim()) {
            if (iti.isValidNumber()) {
                phoneInput.classList.remove("is-invalid-phone");
                phoneErrorDiv.style.display = "none";
                hiddenPhoneInput.value = iti.getNumber();
                return true;
            } else {
                phoneInput.classList.add("is-invalid-phone");
                phoneErrorDiv.style.display = "block";
                return false;
            }
        }
        return false;
    }

    phoneInput.addEventListener("blur", validatePhone);

    function togglePassword(id) {
        const input = document.getElementById(id);
        const icon = event.currentTarget.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("bi-eye", "bi-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("bi-eye-slash", "bi-eye");
        }
    }

    document.getElementById("registrationForm").addEventListener("submit", function(e) {
        if (!validatePhone()) {
            e.preventDefault();
            phoneInput.focus();
        }
    });
</script>

@endsection