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
                            @foreach ($categories as $key => $categorie)
                                <div role="tabpanel" class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                    id="cat-{{ $categorie->id }}">

                                    <div class="on_sale_area">
                                        <div class="row">
                                            @forelse($categorie->produits as $produit)
                                                <div class="col-12 col-sm-6 col-lg-4">
                                                    <div class="single_top_sellers">
                                                        <div class="top_seller_image">
                                                            <img src="{{ asset('storage/' . $produit->image) }}"
                                                                alt="{{ $produit->designation }}" class="product-img-fixed">
                                                        </div>

                                                        <div class="top_seller_desc">
                                                            <h5>{{ Str::limit($produit->designation, 20) }}</h5>

                                                            <h6>{{ number_format($produit->prix_unitaire, 0, ',', ' ') }}
                                                                FCFA</h6>

                                                            <div
                                                                class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                                <div class="ts_product_add_to_cart">
                                                                    <a href="#" data-toggle="tooltip"
                                                                        title="Ajouter au panier">
                                                                        <i class="icofont-shopping-cart"></i>
                                                                    </a>
                                                                </div>



                                                                <div class="ts_product_quick_view px-2">
                                                                    <a href="#" data-toggle="modal"
                                                                        data-target="#quickview-{{ $produit->id }}"
                                                                        title="Details">
                                                                        <i class="icofont-eye-alt"></i>
                                                                    </a>
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
                                                        <div class="modal-dialog modal-lg modal-dialog-centered"
                                                            role="document">
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
                                                                                            <span
                                                                                                class="badge-new">Nouveau</span>
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
                                                <div class="col-12">
                                                    <p class="text-center">Aucun produit dans cette catégorie.</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                    <div class="shop_pagination_area mt-30">
                                        <nav aria-label="Page navigation">

                                            @if ($categorie->produits->hasPages())
                                                <ul class="pagination pagination-sm justify-content-center">

                                                    @if ($categorie->produits->onFirstPage())
                                                        <li class="page-item disabled"><span class="page-link"><i
                                                                    class="fa fa-angle-left"></i></span>
                                                        </li>
                                                    @else
                                                        <li class="page-item"><a class="page-link"
                                                                href="{{ $categorie->produits->previousPageUrl() }}"><i
                                                                    class="fa fa-angle-left"></i></a></li>
                                                    @endif


                                                    @foreach ($categorie->produits->getUrlRange(1, $categorie->produits->lastPage()) as $page => $url)
                                                        @if ($page == $categorie->produits->currentPage())
                                                            <li class="page-item active"><span
                                                                    class="page-link">{{ $page }}</span></li>
                                                        @else
                                                            <li class="page-item"><a class="page-link"
                                                                    href="{{ $url }}">{{ $page }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach


                                                    @if ($categorie->produits->hasMorePages())
                                                        <li class="page-item"><a class="page-link"
                                                                href="{{ $categorie->produits->nextPageUrl() }}"><i
                                                                    class="fa fa-angle-right"></i></a></li>
                                                    @else
                                                        <li class="page-item disabled"><span class="page-link"><i
                                                                    class="fa fa-angle-right"></i></span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            @endif
                                        </nav>
                                    </div>
                                </div>
                            @endforeach
                        </div>



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
        @if(session('cartadd'))
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
                title: '{{ session("cartadd") }}',
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
        border-radius: 15px !important; /* Bordures arrondies style WhatsApp moderne */
        box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
    }
    
    /* On force l'icône à ne pas utiliser MV Boli pour qu'elle s'affiche */
    .swal2-icon {
        font-family: 'Arial', sans-serif !important;
    }
</style>
