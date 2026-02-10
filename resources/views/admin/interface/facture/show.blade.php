@extends('admin.layout.navbar')
@section('title', 'Détails de la facture | kaoural')
@section('suite')


    <div class="custom-container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="mb-8 d-md-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-3 h2">Détails de la facture</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('superadmin.facture.index') }}">Factures</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">détails</li>
                            </ol>
                        </nav>



                    </div>
                    <div>
                        <div>
                            <a class="btn btn-dark d-md-flex align-items-center gap-2"
                                href="{{ route('superadmin.facture.index') }}">

                                Retour à la liste
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-xxl-1 col-xxl-10 col-md-12 col-12">
                <div class="card card-lg" id="invoice">
                    <!-- Page header -->
                    <div class="card-body px-6 py-5">
                        <div class="row justify-content-between mb-md-10">
                            <div class="col-lg-3 col-md-6 col-12">
                                <a href="#">
                                    <img src="../../assets/images/brand/logo/logo-2.html" alt=""
                                        class="text-inverse" />
                                </a>
                                <div class="mt-6">
                                    <span class="fw-semibold fs-5">Addresse</span>
                                    <p class="mt-2 mb-0 text-secondary">
                                        4333 Edwards Rd undefined Erie
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-md-end mt-4 mt-md-0">
                                <ul class="list-unstyled">

                                    <li class="mb-1">
                                        <span class="text-secondary">Date de la facture :</span>
                                        <span class="ms-2">27 April 2025</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-between mb-8">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="mt-6">
                                    <span class="fw-semibold mb-2 d-block">Pour</span>
                                    <h5>Robert Hernandez</h5>

                                    <span>(123) 456-7890</span>
                                    <br />

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-centered text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Désignation</th>
                                                <th scope="col">Quantité</th>
                                                <th scope="col">Prix unitaire</th>
                                                <th scope="col">Prix total (Fcfa)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>

                                                    <p class="mb-0 text-secondary">Lorem ipsum dolor sit amet, consectetur
                                                    </p>
                                                </td>
                                                <td>1</td>
                                                <td>$39.00</td>
                                                <td>$39.00</td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <p class="mb-0 text-secondary">Fusce in sem placerat, dictum tellus nec
                                                    </p>
                                                </td>
                                                <td>1</td>
                                                <td>$99.00</td>
                                                <td>$99.00</td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <p class="mb-0 text-secondary">Fusce eleifend tortor in lacinia dictum
                                                    </p>
                                                </td>
                                                <td>1</td>
                                                <td>$49.00</td>
                                                <td>$49.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="border-bottom-0"></td>
                                                <td><span>Total à payé</span></td>
                                                <td><span>$117.00</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="border-bottom-0"></td>
                                                <td><span>Avance</span></td>
                                                <td><span>$117.00</span></td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" class="border-bottom-0"></td>
                                                <td><span class="fw-bold">Reste à payé</span></td>
                                                <td><span class="fw-bold">$115.00</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
