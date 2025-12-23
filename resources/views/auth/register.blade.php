@extends('layouts.login')
@section('title', 'S\'inscrire - Kaoural')
@section('suite')
    
   <section class="overflow-hidden min-vh-100 d-flex">
        <div class="row gx-0 gy-8 w-100">
            <div class="col-12 col-xl-6 order-xl-last">
                <div class="max-w-lg mx-auto h-100 p-3 p-xl-4">
                    <div class="row h-100">
                        <!-- Header Top -->
                        <header class="col-12 pb-9">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('kaoural/img/logo kaoural.png') }}" height="40" alt="logo">
                            </a>
                        </header>

                        <div class="col-12">
                            <!-- Eyeball Heading -->
                            <h1 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
                                S'inscrire
                            </h1>

                            <!-- Subheading -->
                            <p class="m-0 pb-8 text-body-emphasis text-balance text-5xl leading-tight tracking-tight fw-semibold">
                                Créer votre compte.
                            </p>

                            <div class="pb-xl-9">
                                <div class="row gy-6 gx-sm-6">
                                    <div class="col-12 col-md-6">
                                        <label for="firstName" class="form-label">
                                            Nom
                                            <span class="text-danger-emphasis"> * </span>
                                        </label>

                                        <input type="text" class="form-control" name="firstName" id="firstName">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="lastName" class="form-label">
                                            Prénom
                                            <span class="text-danger-emphasis"> * </span>
                                        </label>

                                        <input type="text" class="form-control" name="lastName" id="lastName">
                                    </div>

                                     <div class="col-12 col-md-6">
                                        <label for="firstName" class="form-label">
                                            Numero de téléphone
                                            <span class="text-danger-emphasis"> * </span>
                                        </label>

                                        <input type="text" class="form-control" name="firstName" id="firstName">
                                    </div>
                                     <div class="col-12 col-md-6">
                                        <label for="firstName" class="form-label">
                                            Adresse
                                            <span class="text-danger-emphasis"> * </span>
                                        </label>

                                        <input type="text" class="form-control" name="firstName" id="firstName">
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">
                                            Email
                                            <span class="text-danger-emphasis"> * </span>
                                        </label>

                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">
                                            Mot de passe 
                                            <span class="text-danger-emphasis"> * </span>
                                        </label>

                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="pt-3">
                                            <button type="submit" class="btn btn-lg btn-primary text-center w-100 rounded-pill">
                                                S'inscrire 
                                            </button>
                                        </div>

                                        <p class="m-0 mt-4 text-body text-xs leading-6 text-center">
                                           Vous avez déjà un compte ?
                                            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Se connecter </a>.
                                        </p>
                                    </div>

                                    {{-- <div class="col-12">
                                        <div class="position-relative mt-6 mt-sm-7 mb-5">
                                            <hr class="text-body-emphasis opacity-10 m-0">
                                            <span class="text-sm fst-italic position-absolute start-50 top-0 translate-middle px-4 bg-body"> ou </span>
                                        </div>
                                    </div>

                                    <!-- Sign up with other apps -->
                                    <div class="col-12">
                                        <div class="d-flex gap-4 justify-content-between">
                                            <button type="submit" class="btn text-body text-body-emphasis-hover bg-body-secondary bg-body-tertiary-hover border text-center w-100 rounded-pill transition ease-in-out delay-150 duration-1000 transform scale-105-hover">
                                                <svg width="1rem" height="1rem" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"> <g> <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path> </g> </svg>
                                            </button>

                                            <button type="submit" class="btn text-body text-body-emphasis-hover bg-body-secondary bg-body-tertiary-hover border text-center w-100 rounded-pill transition ease-in-out delay-150 duration-1000 transform scale-105-hover">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" viewBox="0 0 16 16"> <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/> </svg>
                                            </button>
                                        </div>
                                    </div>
                                     --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-6" data-bs-theme="dark">
                <div class="overflow-hidden position-relative position-xl-fixed top-0 bottom-0 start-0 end-50 d-flex align-items-center">
                    <div class="overflow-hidden position-absolute z-n1 top-0 end-0 bottom-0 start-0 m-sm-3 m-xl-4 border border-body-secondary rounded-top-5 rounded-sm-5 rounded-xl-6">
                        <!-- Background image -->
                        <img src="{{ asset('kaoural/img/logo kaoural.png') }}" class="position-absolute z-n1 top-0 h-100 w-100 object-fit-cover filter brightness-150 contrast-125 grayscale-100" alt="Sign Up's testimonial">

                        <!-- Colorize the image -->
                        <div class="position-absolute z-n1 top-0 h-100 w-100 bg-header mix-blend-multiply"></div>

                        <!-- Gradient from the top-start corner -->
                        <div class="position-absolute z-n1 top-0 start-0 mt-n8 ms-n8" data-aos-delay="0" data-aos="fade-down-right" data-aos-duration="3000">
                            <svg class="rtl-flip filter blur-3xl gradient-header" height="160" viewBox="0 0 16512 9984" xmlns="http://www.w3.org/2000/svg"> 
                                <!-- Define the gradient -->
                                <defs>
                                    <!--  
                                        Gradient direction:
                                        Starts at the top-start corner (x1="0%", y1="0%") 
                                        Ends at the bottom-end corner (x2="100%", y2="100%") 
                                    -->
                                    <linearGradient id="gradientHeaderBody1" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <!-- Start color --> 
                                        <stop offset="0%" class="gradient-start"/> 
                                        <!-- Middle color --> 
                                        <stop offset="50%" class="gradient-mid"/> 
                                        <!-- End color --> 
                                        <stop offset="100%" class="gradient-end"/>
                                    </linearGradient>
                                </defs>

                                <!-- Apply the gradient to the path -->
                                <path fill="url(#gradientHeaderBody1)" d="M0 0V9984L16512 0H0Z"/> 
                            </svg>
                        </div>

                        <!-- Gradient from the bottom-end corner  -->
                        <div class="position-absolute z-n1 bottom-0 end-0 mb-n8 me-n8" data-aos-delay="0" data-aos="fade-up-left" data-aos-duration="3000">
                            <svg class="rtl-flip filter blur-3xl gradient-header" height="160" viewBox="0 0 16512 9984" xmlns="http://www.w3.org/2000/svg"> 
                                <!-- Define the gradient -->
                                <defs>
                                    <!--
                                        Gradient direction:
                                        Starts at the bottom-end corner (x1="100%", y1="100%")
                                        Ends at the top-start corner (x2="0%", y2="0%")
                                    -->
                                    <linearGradient id="gradientHeaderBody2" x1="100%" y1="100%" x2="0%" y2="0%">
                                        <!-- Start color --> 
                                        <stop offset="0%" class="gradient-start"/> 
                                        <!-- Middle color --> 
                                        <stop offset="50%" class="gradient-mid"/> 
                                        <!-- End color --> 
                                        <stop offset="100%" class="gradient-end"/>
                                    </linearGradient>
                                </defs>

                                <!-- Apply the gradient to the path -->
                                <path fill="url(#gradientHeaderBody2)" d="M16512 9984V0L0 9984H16512Z"/> 
                            </svg>
                        </div>
                    </div>

                    <!-- Client Review -->
                    <div class="mx-auto max-w-4xl text-center px-6 px-sm-8 py-10">
                        <!-- Client's Logo Company -->
                        <img src="{{ asset('kaoural/img/logo kaoural.png') }}" height="48" alt="Company's logo">

                        <figure class="m-0 mt-7">
                            <blockquote class="text-body-emphasis text-pretty text-2xl leading-9 fw-semibold">
                                <!-- Client Review: Add the client's review text here -->
                                <p class="m-0">
                                    “Rejoignez Quincaillerie Kaoural dès aujourd’hui ! Créez votre compte et profitez d’offres exclusives, d’un suivi personnalisé et d’une expérience rapide et sécurisée. ”
                                </p>
                            </blockquote>

                            <figcaption class="m-0 mt-7">
                                <!-- Client's Photoshoot -->
                                <img src="{{ asset('kaoural/img/bg-img/1.jpg') }}" class="rounded-circle border" width="40" height="40" alt="Client's photoshoot">

                                <div class="mt-4 d-flex align-items-center justify-content-center text-base">
                                    <!-- Client's Name -->
                                    <h6 class="m-0 text-body-emphasis fw-semibold">
                                        Mountaga N'DIAYE
                                    </h6>

                                    <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="mx-3 text-body-emphasis" fill="currentColor"> <circle cx="1" cy="1" r="1" /> </svg>

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


@endsection