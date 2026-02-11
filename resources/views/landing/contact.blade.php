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
                                        <select class="form-control" name="subject" required>
                                            <option value="" selected disabled>Quel est votre besoin ?</option>
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
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3893.642533036495!2d-8.0195!3d12.60!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDM2JzAwLjAiTiA4wrAwMScwMC4wIlc!5e0!3m2!1sfr!2sml!4v1625000000000!5m2!1sfr!2sml" 
                        allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Police MV Boli */
    #contact h5, #contact p, #contact input, #contact textarea, #contact select, #contact button {
        font-family: 'MV Boli', 'Comic Sans MS', cursive;
    }

    #contact h5 {
        font-weight: bold;
        font-size: 2rem;
        color: #333;
    }

    /* Style des blocs d'info */
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
        color: #FFD700;
        margin-bottom: 15px;
        display: block;
    }

    /* Uniformisation des champs */
    .contact_from .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 15px 20px;
        height: 55px;
        background-color: #fff;
        width: 100%;
        display: block;
    }

    /* Flèche du Select */
    .contact_from select.form-control {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
    }

    .contact_from textarea.form-control {
        height: auto;
    }

    .contact_from .form-control:focus {
        border-color: #FFD700;
        box-shadow: 0 0 5px rgba(255, 215, 0, 0.2);
        outline: none;
    }

    

    .btn-primary:hover {
        background-color: #e6c200;
        border-color: #e6c200;
        transform: scale(1.05);
    }

    .google-map iframe {
        width: 100%;
        height: 400px;
        border-radius: 20px;
        border: 0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

@endsection