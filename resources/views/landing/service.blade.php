@extends('landing.layouts.navbar')
@section('title','Services de la Quincaillerie Kaoural')
@section('suite')


<!-- Features Area -->
<style>
    /* Application de la police MV Boli */
    .features-area h5, 
    .features-area p {
        font-family: 'MV Boli', 'Comic Sans MS', cursive;
    }

    .features-area h5 {
        font-weight: bold;
        margin-top: 15px;
        color: #333;
    }

    .features-area p {
        color: #666;
        font-size: 0.95rem;
    }

    /* Style des icônes */
    .single-service-area i {
        font-size: 40px;
        color: #FFD700; /* Couleur dorée pour rappeler la quincaillerie */
        transition: 0.3s;
        display: inline-block;
    }

    /* Animation au survol */
    .single-service-area {
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        transition: 0.3s;
        text-align: center;
    }

    .single-service-area:hover {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transform: translateY(-5px);
    }

    .single-service-area:hover i {
        transform: rotateY(360deg); /* Petit effet de rotation de l'icône */
        color: #e6c200;
    }
</style>


<section class="features-area mb-50 py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="0.1s">
                    <i class="icofont-ui-chat"></i>
                    <h5>Conseils personnalisés</h5>
                    <p>Nos experts vous accompagnent pour choisir les matériaux adaptés à vos projets.</p>
                </div>
            </div>
            
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="0.2s">
                    <i class="icofont-calculator-alt-2"></i>
                    <h5>Devis rapide</h5>
                    <p>Obtenez un devis clair et précis pour vos achats en toute transparence.</p>
                </div>
            </div>
            
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="icofont-fast-delivery"></i>
                    <h5>Livraison fiable</h5>
                    <p>Nous assurons la livraison de vos matériaux dans les meilleurs délais.</p>
                </div>
            </div>
            
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="0.4s">
                    <i class="icofont-badge"></i>
                    <h5>Produits de qualité</h5>
                    <p>Kaoural sélectionne les meilleurs matériels pour garantir durabilité et performance.</p>
                </div>
            </div>
            
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="0.5s">
                    <i class="icofont-support"></i>
                    <h5>Service après-vente</h5>
                    <p>Un suivi attentif pour répondre à vos besoins même après l’achat.</p>
                </div>
            </div>
            
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="0.6s">
                    <i class="icofont-history"></i>
                    <h5>20 ans d’expérience</h5>
                    <p>Depuis plus de deux décennies, Kaoural est votre partenaire de confiance.</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

