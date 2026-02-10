@extends('admin.layout.navbar')
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
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
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
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Info"
                                        class="text-reset">
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
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Info"
                                        class="text-reset">
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
                                <a href="{{ route('admin.monprofil') }}" class="btn btn-primary">voir mon Profile</a>
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
                <div class="card card-lg">
                    <div class="card-header border-bottom-0">
                        <h5 class="mb-0">Articles Récents</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Titre du Blog</th>
                                    <th>Date de publication</th>
                                    <th>Auteur</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-4">
                                                <div>
                                                    <a href="{{ route('admin.blog.show', $blog->public_id) }}">
                                                        <img src="{{ asset('storage/' . $blog->image) }}" alt=""
                                                            class="rounded-3" width="56" height="56"
                                                            style="object-fit: cover;" />
                                                    </a>
                                                </div>

                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <h5 class="mb-1 fs-6">
                                                    <a href="{{ route('admin.blog.show', $blog->public_id) }}"
                                                        class="text-inherit">
                                                        {{ $blog->title }}
                                                    </a>
                                                </h5>

                                            </div>
                                        </td>
                                        <td>{{ $blog->created_at->translatedFormat('d M Y') }}</td>
                                        <td>Superadmin</td>

                                        <td>
                                            <span class="badge bg-primary-subtle text-primary-emphasis">Publié</span>
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
                                                        href="{{ route('admin.blog.show', $blog->public_id) }}">
                                                        <i class="fe fe-eye me-2"></i> Voir
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('admin.blog.edit', $blog->public_id) }}">
                                                        <i class="fe fe-edit me-2"></i> Modifier
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="{{ route('admin.blog.delete', $blog->public_id) }}"
                                                        method="POST" class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="dropdown-item d-flex align-items-center text-danger btn-delete">
                                                            <i class="fe fe-trash me-2"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            Aucun blog trouvé.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection



<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Cette action est irréversible !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Oui, supprimer',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
