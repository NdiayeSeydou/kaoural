@extends('superadmin.layout.navbar')
@section('title', 'Listes des blogs | kaoural')
@section('suite')



    <div class="custom-container">
        <!-- row -->
        <div class="row mb-6">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-0 h2">Overview</h1>
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('blog') }}" class="btn btn-white">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                            </span>
                            Voir le site
                        </a>
                        <a href="{{ route('superadmin.blog.create') }}" class="btn btn-primary">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                                    <path d="M11 13l9 -9" />
                                    <path d="M15 4h5v5" />
                                </svg>
                            </span>
                            Nouveau post
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row mb-6 gy-6">
            <div class="col-xl-8 col-12">
                <!-- card -->
               
                <!-- row -->
                <div class="row gy-6">
                    <div class="col-md-4 col-12">
                        <!-- card -->
                        <div class="card card-lg bg-primary-subtle">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-10">
                                    <!-- heading -->
                                    <span>Post régardés</span>
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Info" class="text-reset">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                            <path d="M12 9h.01" />
                                            <path d="M11 12h1v4h1" />
                                        </svg>
                                    </a>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold">1,16,234</div>
                                    <div>
                                        <span>
                                            <span class="icon-shape icon-xxs bg-success-darker text-success rounded-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-up">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 5l0 14"></path>
                                                    <path d="M18 11l-6 -6"></path>
                                                    <path d="M6 11l6 -6"></path>
                                                </svg>
                                            </span>

                                            <span class="text-primary-emphasis"> + 2.29% </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <!-- card -->
                        <div class="card card-lg bg-danger-subtle">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-10">
                                    <!-- heading -->
                                    <span>Open Rate</span>
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Info" class="text-reset">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                            <path d="M12 9h.01" />
                                            <path d="M11 12h1v4h1" />
                                        </svg>
                                    </a>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold">75%</div>
                                    <div>
                                        <span>
                                            <span class="icon-shape icon-xxs bg-danger-darker text-danger rounded-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-down">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 5l0 14" />
                                                    <path d="M18 13l-6 6" />
                                                    <path d="M6 13l6 6" />
                                                </svg>
                                            </span>

                                            <span class="text-danger-emphasis"> - 4.29% </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <!-- card -->
                        <div class="card card-lg bg-info-subtle">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-10">
                                    <!-- heading -->
                                    <span>Gross Revenue</span>
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Info" class="text-reset">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                            <path d="M12 9h.01" />
                                            <path d="M11 12h1v4h1" />
                                        </svg>
                                    </a>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold">$34,240.12</div>
                                    <div>
                                        <span>
                                            <span class="icon-shape icon-xxs bg-info-darker text-info rounded-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-up">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 5l0 14"></path>
                                                    <path d="M18 11l-6 -6"></path>
                                                    <path d="M6 11l6 -6"></path>
                                                </svg>
                                            </span>

                                            <span class="text-primary-emphasis"> +12.29% </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <!-- card -->
                <div class="card card-lg">
                    <div class="mb-8 position-relative">
                        <div>
                            <img src="{{ asset('dash/assets/images/background/profile-cover-img.jpg') }}" alt=""
                                class="card-img-top" />
                        </div>
                        <div class="position-absolute bottom-0 px-6" style="transform: translateY(50%)">
                            <img src="../assets/images/avatar/avatar-1.jpg" alt=""
                                class="avatar avatar-xl rounded-circle border border-white border-3" />
                        </div>
                    </div>
                    <!-- card body-->
                    <div class="card-body">
                        <div>
                            <div class="mb-5">
                                <h3 class="fs-4">John Doe</h3>
                               
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('superadmin.monprofil')}}" class="btn btn-primary">voir mon Profile</a>
                                <div class="dropdown dropstart">
                                    <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-dots-vertical" width="20"
                                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                        <a class="dropdown-item d-flex align-items-center" href="#!">Another
                                            action</a>
                                        <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                            here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
      

        <div class="row mb-6">
            <div class="col-12">
                <!-- card -->
                <div class="card card-lg">
                    <!-- card header -->
                    <div class="card-header border-bottom-0">
                        <h5 class="mb-0">Recent Post</h5>
                    </div>
                    <!-- table -->
                    <div class="table-responsive">
                        <table class="table table-centered text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Blog Title</th>
                                    <th>Post Views</th>
                                    <th>Subscriber</th>
                                    <th>Likes</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-4">
                                            <div>
                                                <a href="#!"><img src="../assets/images/blog/blog-img-1.jpg"
                                                        alt="" class="rounded-3" width="56"
                                                        height="56" /></a>
                                            </div>
                                            <div>
                                                <h5 class="mb-1 fs-6"><a href="#!" class="text-inherit">Youtube
                                                        Growth Marketing Strategy
                                                        2025</a></h5>
                                                <div class="d-flex gap-3 text-secondary">
                                                    <span>Feb 2, 2025</span>
                                                    <span>John Doe</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info-emphasis">Scheduled</span>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-dots-vertical" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Action</a>
                                                <a class="dropdown-item d-flex align-items-center" href="#!">Another
                                                    action</a>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Something else here</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-4">
                                            <div>
                                                <a href="#!"><img src="../assets/images/blog/blog-img-2.jpg"
                                                        alt="" class="rounded-3" width="56"
                                                        height="56" /></a>
                                            </div>
                                            <div>
                                                <h5 class="mb-1 fs-6"><a href="#!" class="text-inherit">Monetization
                                                        Tips for Blogs</a></h5>
                                                <div class="d-flex gap-3 text-secondary">
                                                    <span>Feb 20, 2025</span>
                                                    <span>Alice Brown</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1,345</td>
                                    <td>21</td>
                                    <td>32</td>
                                    <td>120</td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary-emphasis">Published</span>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-dots-vertical" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Action</a>
                                                <a class="dropdown-item d-flex align-items-center" href="#!">Another
                                                    action</a>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Something else here</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-4">
                                            <div>
                                                <a href="#!"><img src="../assets/images/blog/blog-img-3.jpg"
                                                        alt="" class="rounded-3" width="56"
                                                        height="56" /></a>
                                            </div>
                                            <div>
                                                <h5 class="mb-1 fs-6"><a href="#!" class="text-inherit">Best
                                                        Blogging Practices</a></h5>
                                                <div class="d-flex gap-3 text-secondary">
                                                    <span>Feb 14, 2025</span>
                                                    <span>Robert Green</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>
                                        <span class="badge bg-warning-subtle text-warning-emphasis">Draft</span>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-dots-vertical" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Action</a>
                                                <a class="dropdown-item d-flex align-items-center" href="#!">Another
                                                    action</a>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Something else here</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-4">
                                            <div>
                                                <a href="#!"><img src="../assets/images/blog/blog-img-4.jpg"
                                                        alt="" class="rounded-3" width="56"
                                                        height="56" /></a>
                                            </div>
                                            <div>
                                                <h5 class="mb-1 fs-6"><a href="#!" class="text-inherit">Email
                                                        Marketing for Bloggers</a>
                                                </h5>
                                                <div class="d-flex gap-3 text-secondary">
                                                    <span>Feb 12, 2025</span>
                                                    <span>John Doe</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2,345</td>
                                    <td>21</td>
                                    <td>42</td>
                                    <td>314</td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary-emphasis">Published</span>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-dots-vertical" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Action</a>
                                                <a class="dropdown-item d-flex align-items-center" href="#!">Another
                                                    action</a>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Something else here</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-4">
                                            <div>
                                                <a href="#!"><img src="../assets/images/blog/blog-img-5.jpg"
                                                        alt="" class="rounded-3" width="56"
                                                        height="56" /></a>
                                            </div>
                                            <div>
                                                <h5 class="mb-1 fs-6"><a href="#!" class="text-inherit">SEO Best
                                                        Practices in 2025</a></h5>
                                                <div class="d-flex gap-3 text-secondary">
                                                    <span>Feb 2, 2025</span>
                                                    <span>Emily White</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>12,345</td>
                                    <td>21</td>
                                    <td>3.4k</td>
                                    <td>314</td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary-emphasis">Published</span>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-dots-vertical" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Action</a>
                                                <a class="dropdown-item d-flex align-items-center" href="#!">Another
                                                    action</a>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="#!">Something else here</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- card footer -->
                   
                </div>
            </div>
        </div>
    </div>






@endsection
