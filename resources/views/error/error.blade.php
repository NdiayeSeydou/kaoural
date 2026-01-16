@extends('superadmin.layout.navbar')
@section('title', 'Erreur | kaoural')
@section('suite')


    <main class="vh-100 d-flex align-items-center justify-content-center">
        <section class="container">
            <!-- row -->
            <div class="row justify-content-center">
                <!-- col -->
                <div class="col-12">
                    <!-- content -->
                    <div class="text-center">
                        <div>
                            <!-- img -->
                            <img src="{{ asset('dash/assets/images/png/error.jpg') }}" alt="404 Erreur" class="img-fluid" />
                        </div>
                        <!-- text -->
                        <h1 class="display-4">Oups! cette page n'existe pas.</h1>
                        <p class="mb-6 fs-5">Ou simplement tirer parti de l’expertise de notre équipe de consultation..</p>
                        <!-- button -->
                        <a class='btn btn-primary btn-lg' href='{{ route('home') }}'>Retout à l'accueil</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="position-absolute end-0 bottom-0 m-4">
            <div class="dropdown">
                <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button"
                    aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                    <i class="bi theme-icon-active lh-1"><i class="bi theme-icon bi-sun-fill"></i></i>
                    <span class="visually-hidden bs-theme-text">Toggle theme</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center active"
                            data-bs-theme-value="light" aria-pressed="true">
                            <i class="ti theme-icon ti ti-sun"></i>
                            <span class="ms-2">Light</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                            aria-pressed="false">
                            <i class="ti theme-icon ti-moon-stars"></i>
                            <span class="ms-2">Dark</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto"
                            aria-pressed="false">
                            <i class="ti theme-icon ti-circle-half-2"></i>
                            <span class="ms-2">Auto</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </main>







@endsection
