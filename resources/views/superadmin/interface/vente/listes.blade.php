@extends('superadmin.layout.navbar')
@section('title', 'Liste des ventes | kaoural')

@section('suite')

    @if (session('venteajoutnew'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('venteajoutnew') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('ventupdt'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('ventupdt') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('delvente'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('delvente') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session('errupt'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('errupt') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    @if (session(key: 'errorventenew'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('errorventenew') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif




    


    <div class="custom-container">







        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h2">Liste des ventes</h1>
            <a href="{{ route('superadmin.vente.create') }}" class="btn btn-dark">+ Ajouter une vente</a>
        </div>





        <div class="card mb-5 shadow-sm">
    <div class="card-body">
        <form action="{{ route('superadmin.vente.index') }}" method="GET">
            <div class="row g-3 align-items-end">

                <div class="col-lg-3 col-md-6">
                    <label class="form-label fw-semibold">Date de vente</label>
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label fw-semibold">Produit</label>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Désignation ou code article..." 
                               value="{{ request('search') }}">
                        <button class="btn btn-light border" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        Filtrer les ventes
                    </button>
                    
                    <a href="{{ route('superadmin.vente.index') }}" class="btn btn-outline-danger w-100">
                        Réinitialiser
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>

        <div class="d-flex justify-content-center gap-3 mb-4">
            <button id="btnBoutique" class="btn btn-dark px-4 shadow-none">Boutique</button>
            <button id="btnMagasin" class="btn btn-outline-dark px-4 shadow-none">Magasin</button>
        </div>




        

        <div id="ventesBoutique">
            @php $hasGlobalBoutique = false; @endphp
            <div class="accordion" id="accordionBoutique">
                @foreach ($ventes as $date => $items)
                    @php $itemsBoutique = $items->where('emplacement', 'boutique'); @endphp
                    @if ($itemsBoutique->count() > 0)
                        @php $hasGlobalBoutique = true; @endphp
                        <div class="accordion-item mb-3 border shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }} fw-bold"
                                    data-bs-toggle="collapse" data-bs-target="#boutique_{{ $loop->index }}">
                                    <i class="bi bi-box-seam me-2"></i>
                                    Ventes du {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
                                    <span class="badge bg-primary ms-2">{{ $itemsBoutique->count() }}</span>
                                </button>
                            </h2>
                            <div id="boutique_{{ $loop->index }}"
                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                data-bs-parent="#accordionBoutique">
                                <div class="accordion-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Article</th>
                                                    <th>Quantité</th>
                                                    <th>Total</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemsBoutique as $vente)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ $vente->image ? asset('storage/' . $vente->image) : asset('images/no-image.png') }}"
                                                                width="40" height="40"
                                                                class="rounded border object-fit-cover">
                                                        </td>
                                                        <td>
                                                            <span class="fw-bold">{{ $vente->code_article }}</span><br>
                                                            <small class="text-muted">{{ $vente->designation }}</small>
                                                        </td>
                                                        <td>{{ $vente->quantite }}</td>
                                                        <td class="fw-bold text-primary">
                                                            {{ number_format($vente->prix_total, 0, ',', ' ') }} FCFA</td>
                                                        <td class="text-end">
                                                            {{-- VOIR --}}
                                                            <a href="{{ route('superadmin.vente.show', ['public_id' => $vente->public_id]) }}"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle"
                                                                title="Voir">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                    height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                    <path
                                                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                                </svg>
                                                            </a>
                                                            {{-- MODIFIER --}}
                                                            <a href="{{ route('superadmin.vente.edit', ['public_id' => $vente->public_id]) }}"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle"
                                                                title="Modifier">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                    height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path
                                                                        d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                    <path d="M13.5 6.5l4 4" />
                                                                </svg>
                                                            </a>
                                                            {{-- SUPPRIMER --}}
                                                            <form id="delete-form-{{ $vente->public_id }}"
                                                                action="{{ route('superadmin.vente.destroy', $vente->public_id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf @method('DELETE')
                                                                <button type="button"
                                                                    onclick="confirmDelete('{{ $vente->public_id }}')"
                                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle text-danger"
                                                                    title="Supprimer">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                        height="18" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M4 7l16 0" />
                                                                        <path d="M10 11l0 6" />
                                                                        <path d="M14 11l0 6" />
                                                                        <path
                                                                            d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                        <path
                                                                            d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                    </svg>
                                                                </button>
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
                    @endif
                @endforeach
            </div>
            @if (!$hasGlobalBoutique)
                <div class="text-center py-5">
                    <p class="text-muted">Aucune vente enregistrée pour la boutique.</p>
                </div>
            @endif
        </div>

        <div id="ventesMagasin" class="d-none">
            @php $hasGlobalMagasin = false; @endphp
            <div class="accordion" id="accordionMagasin">
                @foreach ($ventes as $date => $items)
                    @php $itemsMagasin = $items->where('emplacement', 'magasin'); @endphp
                    @if ($itemsMagasin->count() > 0)
                        @php $hasGlobalMagasin = true; @endphp
                        <div class="accordion-item mb-3 border shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" data-bs-toggle="collapse"
                                    data-bs-target="#magasin_{{ $loop->index }}">
                                    <i class="bi bi-box-seam me-2"></i>
                                    Ventes du {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
                                    <span class="badge bg-secondary ms-2">{{ $itemsMagasin->count() }}</span>
                                </button>
                            </h2>
                            <div id="magasin_{{ $loop->index }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionMagasin">
                                <div class="accordion-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Article</th>
                                                    <th>Quantité</th>
                                                    <th>Total</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemsMagasin as $vente)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ $vente->image ? asset('storage/' . $vente->image) : asset('images/no-image.png') }}"
                                                                width="40" height="40" class="rounded border">
                                                        </td>
                                                        <td>
                                                            <span class="fw-bold">{{ $vente->code_article }}</span><br>
                                                            <small class="text-muted">{{ $vente->designation }}</small>
                                                        </td>
                                                        <td>{{ $vente->quantite }}</td>
                                                        <td class="fw-bold text-success">
                                                            {{ number_format($vente->prix_total, 0, ',', ' ') }} FCFA</td>
                                                        <td class="text-end">
                                                            <a href="{{ route('superadmin.vente.show', ['public_id' => $vente->public_id]) }}"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                    height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                    <path
                                                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                                </svg>
                                                            </a>
                                                            <a href="{{ route('superadmin.vente.edit', ['public_id' => $vente->public_id]) }}"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                    height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path
                                                                        d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                    <path d="M13.5 6.5l4 4" />
                                                                </svg>
                                                            </a>
                                                            <form id="delete-form-{{ $vente->public_id }}"
                                                                action="{{ route('superadmin.vente.destroy', $vente->public_id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf @method('DELETE')
                                                                <button type="button"
                                                                    onclick="confirmDelete('{{ $vente->public_id }}')"
                                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle text-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                        height="18" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M4 7l16 0" />
                                                                        <path d="M10 11l0 6" />
                                                                        <path d="M14 11l0 6" />
                                                                        <path
                                                                            d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                        <path
                                                                            d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                    </svg>
                                                                </button>
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
                    @endif
                @endforeach
            </div>
            @if (!$hasGlobalMagasin)
                <div class="text-center py-5">
                    <p class="text-muted">Aucune vente enregistrée pour le magasin.</p>
                </div>
            @endif
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(public_id) {
            Swal.fire({
                title: 'Êtes-vous sûr de supprimer cette vente ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + public_id).submit();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const btnB = document.getElementById('btnBoutique');
            const btnM = document.getElementById('btnMagasin');
            const divB = document.getElementById('ventesBoutique');
            const divM = document.getElementById('ventesMagasin');

            btnB.onclick = () => {
                divB.classList.remove('d-none');
                divM.classList.add('d-none');
                btnB.className = 'btn btn-dark px-4 shadow-none';
                btnM.className = 'btn btn-outline-dark px-4 shadow-none';
            };

            btnM.onclick = () => {
                divM.classList.remove('d-none');
                divB.classList.add('d-none');
                btnM.className = 'btn btn-dark px-4 shadow-none';
                btnB.className = 'btn btn-outline-dark px-4 shadow-none';
            };
        });
    </script>
@endsection
