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


        .btn-primary:hover {
            background-color: #e6c200;
            border-color: #e6c200;
            color: #000;
            transform: scale(1.02);
        }

        /* Style pour la grille d'images */
        .about_us_content .col-6 {
            padding: 10px;
            /* Espace entre les images */
        }

        .about_us_content img {
            width: 100%;
            height: 200px;
            /* Hauteur fixe pour l'harmonie */
            object-fit: cover;
            /* Recadre l'image sans la déformer */
            border-radius: 15px;
            /* Bordures arrondies */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .about_us_content img:hover {
            transform: scale(1.05);
            /* Effet de zoom au survol */
        }
    </style>

    <section class="about_us_area section_padding_100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="about_us_content pb-5 pb-lg-0">
                        <div class="row g-0">
                            <div class="col-6">
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
                    <h5 class="mb-3">L'équipe <span style="color: #FFD700;">Kaoural</span></h5>
                    <p>Découvrez les personnes passionnées qui portent le projet Kaoural et contribuent chaque jour à son succès.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10"> <div class="testimonials_slides owl-carousel">

                    <div class="single_tes_slide">
                        <div class="team-card">
                            <div class="member-img-container">
                                <img src="{{ asset('kaoural/img/mon.png') }}" alt="Mountaga N'DIAYE">
                            </div>
                            <h6>"Ici trouvez les meilleurs matériaux au meilleur prix."</h6>
                            <p class="member-name">Mountaga N'DIAYE</p>
                            <span class="member-role">Promoteur de la Quincaillerie Kaoural</span>
                        </div>
                    </div>

                    <div class="single_tes_slide">
                        <div class="team-card">
                            <div class="member-img-container">
                                <img src="{{ asset('kaoural/img/ndiaye.png') }}" alt="Seydou N'DIAYE">
                            </div>
                            <h6>"J'assure le bon fonctionnement du site."</h6>
                            <p class="member-name">Seydou N'DIAYE</p>
                            <span class="member-role">Ingénieur Informaticien</span>
                        </div>
                    </div>

                    <div class="single_tes_slide">
                        <div class="team-card">
                            <div class="member-img-container">
                                <img src="{{ asset('kaoural/img/salia.png') }}" alt="Salia Traoré">
                            </div>
                            <h6>"Garant de votre satisfaction au quotidien."</h6>
                            <p class="member-name">Salia Traoré</p>
                            <span class="member-role">Agent Technique</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Style général de la section */
    .testimonials_area {
        background-color: #f9f9f9;
        font-family: 'MV Boli', 'Comic Sans MS', cursive;
    }

    /* La carte individuelle */
    .team-card {
        background: #ffffff;
        padding: 40px 20px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin: 15px; /* Espace pour l'ombre */
        border: 1px solid #eee;
        transition: transform 0.3s ease;
        text-align: center;
    }

    .team-card:hover {
        transform: translateY(-10px);
        border-color: #FFD700;
    }

    /* Conteneur d'image pour éviter la déformation */
    .member-img-container {
        width: 150px;
        height: 150px;
        margin: 0 auto 25px;
        border-radius: 50%;
        border: 4px solid #FFD700; /* Cercle doré comme sur l'image */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
    }

    .member-img-container img {
        width: 100% !important; /* Force Owl Carousel à respecter la taille */
        height: 100% !important;
        object-fit: cover; /* Recadre l'image proprement sans l'écraser */
    }

    /* Typographies */
    .team-card h6 {
        font-style: italic;
        color: #555;
        margin-bottom: 20px;
        font-size: 1.1rem;
        line-height: 1.5;
        min-height: 60px; /* Aligne les textes même si longueurs différentes */
    }

    .member-name {
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
        font-size: 1.2rem;
        text-transform: uppercase;
    }

    .member-role {
        color: #FFD700;
        font-weight: 600;
        font-size: 0.9rem;
        display: block;
    }

    /* Customisation des points de navigation Owl Carousel */
    .owl-dots {
        margin-top: 30px;
    }
    .owl-dot span {
        background: #ddd !important;
        width: 12px !important;
        height: 12px !important;
    }
    .owl-dot.active span {
        background: #FFD700 !important;
    }
</style>
    <!-- Testimonial Area End -->



@endsection
