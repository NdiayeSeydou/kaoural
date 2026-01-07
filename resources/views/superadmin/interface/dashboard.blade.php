@extends('superadmin.layout.navbar')
@section('title', 'Dashboard - Superadmin | Kaoural')
@section('suite')






    <!-- row -->
    <div class="row mb-6 g-6">
        <div class="col-xl-8 col-lg-6">
            <div class="bg-gradient-mixed p-8 py-10 rounded-3 p-lg-7">
                <!--heading-->
                <h1 class="fs-3">👋 Bonjour Superadmin,</h1>
                <p class="mb-0">Bienvenue sur le tableau de bord de la Quincaillerie Kaoural !</p>
                <p>Suivez vos ventes, gérez vos stocks et gardez le contrôle sur vos opérations.</p>

            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <!-- card -->
            <div class="card card-lg">
                <!-- card body -->
                <div class="card-body">
                    <div class="mb-4 position-relative py-2">
                        <div>
                            <h5 class="mb-1">Ideas for You</h5>
                        </div>
                        <!-- swiper navigation-->
                        <div class="swiper-navigation position-absolute top-50 end-10 me-4 me-lg-8 me-xl-4">
                            <div class="swiper-button-prev ms-n3"></div>
                            <div class="swiper-button-next ms-6"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- swiper -->
                            <div class="swiper-container swiper" id="swiper-1" data-pagination-type="" data-speed="900"
                                data-space-between="100" data-pagination="false" data-navigation="true"
                                data-autoplay="false" data-autoplay-delay="2000"
                                data-breakpoints='{"480": {"slidesPerView": 1}, "768": {"slidesPerView": 1}, "1024": {"slidesPerView": 1}, "1200": {"slidesPerView": 1}}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div>
                                            <h4>Create a Blog Post</h4>

                                            <div>
                                                <p>Lorem Ipsum is simply dummy text </p>
                                            </div>
                                            <div class="mt-4">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div>
                                            <h4>Create a Blog Post</h4>

                                            <div>
                                                <p>Lorem Ipsum is simply dummy text</p>
                                            </div>
                                            <div class="mt-4">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div>
                                            <h4>Create a Blog Post</h4>

                                            <div>
                                                <p>Lorem Ipsum is simply dummy text</p>
                                            </div>
                                            <div class="mt-4">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add more slides as needed -->
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                                <!-- Add Navigation -->
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                    <path d="M12 12l0 .01" />
                                    <path d="M3 13a20 20 0 0 0 18 0" />
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
                                <div>Rupture de stock</div>
                            </div>
                            <div class="text-info-emphasis">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-list-check">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                                    <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                                    <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                                    <path d="M11 6l9 0" />
                                    <path d="M11 12l9 0" />
                                    <path d="M11 18l9 0" />
                                </svg>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1 d-flex flex-column gap-3">
                            <div class="fs-1 fw-bold">132</div>
                            <p class="mb-0">
                                <span class="me-1 text-info-emphasis">28</span>
                                <span class="text-secondary">finis</span>
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
                                <div>Utilisateurs</div>
                            </div>
                            <div class="text-danger-emphasis">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
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
                                <span class="text-secondary">Clients</span>
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
                                <div>Paiement en attente</div>
                            </div>
                            <div class="text-warning-emphasis">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-snowboarding">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M15 3a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                    <path d="M7 19l4 -2.5l-.5 -1.5" />
                                    <path d="M16 21l-1 -6l-4.5 -3l3.5 -6" />
                                    <path d="M7 9l1.5 -3h5.5l2 4l3 1" />
                                    <path
                                        d="M3 17c.399 1.154 .899 1.805 1.5 1.951c6 1.464 10.772 2.262 13.5 2.927c1.333 .325 2.333 0 3 -.976" />
                                </svg>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1 d-flex flex-column gap-3">
                            <div class="fs-1 fw-bold">76</div>
                            <p class="mb-0">
                                <span class="text-warning-emphasis me-1">26%</span>
                                <span class="text-secondary">restants</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row  -->



    </div>

           <div class="row g-6 mb-6">
          <div class="col-xl-8">
            <!-- card -->
            <div class="card card-lg">
              <!-- card header -->
              <div class="card-header border-bottom-0">
                <div>
                  <h5 class="mb-0">Orders</h5>
                </div>
              </div>
              <!-- table -->
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 table-centered table-hover">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Amount</th>
                      <th>Shipping Method</th>
                      <th>Delivery Date</th>
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
                      <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
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
          <div class="col-xl-4">
            <!-- card -->
            <div class="card card-lg">
              <!--  card body -->
              <div class="card-body">
                <!-- heading -->
                <h5 class="mb-6">Revenue by Location</h5>
                <div id="map-world" style="width: 100%; height: 250px"></div>
                <div class="d-flex flex-column gap-2">
                  <div>
                    <div class="d-flex justify-content-between align-items-center">
                      <span>United States</span>
                      <span>$22,120</span>
                    </div>
                    <div class="progress mt-1" style="height: 6px">
                      <div class="progress-bar" role="progressbar" aria-label="Example 1px high" style="width: 45%"
                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex justify-content-between align-items-center">
                      <span>India</span>
                      <span>$12,756</span>
                    </div>
                    <div class="progress mt-1" style="height: 6px">
                      <div class="progress-bar bg-success" role="progressbar" aria-label="Example 1px high"
                        style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex justify-content-between align-items-center">
                      <span>United Kingdom</span>
                      <span>$8,864</span>
                    </div>
                    <div class="progress mt-1" style="height: 6px">
                      <div class="progress-bar bg-info" role="progressbar" aria-label="Example 1px high"
                        style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex justify-content-between align-items-center">
                      <span>Sweden</span>
                      <span>$6,124</span>
                    </div>
                    <div class="progress mt-1" style="height: 6px">
                      <div class="progress-bar bg-warning" role="progressbar" aria-label="Example 1px high"
                        style="width: 18%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-6 mb-6">
          <div class="col-xl-4">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body">
                <!-- heading -->
                <div class="mb-5">
                  <h5>Sales by gender</h5>
                </div>
                <div id="salesBygender"></div>
              </div>
              <div class="border-top border-dashed px-6 py-4">
                <div class="d-flex align-items-center justify-content-center gap-6">
                  <div class="d-flex align-items-center gap-1">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                        fill="currentColor"
                        class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-primary">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                      </svg></span><span class="lh-1">Mens</span>
                  </div>
                  <div class="d-flex align-items-center gap-1">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                        fill="currentColor"
                        class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-warning">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                      </svg></span><span class="lh-1">Womens</span>
                  </div>
                  <div class="d-flex align-items-center gap-1">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-danger">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                      </svg></span><span class="lh-1">Kids</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <!-- card -->
            <div class="card card-lg">
              <div class="card-header border-bottom-0">
                <!-- heading -->
                <div>
                  <h5 class="mb-0">Top Selling Products</h5>
                </div>
              </div>
              <!-- table -->
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 table-centered table-hover">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Sale</th>
                      <th>Revenue</th>
                      <th>Rating</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div>
                          <a href="#!" class="d-flex align-items-center gap-2 text-inherit">
                            <img src="../assets/images/ecommerce/product-1.jpg" alt="product" class="rounded"
                              width="40" />
                            <span class="text-truncate">Transparent Sunglasses</span>
                          </a>
                        </div>
                      </td>
                      <td>454</td>
                      <td>$50,000</td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-star text-warning">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                          </span>
                          <span>5/5</span>
                        </div>
                      </td>
                      <td><span class="badge text-info-emphasis bg-info-subtle">In Stock</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div>
                          <a href="#!" class="d-flex align-items-center gap-2 text-inherit">
                            <img src="../assets/images/ecommerce/product-2.jpg" alt="product" class="rounded"
                              width="40" />
                            <span class="text-truncate">Frames Still Life Glasses</span>
                          </a>
                        </div>
                      </td>
                      <td>454</td>
                      <td>$50,000</td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-star text-warning">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                            </svg>
                          </span>
                          <span>5/5</span>
                        </div>
                      </td>
                      <td><span class="badge text-info-emphasis bg-info-subtle">In Stock</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div>
                          <a href="#!" class="d-flex align-items-center gap-2 text-inherit">
                            <img src="../assets/images/ecommerce/product-3.jpg" alt="product" class="rounded"
                              width="40" />
                            <span>Slightly Rounded Frame</span>
                          </a>
                        </div>
                      </td>
                      <td>124</td>
                      <td>$30,000</td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-star-half text-warning">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z" />
                            </svg>
                          </span>
                          <span>4.0/5</span>
                        </div>
                      </td>
                      <td><span class="badge text-warning-emphasis bg-warning-subtle">Low Stock</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div>
                          <a href="#!" class="d-flex align-items-center gap-2 text-inherit">
                            <img src="../assets/images/ecommerce/product-4.jpg" alt="product" class="rounded"
                              width="40" />
                            <span>Colored-Transparent Sunglasses</span>
                          </a>
                        </div>
                      </td>
                      <td>124</td>
                      <td>$30,000</td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-star-half text-warning">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z" />
                            </svg>
                          </span>
                          <span>4.0/5</span>
                        </div>
                      </td>
                      <td><span class="badge text-warning-emphasis bg-warning-subtle">Low Stock</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div>
                          <a href="#!" class="d-flex align-items-center gap-2 text-inherit">
                            <img src="../assets/images/ecommerce/product-5.jpg" alt="product" class="rounded"
                              width="40" />
                            <span>Sun Glasses Table</span>
                          </a>
                        </div>
                      </td>
                      <td>124</td>
                      <td>$30,000</td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-star-half text-warning">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z" />
                            </svg>
                          </span>
                          <span>4.0/5</span>
                        </div>
                      </td>
                      <td><span class="badge text-warning-emphasis bg-warning-subtle">Low Stock</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div>
                          <a href="#!" class="d-flex align-items-center gap-2 text-inherit">
                            <img src="../assets/images/ecommerce/product-6.jpg" alt="product" class="rounded"
                              width="40" />
                            <span>Rounded Frames Glasses</span>
                          </a>
                        </div>
                      </td>
                      <td>124</td>
                      <td>$30,000</td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-star-half text-warning">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z" />
                            </svg>
                          </span>
                          <span>4.8/5</span>
                        </div>
                      </td>
                      <td><span class="badge text-danger-emphasis bg-danger-subtle">Out of Stock</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

    @endsection
