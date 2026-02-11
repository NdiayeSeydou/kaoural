@extends('client.layouts.navbar')
@section('title', 'Tableau de bord Client')
@section('suite')



    <!-- row -->
    <div class="row mb-6 g-6">
        <div class="col-xl-8 col-lg-6">
            <div class="bg-gradient-mixed p-8 py-10 rounded-3 p-lg-7">
                <!--heading-->
                <h1 class="fs-3">👋 Bienvenue client,</h1>
                <p class="mb-0">Bienvenue sur votre tableau de bord !</p>
                <p>Suivez vos commandes, gérez votre profil et gardez un oeil sur vos activités.</p>

            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <!-- card -->
            <div class="card card-lg">
                <!-- card body -->
                <div class="card-body">

                    <!-- SWIPER en haut -->
                    <div class="swiper" id="swiper-1">
                        <div class="swiper-wrapper">

                            <!-- Slide 1 -->
                            <div class="swiper-slide">
                                <div class="text-center">
                                    <h4 class="fw-bold">Suivez nos blogs</h4>
                                    <p class="text-muted">
                                       Lisez nos articles pour découvrir les dernières tendances et conseils en quincaillerie.
                                    </p>
                                    <div class="mt-4">
                                        <a href="{{ route('blog') }}" class="btn btn-primary px-4">Listes des blogs</a>
                                    </div>
                                </div>
                            </div>

                          

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <!-- container -->
    <div class="custom-container">
        <div class="row g-6 mb-6">

            <div class="col-xl-3 col-md-6 col-12">
                <!-- card -->
                <div class="card card-lg bg-gradient-success">
                    <!-- card body -->
                    <div class="card-body d-flex flex-column gap-8">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-semibold">Commandes</div>
                            </div>
                            <div class="text-success-emphasis">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icon-tabler-shopping-cart">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="9" cy="19" r="2" />
                                    <circle cx="17" cy="19" r="2" />
                                    <path d="M5 6h14l-1 7h-12l-1 -7z" />
                                    <path d="M6 6l-2 -3" />
                                </svg>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1 d-flex flex-column gap-3">
                            <div class="fs-1 fw-bold">6</div>
                            <p class="mb-0">
                                <span class="text-success-emphasis">2</span>
                                <span class="text-secondary">finis</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-12">
                <!-- card -->
                <div class="card card-lg bg-gradient-info">
                    <!-- card body -->
                    <div class="card-body d-flex flex-column gap-8">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div>Devis</div>
                            </div>
                            <div class="text-info-emphasis">
                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icon-tabler-box">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4l-8 4l-8 -4z" />
                                    <path d="M4 7v10l8 4l8 -4v-10" />
                                    <path d="M12 11v10" />
                                </svg>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1 d-flex flex-column gap-3">
                            <div class="fs-1 fw-bold">132</div>
                            <p class="mb-0">
                                <span class="me-1 text-info-emphasis">28</span>
                                <span class="text-secondary">reçus</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-xl-3 col-md-6 col-12">
                <!-- card -->
                <div class="card card-lg bg-gradient-danger">
                    <!-- card body -->
                    <div class="card-body d-flex flex-column gap-8">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div>Créances</div>
                            </div>
                            <div class="text-danger-emphasis">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1 d-flex flex-column gap-3">
                            <div class="fs-1 fw-bold">8</div>
                            <p class="mb-0">
                                <span class="me-1 text-danger-emphasis">2</span>
                                <span class="text-secondary">payés</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <!-- card -->
                <div class="card card-lg bg-gradient-warning">
                    <!-- card body -->
                    <div class="card-body d-flex flex-column gap-8">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div>Commande en attente</div>
                            </div>
                            <div class="text-warning-emphasis">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icon-tabler-clock">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <path d="M12 7v5l3 3" />
                                </svg>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1 d-flex flex-column gap-3">
                            <div class="fs-1 fw-bold">76</div>
                            <p class="mb-0">
                                <span class="text-warning-emphasis me-1">26</span>
                                <span class="text-secondary">commandes restants</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- row  -->



    </div>

    <div class="row g-4">
        <div class="col-12">
            <!-- card -->
            <div class="card card-lg">
                <!-- card header -->
                <div class="card-header border-bottom-0">
                    <div>
                        <h5 class="mb-0">Commande</h5>
                    </div>
                </div>
                <!-- table -->
                <div class="table-responsive">
                    <table class="table  mb-0  table-hover">
                        <thead>
                            <tr>
                                <th>ID commande</th>
                                <th>Total</th>
                                <th>Nom du client</th>
                                <th>Commande du</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#DU005</td>
                                <td>$150</td>
                                <td>Standard</td>
                                <td>Jan 20, 2025</td>
                                <td><span class="badge text-info-emphasis bg-info-subtle">Shipped</span></td>
                                <td><a href="#!" class="btn btn-white btn-sm">détails</a></td>
                            </tr>
                            <tr>
                                <td>#DU004</td>
                                <td>$200</td>
                                <td>Express</td>
                                <td>Jan 22, 2025</td>
                                <td><span class="badge text-warning-emphasis bg-warning-subtle">Pending</span></td>
                                <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                            </tr>
                            <tr>
                                <td>#DU003</td>
                                <td>$300</td>
                                <td>Overnight</td>
                                <td>Jan 18, 2025</td>
                                <td><span class="badge text-danger-emphasis bg-danger-subtle">Cancel</span></td>
                                <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                            </tr>
                            <tr>
                                <td>#DU002</td>
                                <td>$560</td>
                                <td>Overnight</td>
                                <td>Jan 13, 2025</td>
                                <td><span class="badge text-success-emphasis bg-success-subtle">Completed</span></td>
                                <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                            </tr>
                            <tr>
                                <td>#DU002</td>
                                <td>$560</td>
                                <td>Overnight</td>
                                <td>Jan 11, 2025</td>
                                <td><span class="badge text-success-emphasis bg-success-subtle">Completed</span></td>
                                <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

     
    </div>


  




@endsection 