@extends('superadmin.layout.navbar')
@section('title', 'Tableau de Bord des Commandes | Kaoural')
@section('suite')



    @if (session('delcom'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('delcom') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('comupt'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('comupt') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif



    @if (session('stockdel'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('stockdel') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="custom-container py-4">


        <div class="d-md-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Gestion des Commandes</h1>
                <p class="text-muted small">Consultez, validez et gérez vos flux de ventes.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('superadmin.order.kanban') }}" class="btn btn-dark shadow-sm">
                    <i class="fa fa-th-large me-1"></i> Mode Kanban
                </a>

            </div>
        </div>

        <div class="row mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3  text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-dark-50">Total Commandes</h6>
                                <h2 class="mb-0 fw-bold">{{ $commandes->total() }}</h2>
                            </div>
                            <i class="fa fa-shopping-basket fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">En attente</h6>
                                <h2 class="mb-0 fw-bold text-warning">
                                    {{ $commandes->where('statut', 'en attente')->count() }}</h2>
                            </div>
                            <i class="fa fa-clock-o fa-2x text-warning opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Validées</h6>
                                <h2 class="mb-0 fw-bold text-success">{{ $commandes->where('statut', 'validee')->count() }}
                                </h2>
                            </div>
                            <i class="fa fa-check-circle fa-2x text-success opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Chiffre d'Affaire</h6>
                                <h3 class="mb-0 fw-bold text-dark">
                                    {{ number_format($commandes->sum('montant_total'), 0, ',', ' ') }} <small>FCFA</small>
                                </h3>
                            </div>
                            <i class="fa fa-money fa-2x text-primary opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3">Date</th>
                                <th class="py-3">Client</th>
                                <th class="py-3">Contact</th>
                                <th class="py-3">Adresse</th>
                                <th class="py-3">Montant</th>
                                <th class="py-3">Status</th>
                                <th class="py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($commandes as $commande)
                                <tr class="text-nowrap align-middle">
                                    <td class="ps-4">
                                        <div class="small fw-medium">
                                            {{ $commande->created_at->translatedFormat('d M Y à H:i') }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="fw-bold" title="{{ $commande->nom_client }}">
                                            {{ Str::limit($commande->nom_client, 15, '...') }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="small">
                                            <i class="fa fa-phone text-muted me-1"></i>
                                            @php
                                                $cleanPhone = str_replace(' ', '', $commande->telephone);
                                                if (preg_match('/^(\+\d{3})(\d+)$/', $cleanPhone, $matches)) {
                                                    $indicatif = $matches[1];
                                                    $reste = $matches[2];
                                                    $final =
                                                        "<strong>$indicatif</strong> " .
                                                        implode(' ', str_split($reste, 2));
                                                } else {
                                                    $final = implode(' ', str_split($cleanPhone, 2));
                                                }
                                            @endphp
                                            {!! $final !!}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="small text-muted" title="{{ $commande->adresse }}">
                                            <i class="fa fa-map-marker me-1"></i>
                                            {{ Str::ucfirst(Str::limit($commande->adresse, 15, '...')) }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="fw-bold text-dark">
                                            {{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA
                                        </span>
                                    </td>

                                    <td>
                                        @if ($commande->statut == 'en_attente')
                                            <span class="badge rounded-pill bg-warning text-dark px-3"
                                                style="font-size: 0.7rem;">En attente</span>
                                        @elseif($commande->statut == 'validee')
                                            <span class="badge rounded-pill bg-success px-3"
                                                style="font-size: 0.7rem;">Validée</span>
                                        @else
                                            <span class="badge rounded-pill bg-info px-3"
                                                style="font-size: 0.7rem;">{{ ucfirst($commande->statut) }}</span>
                                        @endif
                                    </td>


                                    <td>

                                        <a href="{{ route('superadmin.orders.show', $commande->public_id) }}"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                            data-template="viewOne">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                                width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 12a3 3 0 1 0 -6 0a3 3 0 0 0 6 0" />
                                                <path
                                                    d="M2 12c2.5 -4.5 6.5 -7 10 -7s7.5 2.5 10 7c-2.5 4.5 -6.5 7 -10 7s-7.5 -2.5 -10 -7" />
                                            </svg>
                                            <div id="viewOne" class="d-none">
                                                <span>Voir</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('superadmin.orders.edit', $commande->public_id) }}"
                                            class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                            data-template="editOne"> <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            <div id="editOne" class="d-none"> <span>Modifier</span> </div>
                                        </a>



                                        @if ($commande->statut !== 'validee')
                                            <a href="javascript:void(0);"
                                                onclick="confirmValidation('{{ $commande->public_id }}')"
                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                data-template="validateOrder">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-circle-check" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <circle cx="12" cy="12" r="9" />
                                                    <path d="M9 12l2 2l4 -4" />
                                                </svg>
                                                <div id="validateOrder" class="d-none">
                                                    <span>Valider la commande</span>
                                                </div>
                                            </a>

                                            <form id="form-valider-{{ $commande->public_id }}"
                                                action="{{ route('superadmin.orders.valider', $commande->public_id) }}"
                                                method="GET" style="display: none;">
                                                @csrf
                                            </form>
                                        @endif

                                        <form id="delete-form-{{ $commande->public_id }}"
                                            action="{{ route('superadmin.orders.destroy', $commande->public_id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                onclick="confirmDelete('{{ $commande->public_id }}')"
                                                data-template="trashTwo">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash" width="16"
                                                    height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                                <div id="trashTwo" class="d-none"><span>Supprimer</span></div>
                                            </a>
                                        </form>





                                    </td>





                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <p class="text-muted">Aucune commande pour le moment.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
              
            </div>
            
        </div>

           <nav aria-label="Page navigation example" class="mt-4">
                    <ul class="pagination justify-content-center mb-0">
                        {{-- Lien précédent --}}
                        <li class="page-item {{ $commandes->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $commandes->previousPageUrl() }}">Précedent</a>
                        </li>

                        {{-- Pages --}}
                        @foreach ($commandes->getUrlRange(1, $commandes->lastPage()) as $page => $url)
                            <li class="page-item {{ $commandes->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- Lien suivant --}}
                        <li class="page-item {{ $commandes->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $commandes->nextPageUrl() }}">Suivant</a>
                        </li>
                    </ul>
                </nav>


    </div>

@endsection
<script>
    function confirmDelete(publicId) {
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

                document.getElementById('delete-form-' + publicId).submit();
            }
        })
    }

    function confirmValidation(publicId) {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action validera définitivement cette commande.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, valider !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-valider-' + publicId).submit();
            }
        })
    }
</script>
