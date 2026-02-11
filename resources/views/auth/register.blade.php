@extends('layouts.login')
@section('title', 'S\'inscrire - Kaoural')
@section('suite')

    <section class="overflow-hidden min-vh-100 d-flex">
        <div class="row gx-0 gy-8 w-100">
            <div class="col-12 col-xl-6 order-xl-last">
                <div class="max-w-lg mx-auto h-100 p-3 p-xl-4">
                    <div class="row h-100">

                        <!-- Header -->
                        <header class="col-12 pb-9">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('kaoural/img/logo kaoural.png') }}" height="40" alt="logo">
                            </a>
                        </header>

                        <div class="col-12">
                            <h1 class="m-0 text-primary-emphasis fw-semibold">S'inscrire</h1>
                            <p class="m-0 pb-8 text-body-emphasis fw-semibold">Créer votre compte.</p>

                            <div class="pb-xl-9">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row gy-6 gx-sm-6">

                                        <!-- Nom -->
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Nom *</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Prénom -->
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Prénom *</label>
                                            <input type="text" name="surname"
                                                class="form-control @error('surname') is-invalid @enderror"
                                                value="{{ old('surname') }}">
                                            @error('surname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Téléphone -->
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Numéro de téléphone *</label>

                                            {{-- Input visible pour JS / intl-tel-input --}}
                                            <input type="tel" id="phone"
                                                class="form-control @error('telephone') is-invalid @enderror"
                                                placeholder="">

                                            {{-- Input caché pour envoyer la valeur au backend --}}
                                            <input type="hidden" name="telephone" id="telephone"
                                                value="{{ old('telephone') }}">

                                            {{-- Message d'erreur JS --}}
                                            <div class="invalid-feedback" id="phone-error">
                                                Le numéro de téléphone n'est pas valide pour le pays sélectionné.
                                            </div>

                                            {{-- Message Laravel --}}
                                            @error('telephone')
                                                <div class="invalid-feedback d-block" id="laravel-phone-error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>



                                        <!-- Adresse -->
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Adresse</label>
                                            <input type="text" name="adresse"
                                                class="form-control @error('adresse') is-invalid @enderror"
                                                value="{{ old('adresse') }}">
                                            @error('adresse')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="col-12">
                                            <label class="form-label">Email *</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Mot de passe -->
                                        <div class="col-12">
                                            <label class="form-label">Mot de passe *</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror">
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback d-block">
                                                    <ul class="mb-0">
                                                        @foreach ($errors->get('password') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Confirmation -->
                                        <div class="col-12">
                                            <label class="form-label">Confirmer le mot de passe *</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>

                                        <!-- Bouton -->
                                        <div class="col-12 pt-3">
                                            <button type="submit" class="btn btn-lg btn-primary w-100 rounded-pill">
                                                S'inscrire
                                            </button>

                                            <p class="mt-4 text-center text-xs">
                                                Vous avez déjà un compte ?
                                                <a href="{{ route('login') }}" class="fw-semibold">Se connecter</a>
                                            </p>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Colonne droite (design inchangé) --}}
            <div class="col-12 col-xl-6" data-bs-theme="dark">
                <div
                    class="overflow-hidden position-relative position-xl-fixed top-0 bottom-0 start-0 end-50 d-flex align-items-center">
                    <div
                        class="overflow-hidden position-absolute z-n1 top-0 end-0 bottom-0 start-0 m-sm-3 m-xl-4 border border-body-secondary rounded-top-5 rounded-sm-5 rounded-xl-6">
                        <!-- Background image -->
                        <img src="{{ asset('kaoural/img/logo kaoural.png') }}"
                            class="position-absolute z-n1 top-0 h-100 w-100 object-fit-cover filter brightness-150 contrast-125 grayscale-100"
                            alt="Logo de kaoural">

                        <!-- Colorize the image -->
                        <div class="position-absolute z-n1 top-0 h-100 w-100 bg-header mix-blend-multiply"></div>

                        <!-- Gradient from the top-start corner -->
                        <div class="position-absolute z-n1 top-0 start-0 mt-n8 ms-n8" data-aos-delay="0"
                            data-aos="fade-down-right" data-aos-duration="3000">
                            <svg class="rtl-flip filter blur-3xl gradient-header" height="160" viewBox="0 0 16512 9984"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Define the gradient -->
                                <defs>
                                    <!--
                                                                                                                        Gradient direction:
                                                                                                                        Starts at the top-start corner (x1="0%", y1="0%")
                                                                                                                        Ends at the bottom-end corner (x2="100%", y2="100%")
                                                                                                                    -->
                                    <linearGradient id="gradientHeaderBody1" x1="0%" y1="0%" x2="100%"
                                        y2="100%">
                                        <!-- Start color -->
                                        <stop offset="0%" class="gradient-start" />
                                        <!-- Middle color -->
                                        <stop offset="50%" class="gradient-mid" />
                                        <!-- End color -->
                                        <stop offset="100%" class="gradient-end" />
                                    </linearGradient>
                                </defs>

                                <!-- Apply the gradient to the path -->
                                <path fill="url(#gradientHeaderBody1)" d="M0 0V9984L16512 0H0Z" />
                            </svg>
                        </div>

                        <!-- Gradient from the bottom-end corner  -->
                        <div class="position-absolute z-n1 bottom-0 end-0 mb-n8 me-n8" data-aos-delay="0"
                            data-aos="fade-up-left" data-aos-duration="3000">
                            <svg class="rtl-flip filter blur-3xl gradient-header" height="160" viewBox="0 0 16512 9984"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Define the gradient -->
                                <defs>
                                    <!--
                                                                                                                        Gradient direction:
                                                                                                                        Starts at the bottom-end corner (x1="100%", y1="100%")
                                                                                                                        Ends at the top-start corner (x2="0%", y2="0%")
                                                                                                                    -->
                                    <linearGradient id="gradientHeaderBody2" x1="100%" y1="100%"
                                        x2="0%" y2="0%">
                                        <!-- Start color -->
                                        <stop offset="0%" class="gradient-start" />
                                        <!-- Middle color -->
                                        <stop offset="50%" class="gradient-mid" />
                                        <!-- End color -->
                                        <stop offset="100%" class="gradient-end" />
                                    </linearGradient>
                                </defs>

                                <!-- Apply the gradient to the path -->
                                <path fill="url(#gradientHeaderBody2)" d="M16512 9984V0L0 9984H16512Z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Client Review -->
                    <div class="mx-auto max-w-4xl text-center px-6 px-sm-8 py-10">
                        <!-- Client's Logo Company -->
                        <img src="{{ asset('kaoural/img/logo kaoural.png') }}" height="48" alt="Logo de kaoural">

                        <figure class="m-0 mt-7">
                            <blockquote class="text-body-emphasis text-pretty text-2xl leading-9 fw-semibold">
                                <!-- Client Review: Add the client's review text here -->
                                <p class="m-0">
                                    “Rejoignez Quincaillerie Kaoural dès aujourd’hui ! Créez votre compte et profitez
                                    d’offres exclusives, d’un suivi personnalisé et d’une expérience rapide et
                                    sécurisée. ”
                                </p>
                            </blockquote>

                            <figcaption class="m-0 mt-7">
                                <!-- Client's Photoshoot -->
                                <img src="{{ asset('kaoural/img/logo kaoural.png') }}" class="rounded-circle border"
                                    width="40" height="40" alt="Logo de kaoural">

                                <div class="mt-4 d-flex align-items-center justify-content-center text-base">
                                    <!-- Client's Name -->
                                    <h6 class="m-0 text-body-emphasis fw-semibold">
                                        Mountaga N'DIAYE
                                    </h6>

                                    <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true"
                                        class="mx-3 text-body-emphasis" fill="currentColor">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>

                                    <!-- Client's Profession -->
                                    <div class="text-body">
                                        Promoteur de la Quincaillerie Kaoural
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>

        </div>
    </section>





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

        // Validation live du téléphone
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
                hiddenPhoneInput.value = iti.getNumber();
                return true;
            }
        }

        phoneInput.addEventListener("blur", validatePhone);

        // Ne bloque plus le submit, juste aide l'utilisateur
        const form = phoneInput.closest("form");
        form.addEventListener("submit", function() {
            validatePhone(); // marque le champ invalide si nécessaire
        });
    </script>




@endsection
