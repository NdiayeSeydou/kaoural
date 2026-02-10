<!doctype html>
<html lang="fr">




<head>
    <meta charset="UTF-8">
    <!--la description du site-->
    <meta name="description"
        content="Découvrez notre quincaillerie : outillage, visserie, peinture, électricité, plomberie et plus encore. Qualité, conseils et prix compétitifs pour tous vos projets de bricolage et de rénovation.">

    <!--les mots cles pour la recherche sur internet-->
    <meta name="keywords"
        content="quincaillerie kaoural, quincallerie mali, quincallerie baco djicoroni, visserie, plomberie, électricité, peinture, matériel de construction, fournitures de chantier">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- titre  -->
    <title>@yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('kaoural/img/favicon/favicon.ico') }}">


    <!-- lien du font awesone-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />


    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('kaoural/style.css') }}">

</head>

<body>

    <style>
    /* 1. Définition de la police (Sécurité pour les systèmes sans MV Boli) */
    @font-face {
        font-family: 'MV Boli';
        src: local('MV Boli'), local('Comic Sans MS');
    }

    /* 2. Application à TOUTE la page */
    html, body, 
    h1, h2, h3, h4, h5, h6, 
    p, span, a, div, 
    input, button, select, textarea {
        font-family: 'MV Boli', 'Comic Sans MS', cursive !important;
    }

    /* 3. Ajustement optionnel : la police manuscrite est souvent petite, 
       on augmente légèrement la lisibilité globale */
    body {
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }
</style>

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">en cours...</span>
        </div>
    </div>





    <!-- Fin du header -->
    <header class="header_area">


        <!-- Main Menu -->
        <div class="bigshop-main-menu">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <nav class="classy-navbar" id="bigshopNav">


                        <div class="text-center mt-3">
                            <!-- Nav Brand -->
                            <a href="index-1.html" class="nav-brand d-inline-block">
                                <img src="{{ asset('kaoural/img/logo kaoural.png') }}" alt="logo"
                                    class="img-fluid rounded" width="80" height="80">
                            </a>
                        </div>



                        <!-- Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Close -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav -->
                            <div class="classynav">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}"
                                            class="{{ request()->routeIs('home') ? 'btn btn-primary' : '' }}">
                                            Accueil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}"
                                            class="{{ request()->routeIs('about') ? 'btn btn-primary' : '' }}">
                                            A propos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service') }}"
                                            class="{{ request()->routeIs('service') ? 'btn btn-primary' : '' }}">
                                            Services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('produit') }}"
                                            class="{{ request()->routeIs('produit') ? 'btn btn-primary' : '' }}">
                                            Produits
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog') }}"
                                            class="{{ request()->routeIs('blog') ? 'btn btn-primary' : '' }}">
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}"
                                            class="{{ request()->routeIs('contact') ? 'btn btn-primary' : '' }}">
                                            Contact
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('login') }}"
                                            class="{{ request()->routeIs('login') ? 'btn btn-primary' : '' }}">
                                            Connexion
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}"
                                            class="{{ request()->routeIs('register') ? 'btn btn-primary' : '' }}">
                                            Inscription
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Hero Meta -->
                        <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                            <!-- Search -->


                            <!-- Wishlist -->
                            <div class="wishlist-area">
                                <a href="" class="wishlist-btn"><i class="icofont-heart"></i></a>
                            </div>

                            <!-- Cart -->
                            <div class="cart-area">
                                <div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity">2</span>
                                </div>

                                <!-- Cart Dropdown Content -->
                                <div class="cart-dropdown-content">
                                    <ul class="cart-list">
                                        <li>
                                            <div class="cart-item-desc">
                                                <a href="#" class="image">
                                                    <img src="{{ asset('kaoural/img/ampoule ingelec china.webp') }}"
                                                        class="cart-thumb" alt="">
                                                </a>
                                                <div>
                                                    <a href="#">Ampoule led 9w Ingelec</a>
                                                    <p>1x <span class="price">1000 FCFA</span></p>
                                                </div>
                                            </div>
                                            <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                        </li>
                                        <li>
                                            <div class="cart-item-desc">
                                                <a href="#" class="image">
                                                    <img src="{{ asset('kaoural/img/spray.jpeg') }}" class="cart-thumb"
                                                        alt="">
                                                </a>
                                                <div>
                                                    <a href="#">Spray Colorant Bleu</a>
                                                    <p>1x <span class="price">1000 FCFA</span></p>
                                                </div>
                                            </div>
                                            <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                        </li>
                                    </ul>
                                    <div class="cart-pricing my-4">
                                        <ul>

                                            <li>
                                                <span>Total:</span>
                                                <span>20000 FCFA</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-box">
                                        <a href="" class="btn btn-primary d-block">Paiement</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Account -->
                            <div class="account-area">
                                <div class="user-thumbnail">
                                    <img src="{{ asset('kaoural/img/bg-img/user.jpg') }}" alt="">
                                </div>
                                <ul class="user-meta-dropdown">
                                    <li class="user-title"><span>Salut,</span> Seydou</li>
                                    <li><a href="">Mon compte</a></li>
                                    <li><a href="">Historique des commandes</a></li>
                                    <li><a href="">Favoris</a></li>
                                    <li><a href=""><i class="icofont-logout"></i> Se deconnecter</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>


            </div>
        </div>
    </header>



    @yield('suite')
    <!-- Fin du header -->




    <!-- Footer-->
    <footer class="footer_area section_padding_100_0">
        <div class="container">
            <div class="row gx-4 gy-4 align-items-stretch">

                <!-- Présentation entreprise -->
                <div class="col-12 col-sm-6 col-md col-lg-4 col-xl-2">
                    <div class="single_footer_area small">
                        <div class="footer_heading mb-3">
                            <h6>Quincaillerie Kaoural N'DIAYE & Frères</h6>
                        </div>
                        <p class="description-limit">
                            Quincaillerie Kaoural au service de vos projets de construction, rénovation et bricolage.
                            Produits de qualité, conseils personnalisés et service de proximité.
                        </p>
                        <p class="mt-2 font-italic">
                            "Tout pour vos projets, du clou à la clé."
                        </p>
                    </div>
                </div>

                <!-- Contact -->
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="single_footer_area small">
                        <div class="footer_heading mb-3">
                            <h6>Contactez-nous</h6>
                        </div>
                        <ul class="footer_content">
                            <li>Baco Djicoroni Golf, Bamako, Mali</li>
                            <li>+223 76 36 96 79</li>
                            <li>+223 66 77 74 74</li>
                            <li>support@example.com</li>
                        </ul>
                        <div class="footer_social_area mt-3">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Liens -->
                <div class="col-12 col-sm-6 col-md col-lg-4 col-xl-2">
                    <div class="single_footer_area small">
                        <div class="footer_heading mb-3">
                            <h6>Liens utiles</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="{{ route('home') }}"><i class="icofont-rounded-right"></i> Accueil</a></li>
                            <li><a href="{{ route('about') }}"><i class="icofont-rounded-right"></i> À propos</a>
                            </li>
                            <li><a href="{{ route('service') }}"><i class="icofont-rounded-right"></i> Services</a>
                            </li>
                            <li><a href="{{ route('produit') }}"><i class="icofont-rounded-right"></i> Produits</a>
                            </li>
                            <li><a href="{{ route('blog') }}"><i class="icofont-rounded-right"></i> Blog</a></li>
                            <li><a href="{{ route('contact') }}"><i class="icofont-rounded-right"></i> Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="col-12 col-md-7 col-lg-8 col-xl-3">
                    <div class="single_footer_area small mb-3">
                        <div class="footer_heading mb-3">
                            <h6>Abonnez-vous à notre newsletter</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="form-control mail"
                                    placeholder="Votre adresse e-mail">
                                <button type="submit" class="submit">
                                    <i class="icofont-long-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer-->


    <!--les liens du javascript-->
    <div>

        <!-- jQuery (Necessary for All JavaScript Plugins) -->

        <script src="{{ asset('kaoural/js/jquery.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/popper.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/default/classy-nav.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/default/scrollup.js') }}"></script>
        <script src="{{ asset('kaoural/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/jarallax.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/jarallax-video.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/wow.min.js') }}"></script>
        <script src="{{ asset('kaoural/js/default/active.js') }}"></script>
    </div>
    <!--fin des liens-->
</body>

</html>
