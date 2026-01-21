@extends('landing.layouts.navbar')
@section('title', 'Quincaillerie Kaoural | Bienvenue à la quincaillerie kaoural')
@section('suite')


    <!-- carousel  -->
    <div class="container-fluid bg-light py-5 my-5 mt-0">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h1 class="display-4 mb-4 animated bounceInDown">
                        Commander chez <span class="text-primary">Quincaillerie Kaoural </span> pour tous vos projets de
                        bricolage et construction
                    </h1>
                    <a href="#" class="btn btn-primary">
                        Commander maintenant
                    </a>

                </div>
                <div class="col-lg-5 col-md-12 mt-3">
                    <img src="{{ asset('kaoural/image1.webp') }}" class="img-fluid rounded animated zoomIn" alt="Événement">
                </div>
            </div>
        </div>
    </div>

    <!--fin du carousel -->

    <!-- avantages de la quincaillerie kaoural-->
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <h1 class="display-5 mb-5 text-center">Les avantages de Quincaillerie Kaoural N'DIAYE & Frères</h1>

            <div class="row g-4">
                <!-- Avantage 1 -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center bg-white border rounded shadow-sm p-4 h-100">
                        <i class="fas fa-hard-hat fa-3x mb-3" style="color: #FFD700;"></i>
                        <h5 class="mb-2">Expertise Locale</h5>
                        <p class="text-muted small">Des années d’expérience dans le matériel de construction et
                            bricolage.</p>
                    </div>
                </div>

                <!-- Avantage 2 -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center bg-white border rounded shadow-sm p-4 h-100">
                        <i class="fas fa-wrench fa-3x mb-3" style="color: #FFD700;"></i>
                        <h5 class="mb-2">Produits de Qualité</h5>
                        <p class="text-muted small">Une large gamme d’outils, matériaux et accessoires fiables.</p>
                    </div>
                </div>

                <!-- Avantage 3 -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center bg-white border rounded shadow-sm p-4 h-100">
                        <i class="fas fa-tools fa-3x mb-3" style="color: #FFD700;"></i>
                        <h5 class="mb-2">Conseils Personnalisés</h5>
                        <p class="text-muted small">Un accompagnement sur mesure pour vos projets et besoins techniques.
                        </p>
                    </div>
                </div>

                <!-- Avantage 4 -->
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
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-tab">
                            <li class="nav-item">
                                <a href="#top-sellers" class="nav-link" data-toggle="tab" role="tab">Nos Meilleures
                                    Ventes</a>
                            </li>

                            <li class="nav-item">
                                <a href="#on-sale" class="nav-link active" data-toggle="tab" role="tab">Produit à
                                    vendre</a>
                            </li>
                        </ul>

                        <div class="tab-content">


                            <!--nos meilleures ventes-->
                            <div role="tabpanel" class="tab-pane fade" id="top-sellers">
                                <div class="top_sellers_area">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/top-1.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>KID’s Fashion</h5>
                                                    <h6>$49.39 <span>$55.31</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/top-2.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Beach Cap</h5>
                                                    <h6>$20 <span>$25</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/top-3.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Gold Neckless</h5>
                                                    <h6>$69 <span>$71</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="wishlist.html" data-toggle="tooltip"
                                                                data-placement="top" title="Wishlist"><i
                                                                    class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/top-4.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Diamond Neckless</h5>
                                                    <h6>$300 <span>$310</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip"
                                                                data-placement="top" title="Compare"><i
                                                                    class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/top-5.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Sport Shoes</h5>
                                                    <h6>$30 <span>$34</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/top-6.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Pin Up Bikini</h5>
                                                    <h6>$27 <span>$29</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip"
                                                                data-placement="top" title="Compare"><i
                                                                    class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!---->

                            <!--produit a vendre-->
                            <div role="tabpanel" class="tab-pane fade show active" id="on-sale">
                                <div class="on_sale_area">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/onsale-1.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Speaker</h5>
                                                    <h6>$60 <span>$70</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip"
                                                                data-placement="top" title="Compare"><i
                                                                    class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/onsale-2.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Fancy Lamp</h5>
                                                    <h6>$34 <span>$40</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/onsale-3.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Sport Bra</h5>
                                                    <h6>$63 <span>$70</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/onsale-4.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>S'well Water</h5>
                                                    <h6>$12 <span>$13</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/onsale-5.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Slipper</h5>
                                                    <h6>$24 <span>$36</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{ asset('kaoural/img/product-img/onsale-6.png') }}"
                                                        alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>T-shirt</h5>
                                                    <h6>$96 <span>$120</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="Add To Cart"><i
                                                                    class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="" data-toggle="tooltip" data-placement="top"
                                                                title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="text-center">
            <a href="#" class="btn btn-primary">Voir Plus de produits</a>
        </div>
    </section>

    <!-- fin de notre produit -->


    <!-- modal de produit -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">

                                <!-- IMAGES PRODUIT -->
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img">

                                        <!-- Image principale -->
                                        <img class="first_img" id="mainProductImage"
                                            src="{{ asset('kaoural/img/product-img/1.jpg') }}" alt="">

                                        <!-- Image hover (design original conservé) -->


                                        <!-- Miniatures défilantes -->
                                        <div class="quickview_thumbnails">
                                            <img src="{{ asset('kaoural/img/product-img/1.jpg') }}"
                                                onclick="changeImage(this)">
                                            <img src="{{ asset('kaoural/img/product-img/2.jpg') }}"
                                                onclick="changeImage(this)">
                                            <img src="{{ asset('kaoural/img/product-img/2.jpg') }}"
                                                onclick="changeImage(this)">
                                            <img src="{{ asset('kaoural/img/product-img/4.jpg') }}"
                                                onclick="changeImage(this)">
                                        </div>

                                        <!-- Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">New</span>
                                        </div>

                                    </div>
                                </div>

                                <!-- DESCRIPTION PRODUIT -->
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title">Boutique Silk Dress</h4>

                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <h5 class="price">$120.99 <span>$130</span></h5>

                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Mollitia expedita quibusdam aspernatur, sapiente consectetur
                                            accusantium perspiciatis praesentium eligendi, in fugiat?
                                        </p>

                                        <a href="#">View Full Product Details</a>
                                    </div>

                                    <!-- Add to Cart Form -->
                                    <form class="cart" method="post">
                                        <div class="quantity">
                                            <input type="number" class="qty-text" id="qty" step="1"
                                                min="1" max="12" name="quantity" value="1">
                                        </div>

                                        <button type="submit" name="addtocart" value="5" class="cart-submit">
                                            Add to cart
                                        </button>

                                        <!-- Wishlist -->
                                        <div class="modal_pro_wishlist">
                                            <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                        </div>

                                        <!-- Compare -->

                                    </form>

                                    <!-- Share -->


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

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
