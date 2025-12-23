@extends('layouts.login')
@section('title', 'Vérification de l\'adresse email | Kaoural')
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
                                Vérification
                            </h1>

                            <!-- Description paragraph -->
                            <p
                                class="m-0 pb-8 text-body-emphasis text-balance text-5xl leading-tight tracking-tight fw-semibold">
                                Vérifiez votre adresse email
                            </p>

                            <div class="pb-xl-9">
                                <div class="row gy-6 gx-sm-6">
                                    <div class="col-12">
                                        <label for="reset-code" class="form-label">
                                            Code de vérification
                                            <span class="text-danger-emphasis"> * </span>
                                        </label>

                                        <div class="d-flex gap-2">
                                            <input type="text" maxlength="1" class="form-control text-center"
                                                pattern="[0-9]*" inputmode="numeric">
                                            <input type="text" maxlength="1" class="form-control text-center"
                                                pattern="[0-9]*" inputmode="numeric">
                                            <input type="text" maxlength="1" class="form-control text-center"
                                                pattern="[0-9]*" inputmode="numeric">
                                            <input type="text" maxlength="1" class="form-control text-center"
                                                pattern="[0-9]*" inputmode="numeric">
                                            <input type="text" maxlength="1" class="form-control text-center"
                                                pattern="[0-9]*" inputmode="numeric">
                                            <input type="text" maxlength="1" class="form-control text-center"
                                                pattern="[0-9]*" inputmode="numeric">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary text-center w-100 rounded-pill">
                                            Vérifier mon email
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-6" data-bs-theme="dark">
                <div
                    class="overflow-hidden position-relative position-xl-fixed top-0 bottom-0 start-0 end-50 d-flex align-items-center">
                    <div
                        class="overflow-hidden position-absolute z-n1 top-0 end-0 bottom-0 start-0 m-sm-3 m-xl-4 border border-body-secondary rounded-top-5 rounded-sm-5 rounded-xl-6">
                        <!-- Background image -->
                        <img src="{{ asset('kaoural/img/logo kaoural.png') }}"
                            class="position-absolute z-n1 top-0 h-100 w-100 object-fit-cover filter brightness-150 contrast-125 grayscale-100"
                            alt="Reset Password's testimonial">

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
                                    <linearGradient id="gradientHeaderBody2" x1="100%" y1="100%" x2="0%"
                                        y2="0%">
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
                        <img src="{{ asset('kaoural/img/logo kaoural.png') }}" height="48" alt="Company's logo">

                        <figure class="m-0 mt-7">
                            <blockquote class="text-body-emphasis text-pretty text-2xl leading-9 fw-semibold">
                                <!-- Client Review: Add the client's review text here -->
                                <p class="m-0">
                                    “Chez Kaoural, nous croyons que la confiance commence par la sécurité. C’est pourquoi, avant de pouvoir vous connecter, nous vous invitons à vérifier votre adresse e‑mail. Cette étape simple garantit que vos informations restent protégées et que vous profitez pleinement de nos services. Ensemble, construisons avec assurance et sérénité. ”
                                </p>
                            </blockquote>

                            <figcaption class="m-0 mt-7">
                                <!-- Client's Photoshoot -->
                                <img src="{{ asset('kaoural/img/bg-img/1.jpg') }}" class="rounded-circle border"
                                    width="40" height="40" alt="Client's photoshoot">

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
                                        Promoteur de la quincaillerie Kaoural 
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
