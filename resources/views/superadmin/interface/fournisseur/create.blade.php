@extends('superadmin.layout.navbar')
@section('title', 'Ajouter un fournisseur | kaoural')
@section('suite')

    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-12">

                <!-- HEADER -->
                <div class="mb-6 d-flex justify-content-between align-items-center">
                    <h1 class="h2">Ajouter un fournisseur</h1>
                    <a class="btn btn-dark" href="{{ route('superadmin.fournisseur.index') }}">
                        Retour à la liste
                    </a>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('superadmin.fournisseur.index') }}">Fournisseurs</a></li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </nav>

                <!-- ================== FORMULAIRE FOURNISSEUR ================== -->
                <div class="mb-5">
                    <h3>Nouveau fournisseur</h3>

                    <div class="row g-4">

                        <!-- Nom du fournisseur -->
                        <div class="col-md-6">
                            <label class="form-label">Nom du fournisseur</label>
                            <input type="text" class="form-control" placeholder="Ex: Seydou Traoré">
                        </div>

                        <!-- Numéro de téléphone avec indicatif -->
                      

                        <!-- Adresse -->
                        <div class="col-md-6">
                            <label class="form-label">Adresse</label>
                            <input type="text" class="form-control" placeholder="Ex: Bamako, Kalaban Coura">
                        </div>

                         <div class="col-md-6">
                            <label class="form-label">Numéro de téléphone</label>
                            <input type="number" id="phone" class="form-control" placeholder="Numéro de téléphone">
                        </div>

                        <!-- Catégorie -->
                        <div class="col-md-6">
                            <label class="form-label">Catégorie</label>
                            <select class="form-select">
                                <option selected disabled>-- Sélectionner une catégorie --</option>
                                <option>Accessoires</option>
                                <option>Électronique</option>
                                <option>Vêtements</option>
                                <option>Cosmétiques</option>
                            </select>
                        </div>

                         

                        <!-- Bouton -->
                        <div class="col-12 text-end">
                            <button class="btn btn-success">
                                Enregistrer le fournisseur
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        const phoneInput = document.querySelector("#phone");

        window.intlTelInput(phoneInput, {
            initialCountry: "ml", // Mali par défaut
            separateDialCode: true,
            preferredCountries: ["ml", "sn", "ci", "fr"],
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
        });
    </script>


@endsection
