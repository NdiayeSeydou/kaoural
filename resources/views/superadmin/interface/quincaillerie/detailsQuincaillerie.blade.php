@extends('superadmin.layout.navbar')
@section('title', 'Détails Client | kaoural')
@section('suite')



    @if (session('retraitadd'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('retraitadd') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif




    @if (session('modifprod'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('modifprod') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session(key: 'deleteretrait'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('deleteretrait') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="custom-container">

        <!-- ================= HEADER CLIENT ================= -->
        <div class="row align-items-center mb-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Bg -->

                <div class="card card-lg overflow-hidden">
                    <div class="pt-16 rounded-top position-relative"
                        style="background: url('{{ asset('dash/assets/images/background/profile-cover-img.jpg') }}') no-repeat; background-size: cover;">

                        <div class="position-absolute top-0 end-0 m-4">
                            <a href="{{ route('superadmin.quincaillerie.edit', $quincaillerie->public_id) }}"
                                class="icon-shape icon-md bg-white rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit text-secondary">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column flex-lg-row gap-4">
                            @php
                                $name = $quincaillerie->nom ?? '';
                                // Prendre la première lettre de chaque mot
                                $initials = collect(explode(' ', $name))
                                    ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                    ->implode(' ');
                            @endphp

                            <div class="rounded-circle avatar avatar-xl d-flex justify-content-center align-items-center bg-primary text-white"
                                style="font-weight: bold; font-size: 1.2rem; width: 48px; height: 48px;">
                                {{ $initials }}
                            </div>

                            <div class="d-flex flex-column flex-lg-row justify-content-between w-100 gap-2">
                                <div class="d-lg-flex flex-lg-column">
                                    <h3 class="mb-0">{{ $quincaillerie->nom }}</h3>
                                    <div class="d-lg-flex align-items-center gap-2">
                                        <span>
                                            {{ $quincaillerie->telephone
                                                ? preg_replace('/(\+\d{3})(\d{2})(\d{2})(\d{2})(\d{2})/', '$1 $2 $3 $4 $5', $quincaillerie->telephone)
                                                : 'non renseigné' }}</span>

                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('superadmin.quincaillerie.retrait', $quincaillerie->public_id) }}"
                                            class="btn btn-white d-inline-flex align-items-center gap-2">Ajouter une
                                            créance<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                                                <path d="M11 13l9 -9" />
                                                <path d="M15 4h5v5" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-10">
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold fs-5">12,500</span>
                                        <span class="text-secondary">Total à payé</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold fs-5">350</span>
                                        <span class="text-secondary">Reste à payé</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ================= HISTORIQUE ================= -->
        <h4 class="mb-4">Historique des produits pris</h4>

        <div class="accordion" id="accordionHistorique">

            @forelse ($retraitsParJour as $date => $retraits)
                @php
                    $collapseId = 'collapse' . \Str::slug($date);
                    $headingId = 'heading' . \Str::slug($date);
                @endphp

                <div class="accordion-item mb-3 border rounded shadow-sm">

                    <h2 class="accordion-header" id="{{ $headingId }}">

                        <button
                            class="accordion-button d-flex align-items-center justify-content-between py-3 accordion-button-custom"
                            type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                            aria-expanded="false">

                            <div class="d-flex align-items-center gap-2">
                                <!-- ICONE -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="accordion-icon" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke-width="2">
                                    <path d="M6 9l6 6l6-6" />
                                </svg>

                                <span class="fw-bold">
                                    {{ \Carbon\Carbon::parse($date)->translatedFormat('l d F Y') }}
                                </span>
                            </div>

                            <span class="badge bg-soft-info text-info rounded-pill px-3">
                                {{ $retraits->count() }} produit{{ $retraits->count() > 1 ? 's' : '' }}
                            </span>
                        </button>
                    </h2>

                    <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionHistorique">
                        <div class="accordion-body p-3 pb-4">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0 text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Code</th>
                                            <th>Image</th>
                                            <th>Désignation</th>
                                            <th>Quantité</th>
                                            <th>Prix unitaire</th>
                                            <th>Emplacement</th>
                                            <th>Montant dû</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($retraits as $retrait)
                                            <tr class="align-middle">
                                                <td class="fw-semibold text-muted">#{{ $retrait->code_article }}</td>
                                                <td>
                                                    @if ($retrait->image)
                                                        <img src="{{ asset('storage/' . $retrait->image) }}"
                                                            alt="{{ $retrait->designation }}" width="45" height="45"
                                                            class="rounded" style="object-fit: cover;">
                                                    @else
                                                        <div class="rounded bg-light d-flex align-items-center justify-content-center"
                                                            style="width:45px;height:45px;">
                                                            <p>Aucune image</p>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="text-nowrap fw-semibold text-muted">{{ $retrait->designation }}
                                                </td>
                                                <td class="text-center fw-semibold">{{ $retrait->quantite_sortie }}</td>
                                                <td class="text-end">
                                                    {{ number_format($retrait->prix_unitaire, 0, ',', ' ') }} FCFA</td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge bg-soft-secondary text-secondary">{{ ucfirst($retrait->emplacement) }}</span>
                                                </td>
                                                <td class="text-end fw-bold text-primary">
                                                    {{ number_format($retrait->prix_total, 0, ',', ' ') }} FCFA</td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge 
                                                @if ($retrait->status === 'payée') bg-soft-success text-success
                                                @elseif($retrait->status === 'impayée') bg-soft-danger text-danger
                                                @else bg-soft-warning text-warning @endif">
                                                        {{ ucfirst($retrait->status) }}
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('superadmin.quincaillerie.editRetrait', $retrait->public_id) }}"
                                                        class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                        data-template="editOne"> <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-edit" width="16"
                                                            height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                        <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                                    </a>

                                                    <form id="delete-form-{{ $retrait->public_id }}"
                                                        action="{{ route('superadmin.quincaillerie.destroyRetrait', $retrait->public_id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="#"
                                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                            onclick="confirmDelete('{{ $retrait->public_id }}')"
                                                            data-template="trashTwo">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-trash" width="16"
                                                                height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 7l16 0" />
                                                                <path d="M10 11l0 6" />
                                                                <path d="M14 11l0 6" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                            <div id="trashTwo" class="d-none"><span>Supprimer</span>
                                                            </div>
                                                        </a>
                                                    </form>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            @empty
                <div class="alert alert-info text-center">
                    Aucun historique disponible pour cette quincaillerie.
                </div>
            @endforelse

        </div>

        <style>
            /* Bouton accordion transparent et bordure */
            .accordion-button-custom {
                background-color: transparent !important;
                box-shadow: none !important;
                color: inherit !important;
                width: 100%;
                padding-left: 1rem;
                padding-right: 1rem;
                border: 1px solid #dee2e6;
                border-radius: 0.5rem;
                transition: background-color 0.2s;
            }

            .accordion-button-custom:not(.collapsed) {
                background-color: #f8f9fa !important;
            }

            .accordion-button-custom:focus {
                box-shadow: none !important;
            }

            /* Rotation icône */
            .accordion-icon {
                transition: transform 0.3s;
            }

            .accordion-button-custom:not(.collapsed) .accordion-icon {
                transform: rotate(180deg);
            }
        </style>



    </div>

@endsection

<script>
    function confirmDelete(publicId) {
        Swal.fire({
            title: 'Supprimer ce retrait ?',
            text: "Cette action est irréversible",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + publicId).submit();
            }
        });
    }
</script>
