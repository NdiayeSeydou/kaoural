@extends('landing.layouts.navbar')
@section('title', 'Découvrez nos differents produits')
@section('suite')
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


    <section class="best_rated_onsale_top_sellares section_padding_100_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs_area">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-tab">
                            @foreach ($categories as $key => $categorie)
                                <li class="nav-item">
                                    <a href="#cat-{{ $categorie->id }}" class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                        data-toggle="tab" role="tab">
                                        {{ $categorie->name }}
                                    </a>
                                </li>
                            @endforeach
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
                                                                    data-target="#quickview-{{ $produit->id }}">
                                                                    <i class="icofont-eye-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-center w-100">Aucun produit disponible.</p>
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
                                                        <div class="ts_product_quick_view px-2">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#quickview-{{ $produit->id }}">
                                                                <i class="icofont-eye-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-center w-100">Aucune vente enregistrée.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($produitsAVendre->merge($meilleuresVentes) as $produit)
                            <div class="modal fade" id="quickview-{{ $produit->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="close btn" data-dismiss="modal"
                                            style="position: absolute; right: 15px; top: 10px; z-index: 999; font-size: 30px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 col-lg-5">
                                                        <img src="{{ asset('storage/' . $produit->image) }}"
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-12 col-lg-7">
                                                        <h4>{{ $produit->designation }}</h4>
                                                        <h5 class="text-primary">
                                                            {{ number_format($produit->prix_unitaire, 0, ',', ' ') }} FCFA
                                                        </h5>
                                                        <p>{{ $produit->description ?? 'Pas de description.' }}</p>
                                                        <form action="{{ route('cart.add', $produit->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="number" name="quantity" value="1"
                                                                min="1" class="form-control mb-2"
                                                                style="width: 80px;">
                                                            <button type="submit" class="btn btn-primary">Ajouter au
                                                                panier</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>


        </div>

    </section>












@endsection

<script>
    $(document).ready(function() {

        const urlParams = new URLSearchParams(window.location.search);

        let activeTabId = null;

        for (const key of urlParams.keys()) {

            if (key.startsWith('cat')) {

                activeTabId = key.replace('cat', '');

                break;
            }
        }


        if (activeTabId) {


            $('#product-tab a').removeClass('active');

            $('.tab-pane').removeClass('show active');

            const targetLink = $('#product-tab a[href="#cat-' + activeTabId + '"]');

            const targetPane = $('#cat-' + activeTabId);

            if (targetLink.length) {

                targetLink.addClass('active');

                targetPane.addClass('show active');
            }
        }


        window.changeImage = function(el) {

            document.getElementById('mainProductImage').src = el.src;
        };
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('cartadd'))
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

<style>
    .swal2-popup {
        font-family: 'MV Boli', sans-serif !important;
        border-radius: 15px !important;
        /* Bordures arrondies style WhatsApp moderne */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
    }

    /* On force l'icône à ne pas utiliser MV Boli pour qu'elle s'affiche */
    .swal2-icon {
        font-family: 'Arial', sans-serif !important;
    }
</style>
