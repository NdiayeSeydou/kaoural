@extends('superadmin.layout.navbar')
@section('title', 'Détails Créance | kaoural')
@section('suite')

    <div class="custom-container">
        {{-- Alertes de notifications --}}
        @foreach (['retraitadd', 'modifprod', 'deleteretrait'] as $msg)
            @if (session($msg))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4">
                    <i class="fe fe-check-circle me-2"></i> {{ session($msg) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        @endforeach

        {{-- En-tête du profil client --}}
        <div class="card border-0 shadow-sm mb-5 overflow-hidden">
            <div class="pt-12 rounded-top position-relative"
                style="background: linear-gradient(rgba(0,0,0,0.05), rgba(0,0,0,0.2)), url('{{ asset('dash/assets/images/background/profile-cover-img.jpg') }}') no-repeat; background-size: cover; height: 120px;">
                <div class="position-absolute top-0 end-0 m-3">
                    <a href="{{ route('superadmin.creance.edit', $creance->public_id) }}"
                        class="btn btn-white btn-sm btn-icon rounded-circle shadow">
                        <i class="bi bi-pencil-square text-primary"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-md-end mt-n5 gap-3">
                    {{-- Avatar avec Initiales --}}
                    <div class="avatar avatar-xxl position-relative mt-n10">
                        @php
                            $words = explode(' ', $creance->nom);
                            $initials = strtoupper(
                                substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''),
                            );
                        @endphp
                        <div class="rounded-circle border border-4 border-white bg-primary text-white d-flex align-items-center justify-content-center shadow"
                            style="width: 100px; height: 100px; font-size: 2rem; font-weight: 800;">
                            {{ $initials }}
                        </div>
                    </div>

                    {{-- Informations du Créancier --}}
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center gap-2">
                            <h2 class="mb-1 fw-bold">{{ $creance->nom }}</h2>

                        </div>
                        <p class="text-muted mb-0">
                            <i class="fe fe-phone-call me-1"></i>
                            @php
                                $tel = trim($creance->telephone);
                                if (str_starts_with($tel, '+')) {
                                    echo '<strong>' .
                                        substr($tel, 0, 4) .
                                        '</strong> ' .
                                        trim(chunk_split(substr($tel, 4), 2, ' '));
                                } else {
                                    echo trim(chunk_split($tel, 2, ' '));
                                }
                            @endphp
                            <span class="mx-2">|</span>
                            <i class="fe fe-map-pin me-1"></i> {{ $creance->adresse ?? 'Adresse non renseignée' }}
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="d-flex gap-2 pb-1">
                        <a href="{{ route('superadmin.creance.retrait', $creance->public_id) }}"
                            class="btn btn-primary shadow-sm d-inline-flex align-items-center">
                            <i class="fe fe-plus-circle me-2"></i> Nouveau retrait
                        </a>
                    </div>
                </div>

                <hr class="my-4">

                {{-- Cartes de synthèse financière --}}
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light">
                            <span class="text-muted small text-uppercase fw-bold">ID Créance</span>
                            <h3 class="mb-0 mt-1 fw-bold text-primary">#{{ $creance->public_id }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-soft-info">
                            <span class="text-info small text-uppercase fw-bold">Articles retirés</span>
                            <h3 class="mb-0 mt-1 fw-bold">{{ $creance->retraits->count() }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-soft-danger">
                            <span class="text-danger small text-uppercase fw-bold">Total Impayé</span>
                            <h3 class="mb-0 mt-1 fw-bold text-danger">
                                {{ number_format($creance->retraits->where('status', 'impayée')->sum('prix_total'), 0, ',', ' ') }}
                                <small class="fs-6">FCFA</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Liste Historique --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 fw-bold"><i class="fe fe-list me-2 text-primary"></i>Historique des retraits</h4>
        </div>

        <div class="accordion shadow-sm" id="accordionHistorique">
            @forelse ($retraitsParJour as $date => $retraits)
                @php
                    $collapseId = 'collapse' . \Str::slug($date);
                    $headingId = 'heading' . \Str::slug($date);
                    $totalJournalier = $retraits->sum('prix_total');
                @endphp

                <div class="accordion-item border-0 mb-3 overflow-hidden rounded-3 shadow-xs">
                    <h2 class="accordion-header" id="{{ $headingId }}">
                        <button class="accordion-button collapsed px-4 py-3 bg-white" type="button"
                            data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}">
                            <div class="d-flex align-items-center justify-content-between w-100 me-3">
                                <div>
                                    <i class="fe fe-calendar me-2 text-primary"></i>
                                    <span
                                        class="fw-bold text-dark">{{ \Carbon\Carbon::parse($date)->translatedFormat('l d F Y') }}</span>
                                    <span class="badge bg-soft-secondary text-muted ms-2">{{ $retraits->count() }}
                                        ligne(s)</span>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block"
                                        style="font-size: 0.7rem; text-uppercase;">Sous-total</small>
                                    <span class="fw-bold text-primary">{{ number_format($totalJournalier, 0, ',', ' ') }}
                                        F</span>
                                </div>
                            </div>
                        </button>
                    </h2>

                    <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionHistorique">
                        <div class="accordion-body p-0 border-top">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr class="small text-uppercase fw-bold text-muted">
                                            <th class="ps-4">Article</th>
                                            <th class="text-center">Quantité</th>
                                            <th class="text-end">P.U</th>
                                            <th class="text-end">Total</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end pe-4">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($retraits as $retrait)
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        @if ($retrait->image)
                                                            <img src="{{ asset('storage/' . $retrait->image) }}"
                                                                class="rounded shadow-sm me-3" width="45" height="45"
                                                                style="object-fit: cover;">
                                                        @else
                                                            <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                                                style="width:45px; height:45px;">
                                                                <i class="fe fe-package text-muted fs-4"></i>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <h5 class="mb-0 fs-6 fw-bold text-dark">
                                                                {{ $retrait->designation }}</h5>
                                                            <small class="text-muted">Réf:
                                                                {{ $retrait->code_article }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center fw-semibold text-dark">
                                                    {{ $retrait->quantite_sortie }}</td>
                                                <td class="text-end text-muted">
                                                    {{ number_format($retrait->prix_unitaire, 0, ',', ' ') }}</td>
                                                <td class="text-end fw-bold text-primary">
                                                    {{ number_format($retrait->prix_total, 0, ',', ' ') }} F</td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge rounded-pill {{ in_array($retrait->status, ['payée', 'bon']) ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger' }}">
                                                        {{ ucfirst($retrait->status) }}
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('superadmin.creance.editRetrait', $retrait->public_id) }}"
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
                                                        action="{{ route('superadmin.creance.destroyRetrait', $retrait->public_id) }}"
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
                <div class="card border-0 shadow-sm p-5 text-center">
                    <div class="mb-3">
                        <i class="fe fe-folder text-muted" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="text-muted">Aucun retrait enregistré</h5>
                    <p class="small text-muted mb-0">Cliquez sur "Nouveau retrait" pour commencer l'historique.</p>
                </div>
            @endforelse


            

        </div>

        
    </div>

  
    <nav aria-label="Page navigation example" class="mt-4">
        <ul class="pagination justify-content-center mb-0">
            {{-- Lien précédent --}}
            <li class="page-item {{ $retraitsParJour->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $retraitsParJour->previousPageUrl() }}">Précedent</a>
            </li>

            {{-- Pages --}}
            @foreach ($retraitsParJour->getUrlRange(1, $retraitsParJour->lastPage()) as $page => $url)
                <li class="page-item {{ $retraitsParJour->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Lien suivant --}}
            <li class="page-item {{ $retraitsParJour->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $retraitsParJour->nextPageUrl() }}">Suivant</a>
            </li>
        </ul>
    </nav>


@endsection

<script>
    function confirmDelete(publicId) {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "La quantité sera automatiquement retournée au stock principal.",
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
