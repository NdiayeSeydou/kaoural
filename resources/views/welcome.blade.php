@extends('landing.layouts.navbar')
@section('title', 'Quincaillerie Kaoural | Bienvenue à la quincaillerie kaoural')
@section('suite')

    <style>
        /* Importation de la police (si elle n'est pas installée localement,
                           le navigateur cherchera une police manuscrite similaire) */
        @font-face {
            font-family: 'MV Boli';
            src: local('MV Boli'), local('Comic Sans MS');
            /* Fallback si absent */
        }

        .hero-header {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("{{ asset('kaoural/vis.jpg') }}");
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;


            min-height: 50vh;

            display: flex;
            align-items: center;
            font-family: 'MV Boli', 'Comic Sans MS', cursive;
        }

        .hero-header h1 {
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .text-primary {
            color: #ffc107 !important;
        }

        /* Style du bouton pour qu'il s'accorde à la police */
        .hero-header .btn {
            font-family: 'MV Boli', sans-serif;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #e6c200;
            border-color: #e6c200;
            color: #000;
            transform: scale(1.02);
        }
    </style>

    <div class="container-fluid hero-header py-5 mb-5 mt-4">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h1 class="display-4 mb-3 animated bounceInDown text-white">
                        Commander chez <span class="text-primary">Quincaillerie Kaoural</span> <br>
                        pour tous vos projets de bricolage
                    </h1>
                    <p class="text-light mb-4 fs-5 animated fadeInUp">
                        Qualité garantie et livraison rapide pour tous vos travaux.
                    </p>
                    <a href="{{ route('produit') }}" class="btn btn-primary">
                        Commander maintenant
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--fin du carousel -->

    <!-- avantages de la quincaillerie kaoural-->
    <style>
        /* Application de la police MV Boli aux titres de cette section */
        .advantages-title,
        .service-item h5 {
            font-family: 'MV Boli', 'Comic Sans MS', cursive;
            font-weight: bold;
        }

        /* Effet au survol des cartes */
        .service-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-bottom: 3px solid transparent !important;
        }

        .service-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            border-bottom: 3px solid #FFD700 !important;
        }

        /* Animation de l'icône lors du survol */
        .service-item:hover i {
            transform: scale(1.1);
            transition: 0.3s;
        }
    </style>

    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <h1 class="display-5 mb-5 text-center advantages-title">
                Les avantages de Quincaillerie <span style="color: #FFD700;">Kaoural</span>
            </h1>

            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center bg-white border rounded shadow-sm p-4 h-100">
                        <i class="fas fa-hard-hat fa-3x mb-3" style="color: #FFD700;"></i>
                        <h5 class="mb-2">Expertise Locale</h5>
                        <p class="text-muted small">Des années d’expérience dans le matériel de construction et bricolage.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center bg-white border rounded shadow-sm p-4 h-100">
                        <i class="fas fa-wrench fa-3x mb-3" style="color: #FFD700;"></i>
                        <h5 class="mb-2">Produits de Qualité</h5>
                        <p class="text-muted small">Une large gamme d’outils, matériaux et accessoires fiables.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center bg-white border rounded shadow-sm p-4 h-100">
                        <i class="fas fa-tools fa-3x mb-3" style="color: #FFD700;"></i>
                        <h5 class="mb-2">Conseils Personnalisés</h5>
                        <p class="text-muted small">Un accompagnement sur mesure pour vos projets et besoins techniques.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center bg-white border rounded shadow-sm p-4 h-100">
                        <i class="fas fa-handshake fa-3x mb-3" style="color: #FFD700;"></i>
                        <h5 class="mb-2">Relation de Confiance</h5>
                        <p class="text-muted small">Une proximité et une transparence qui renforcent la fidélité de nos
                            clients.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- nos produits -->
    <section class="best_rated_onsale_top_sellares section_padding_100_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs_area">
                        <ul class="nav nav-tabs" role="tablist" id="product-tab">
                            <li class="nav-item">
                                <a href="#on-sale" class="nav-link active" data-toggle="tab" role="tab">Produit à
                                    vendre</a>
                            </li>
                            <li class="nav-item">
                                <a href="#top-sellers" class="nav-link" data-toggle="tab" role="tab">Nos Meilleures
                                    Ventes</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane fade show active" id="on-sale">
                                <div class="on_sale_area">
                                    <div class="row">
                                        @forelse($produitsAVendre as $produit)
                                            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                                                <div class="single_top_sellers">
                                                    <div class="top_seller_image">
                                                        <img src="{{ asset('storage/' . $produit->image) }}"
                                                            alt="{{ $produit->designation }}" class="product-img-fixed">
                                                    </div>
                                                    <div class="top_seller_desc">
                                                        <h5>{{ Str::limit($produit->designation, 20) }}</h5>
                                                        <h6>{{ number_format($produit->prix_unitaire, 0, ',', ' ') }} FCFA
                                                        </h6>

                                                        <div
                                                            class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                            <div class="ts_product_add_to_cart">
                                                                <a href="#" title="Ajouter au panier"><i
                                                                        class="icofont-shopping-cart"></i></a>
                                                            </div>
                                                            <div class="ts_product_quick_view px-2">
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#quickview-{{ $produit->id }}"><i
                                                                        class="icofont-eye-alt"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12 text-center py-5">
                                                <div class="no-product-message">
                                                    <i class="icofont-box" style="font-size: 3rem; color: #ccc;"></i>
                                                    <p class="mt-3 text-muted">Aucun produit n'est disponible pour le moment
                                                        dans cette section.</p>
                                                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm">Actualiser
                                                        la page</a>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="top-sellers">
                                <div class="top_sellers_area">
                                    <div class="row">
                                        @forelse($meilleuresVentes as $produit)
                                            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                                                <div class="single_top_sellers">
                                                    <div class="top_seller_image">
                                                        <img src="{{ asset('storage/' . $produit->image) }}"
                                                            alt="{{ $produit->designation }}" class="product-img-fixed">
                                                    </div>
                                                    <div class="top_seller_desc">
                                                        <h5>{{ Str::limit($produit->designation, 20) }}</h5>
                                                        <h6>{{ number_format($produit->prix_unitaire, 0, ',', ' ') }} FCFA
                                                        </h6>

                                                        <div
                                                            class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                            <div class="ts_product_add_to_cart">
                                                                <a href="#" title="Ajouter au panier"><i
                                                                        class="icofont-shopping-cart"></i></a>
                                                            </div>
                                                            <div class="ts_product_quick_view px-2">
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#quickview-{{ $produit->id }}"><i
                                                                        class="icofont-eye-alt"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @push('modals')
                                                @if (session('cartadd'))
                                                    <div class="alert alert-success alert-dismissible fade show">
                                                        {{ session('cartadd') }}
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"></button>
                                                    </div>
                                                @endif
                                                <div class="modal fade" id="quickview-{{ $produit->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="quickview" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content" style="position: relative;"> <button
                                                                type="button" class="close btn" data-dismiss="modal"
                                                                aria-label="Close"
                                                                style="position: absolute; right: 15px; top: 10px; z-index: 999; font-size: 30px; opacity: 1;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>



                                                            <div class="modal-body">
                                                                <div class="quickview_body">
                                                                    <div class="container">
                                                                        <div class="row">


                                                                            <div class="col-12 col-lg-5">
                                                                                <div class="quickview_pro_img">


                                                                                    <img src="{{ asset('storage/' . $produit->image) }}"
                                                                                        alt="{{ $produit->designation }}"
                                                                                        style="width: 100%; border-radius: 5px;">


                                                                                    <div class="product_badge">
                                                                                        <span class="badge-new">Nouveau</span>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12 col-lg-7">
                                                                                <div class="quickview_pro_des">
                                                                                    <h4 class="title">
                                                                                        {{ $produit->designation }}</h4>

                                                                                    <div
                                                                                        class="top_seller_product_rating mb-15">
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                    </div>

                                                                                    <h5 class="price">
                                                                                        {{ number_format($produit->prix_unitaire, 0, ',', ' ') }}
                                                                                        FCFA
                                                                                    </h5>

                                                                                    <p>
                                                                                        {{ $produit->description ?? 'Aucune description disponible pour ce produit.' }}
                                                                                    </p>


                                                                                </div>

                                                                                <!-- Add to Cart Form -->
                                                                                <form class="cart mt-4" method="POST"
                                                                                    action="{{ route('cart.add', $produit->public_id) }}">
                                                                                    @csrf
                                                                                    <div class="d-flex align-items-center">
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="quantity" value="1"
                                                                                            min="1"
                                                                                            style="width: 80px; margin-right: 10px;">

                                                                                        <button type="submit"
                                                                                            class="btn btn-primary">
                                                                                            Ajouter au panier
                                                                                        </button>
                                                                                    </div>
                                                                                </form>



                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endpush
                                        @empty
                                            <div class="col-12 text-center py-5">
                                                <div class="no-product-message">
                                                    <i class="icofont-frown" style="font-size: 3rem; color: #ccc;"></i>
                                                    <p class="mt-3 text-muted">Désolé, nous n'avons pas encore de
                                                        meilleures ventes à afficher.</p>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="text-center">
            <a href="{{ route('produit') }}" class="btn btn-primary">Voir Plus de produits</a>
        </div>
    </section>

    <style>
        .product-img-fixed {
            width: 100%;
            /* Prend toute la largeur de la carte */
            height: 250px;
            /* Définit une hauteur fixe pour tout le monde */
            object-fit: cover;
            /* Recadre l'image pour remplir l'espace sans la déformer */
            display: block;
        }
    </style>


    <!-- modal de produit -->

    <!-- CSS ajouté sans modifier le thème -->
    <style>
        .quickview_thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            overflow-x: auto;
        }

        .quickview_thumbnails img {
            width: 65px;
            height: 65px;
            object-fit: cover;
            cursor: pointer;
            border: 1px solid #eee;
            transition: 0.3s;
        }

        .quickview_thumbnails img:hover {
            border-color: #000;
        }

        .quickview_thumbnails::-webkit-scrollbar {
            height: 5px;
        }

        .quickview_thumbnails::-webkit-scrollbar-thumb {
            background: #ccc;
        }
    </style>

    <!-- JS simple -->
    <script>
        function changeImage(el) {
            document.getElementById('mainProductImage').src = el.src;
        }
    </script>



@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('addcom'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                },

                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });

            Toast.fire({
                icon: 'success',
                title: '{{ session('cartadd') }}',
                background: '#fff',
                color: '#000',
                customClass: {
                    popup: 'border-radius-xl'
                }
            });
        @endif
    });
</script>
