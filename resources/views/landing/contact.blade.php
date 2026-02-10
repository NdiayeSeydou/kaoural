@extends('landing.layouts.navbar')
@section('title', 'Contact de la Quincaillerie Kaoural')
@section('suite')

<div class="message_now_area section_padding_100" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="popular_section_heading mb-50 text-center">
                    <h5 class="mb-3">Restez connectés avec <span style="color: #FFD700;">Kaoural</span></h5>
                    <p>Depuis plus de 20 ans, nous vous accompagnons avec les meilleurs matériaux et un service de qualité au Mali.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="single-contact-info mb-30 shadow-sm">
                    <i class="icofont-phone"></i>
                    <p><strong>Téléphone :</strong> <br> +223 76 36 96 79 / 66 77 74 74</p>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="single-contact-info mb-30 shadow-sm">
                    <i class="icofont-ui-email"></i>
                    <p><strong>E-mail :</strong> <br> contact@kaoural.com</p>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="single-contact-info mb-30 shadow-sm">
                    <i class="icofont-location-pin"></i>
                    <p><strong>Localisation :</strong> <br> Bacodjicoroni Golf, Bamako</p>
                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="contact_from mb-50 p-4 p-lg-5 bg-white shadow rounded">
                    <form action="#" method="post" id="main_contact_form">
                        @csrf
                        <div class="contact_input_area">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="f_name" placeholder="Prénom" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="l_name" placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="email" class="form-control" name="email" placeholder="Votre E-mail" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <select class="custom-select form-control">
                                            <option selected disabled>Quel est votre besoin ?</option>
                                            <option value="1">Demande de devis</option>
                                            <option value="2">Informations sur la livraison</option>
                                            <option value="3">Qualité des matériaux</option>
                                            <option value="4">Autres</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <textarea name="message" class="form-control" cols="30" rows="6" placeholder="Décrivez votre projet ici..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary px-5">Envoyer le message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12">
                <div class="google-map mt-4">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15571.216253457185!2d-7.9942711!3d12.593856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDM1JzM3LjkiTiA3wrA1OSczOS40Ilc!5e0!3m2!1sfr!2sml!4v1644480000000" 
                        allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Application de la police MV Boli à toute la section contact */
    #contact h5, 
    #contact p, 
    #contact input, 
    #contact textarea, 
    #contact select, 
    #contact button {
        font-family: 'MV Boli', 'Comic Sans MS', cursive;
    }

    #contact h5 {
        font-weight: bold;
        font-size: 2rem;
        color: #333;
    }

    /* Style des blocs d'info (Tel, Email, Adresse) */
    .single-contact-info {
        text-align: center;
        padding: 30px;
        background: #f8f9fa;
        border-radius: 15px;
        transition: 0.3s;
    }

    .single-contact-info:hover {
        background: #fff;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }

    .single-contact-info i {
        font-size: 30px;
        color: #FFD700; /* Or Kaoural */
        margin-bottom: 15px;
        display: block;
    }

    /* Style du formulaire */
    .contact_from .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 15px 20px;
        height: auto;
    }

    .contact_from .form-control:focus {
        border-color: #FFD700;
        box-shadow: none;
    }

 

    .btn-primary:hover {
        background-color: #e6c200;
        border-color: #e6c200;
        color: #000;
        transform: scale(1.02);
    }

    /* Carte Google */
    .google-map iframe {
        width: 100%;
        height: 400px;
        border-radius: 20px;
        border: 0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

@endsection