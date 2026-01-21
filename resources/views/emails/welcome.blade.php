@extends('emails.layouts.navbar')
@section('title', 'Bienvenue à la quincaillerie kaoural')
@section('suite')




    <div class="container-fluid bg-light py-5 my-5 mt-0">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Texte de bienvenue -->
                <div class="col-lg-7 col-md-12">
                    <h1 class="display-4 mb-4 animated bounceInDown">
                        Bienvenue chez <span class="text-primary">Quincaillerie Kaoural</span> 👋
                    </h1>
                    <p class="lead mb-4">
                        Bonjour {{ $user->name ?? 'cher client' }}, nous sommes ravis de vous compter parmi nos clients !
                        Avec votre compte, vous pourrez suivre vos commandes, profiter d’offres exclusives et bénéficier
                        d’un service rapide et sécurisé.
                    </p>
                    <a href="" class="btn btn-primary btn-lg"   >
                        Accéder à mon compte
                    </a>
                </div>

                <!-- Image -->
                <div class="col-lg-5 col-md-12 mt-3">
                    <img src="{{ url('kaoural/image1.webp') }}" class="img-fluid rounded animated zoomIn"
                        alt="Bienvenue chez Kaoural">
                </div>
            </div>
        </div>
    </div>





@endsection
