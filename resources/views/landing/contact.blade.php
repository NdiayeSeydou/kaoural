@extends('landing.layouts.navbar')
@section('title', 'Contact de la Quincaillerie Kaoural')
@section('suite')


    <!-- Message Now Area -->
<div class="message_now_area section_padding_100" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="popular_section_heading mb-50 text-center">
                    <h5 class="mb-3">Restez connectés avec Kaoural</h5>
                    <p>Depuis plus de 20 ans, nous vous accompagnons avec les meilleurs matériaux et un service de qualité.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Téléphone -->
            <div class="col-12 col-lg-4">
                <div class="single-contact-info mb-30">
                    <i class="icofont-phone"></i>
                    <p>+223 76 36 96 79 <br> +223 66 77 74 74</p>
                </div>
            </div>
            <!-- Email -->
            <div class="col-12 col-lg-4">
                <div class="single-contact-info mb-30">
                    <i class="icofont-ui-email"></i>
                    <p>contact@kaoural.com <br> support@kaoural.com</p>
                </div>
            </div>
            <!-- Adresse -->
            <div class="col-12 col-lg-4">
                <div class="single-contact-info mb-30">
                    <i class="icofont-location-pin"></i>
                    <p>Quincaillerie Kaoural <br> Bacodjicoroni Golf, Bamako – Mali</p>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="col-12">
                <div class="contact_from mb-50">
                    <form action="#" method="post" id="main_contact_form">
                        <div class="contact_input_area">
                            <div id="success_fail_info"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="f_name" id="f-name"
                                            placeholder="Prénom" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="l_name" id="l-name"
                                            placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Votre E-mail" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="custom-select form-control w-100">
                                            <option value="1">Demande de devis</option>
                                            <option value="2">Informations sur la livraison</option>
                                            <option value="3">Qualité des matériaux</option>
                                            <option value="3">Autres</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Votre message *"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary w-100">Envoyer le message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Carte Google -->
            <div class="col-12">
                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.4733933767!2d-0.24167960602552738!3d51.52855824355498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sbd!4v1565062036569!5m2!1sen!2sbd"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Message Now Area -->

@endsection
