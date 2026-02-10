@extends('landing.layouts.navbar')
@section('title', 'A propos de la quincaillerie Kaoural')
@section('suite')


  <style>
    /* Application de la police MV Boli au texte de la section À Propos */
    .about-text-content h5 {
        font-family: 'MV Boli', 'Comic Sans MS', cursive;
        font-size: 1.8rem;
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .about-text-content p {
        font-family: 'MV Boli', 'Comic Sans MS', cursive;
        line-height: 1.8;
        color: #555;
    }

    /* Style pour la grille d'images */
    .about_us_content .col-6 {
        padding: 10px; /* Espace entre les images */
    }

    .about_us_content img {
        width: 100%;
        height: 200px; /* Hauteur fixe pour l'harmonie */
        object-fit: cover; /* Recadre l'image sans la déformer */
        border-radius: 15px; /* Bordures arrondies */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .about_us_content img:hover {
        transform: scale(1.05); /* Effet de zoom au survol */
    }
</style>

<section class="about_us_area section_padding_100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="about_us_content pb-5 pb-lg-0">
                    <div class="row g-0"> <div class="col-6">
                            <img src="{{ asset('kaoural/lavabo robinet.webp') }}" alt="Lavabo">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('kaoural/wc.webp') }}" alt="Sanitaire">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('kaoural/ampoule.webp') }}" alt="Éclairage">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('kaoural/lustre.webp') }}" alt="Décoration">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="about-text-content pl-0 pl-lg-5">
                    <h5>La Quincaillerie Kaoural, plus de 20 ans d’expérience</h5>
                    <p>
                        Depuis plus de deux décennies, la quincaillerie Kaoural accompagne ses clients avec passion et
                        professionnalisme. 
                    </p>
                    <p>
                        Nous proposons les meilleurs matériaux et équipements, alliant qualité, fiabilité et prix
                        compétitifs, afin de répondre aux besoins des particuliers comme des professionnels.
                    </p>
                    <p>
                        Notre engagement est simple : offrir le meilleur service et les produits les plus adaptés pour
                        bâtir vos projets en toute confiance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- About Us Area -->



    <!-- Cool Facts Area -->
    <section class="about_us_one cool_facts_area section_padding_100_70 bg-overlay jarallax"
        style="background-image: url({{ asset('kaoural/img/bg-img/wc-luxe.jpg') }});">
        <div class="container">
            <div class="row">
                <!-- Single Cool Facts -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="cool_fact_text text-center wow fadeInUp" data-wow-delay="0.2s">
                        <h2><span class="counter">20</span>+</h2>
                        <h5>Années d'expériences</h5>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="cool_fact_text text-center wow fadeInUp" data-wow-delay="0.4s">
                        <h2><span class="counter">3350</span>+</h2>
                        <h5>Clients satisfaits</h5>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="cool_fact_text text-center wow fadeInUp" data-wow-delay="0.6s">
                        <h2><span class="counter">7815</span>+</h2>
                        <h5>nombre de visites</h5>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="cool_fact_text text-center wow fadeInUp" data-wow-delay="0.8s">
                        <h2><span class="counter">70</span>%</h2>
                        <h5>Retour Clients</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cool Facts Area End -->

    <!-- Testimonial Area -->
    <section class="testimonials_area bg-gray section_padding_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="popular_section_heading mb-50 text-center">
                        <h5 class="mb-3">L'équipe Kaoural</h5>
                        <p>Découvrez les personnes passionnées qui portent le projet Kaoural et contribuent chaque jour à
                            son succès.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="testimonials_slides owl-carousel">

                        <!-- Membre 1 -->
                        <div class="single_tes_slide text-center">
                            <img src="img/partner-img/kaoural-1.png" alt="Photo membre équipe Kaoural">
                            <h6> Ici trouvez les meilleurs matériaux au meilleur prix.</h6>
                            <p>Mountaga N'DIAYE</p>
                            <span>Promoteur de la Quincaillerie Kaoural</span>
                        </div>

                        <!-- Membre 2 -->
                        <div class="single_tes_slide text-center">
                            <img src="img/partner-img/kaoural-2.png" alt="Photo membre équipe Kaoural">
                            <h6>J'assure le bon fonctionnement du site.</h6>
                            <p>Seydou N'DIAYE</p>
                            <span>Ingénieur Informaticien</span>
                        </div>

                        <!-- Membre 3 -->
                        <div class="single_tes_slide text-center">
                            <img src="img/partner-img/kaoural-3.png" alt="Photo membre équipe Kaoural">
                            <h6>garant de la satisfaction.</h6>
                            <p>Salia Traoré</p>
                            <span>Agent Technique</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->



@endsection
