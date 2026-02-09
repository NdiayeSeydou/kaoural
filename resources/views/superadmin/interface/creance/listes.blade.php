@extends('superadmin.layout.navbar')

@section('title', 'Gestion des créances clients | Kaoural')

@section('suite')

    <style>
        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }

        .sticky-top {
            z-index: 10;
            background: white;
        }

        .badge-paid {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .custom-container {
            padding: 1.5rem;
        }

        .avatar-soft-danger {
            background-color: #fee2e2;
            color: #b91c1c;
        }
    </style>


    @if (session('creanceajout'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('creanceajout') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('creancemodif'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('creancemodif') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('creancedel'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('creancedel') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="custom-container">
        {{-- Header de la page --}}
        <div class="row mb-4">
            <div class="col-12 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-1 h2 fw-bold">Gestion des créances clients</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Créances</li>
                        </ol>
                    </nav>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('superadmin.creance.create') }}" class="btn btn-dark d-flex align-items-center gap-2">
                        <i class="fe fe-plus"></i> Nouveau Créancier
                    </a>
                </div>
            </div>
        </div>

        {{-- Section Statistiques --}}
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <span class="text-muted text-uppercase fw-semibold fs-6">Total Créances</span>
                        <h3 class="fw-bold mt-2 text-dark">{{ number_format($totalCreances ?? 0, 0, ',', ' ') }} FCFA</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm border-start border-4 border-danger">
                    <div class="card-body text-center">
                        <span class="text-danger text-uppercase fw-semibold fs-6">Créanciers Impayés</span>
                        <h3 class="fw-bold mt-2">
                            {{ $creances->filter(function ($creance) {
                                    return $creance->retraits->where('status', 'impayée')->count() > 0;
                                })->count() }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <span class="text-muted text-uppercase fw-semibold fs-6">Total Créanciers</span>
                        <h3 class="fw-bold mt-2">{{ $creances->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bloc de Filtrage (Style Stock) --}}
        <div class="card mb-5 shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('superadmin.creance.index') }}" method="GET">
                    <div class="row g-3 align-items-end">

                        <div class="col-lg-4 col-md-6 col-12">
                            <label class="form-label fw-semibold">Recherche</label>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Nom du client, téléphone..." value="{{ request('search') }}">
                                <span class="input-group-text bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8" />
                                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <label class="form-label fw-semibold">Statut de paiement</label>
                            <select name="statut" class="form-select">
                                <option value="">Tous les statuts</option>
                                <option value="Paid" {{ request('statut') == 'Paid' ? 'selected' : '' }}>Payée (Soldé)
                                </option>
                                <option value="Pending" {{ request('statut') == 'Pending' ? 'selected' : '' }}>Impayée
                                    (Créance)</option>
                            </select>
                        </div>

                        <div class="col-lg-5 col-md-12 col-12 d-flex gap-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fe fe-filter me-1"></i> Filtrer les résultats
                            </button>
                            <a href="{{ route('superadmin.creance.index') }}" class="btn btn-outline-danger w-100">
                                <i class="fe fe-refresh-cw me-1"></i> Réinitialiser
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        {{-- Liste des créances --}}
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-nowrap"> {{-- Ajout de text-nowrap ici --}}
                    <thead class="sticky-top table-light">
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Contact</th>
                            <th>Adresse</th>
                            <th>Statut</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($creances as $creance)
                            <tr>
                                <td class="fw-bold text-primary">#{{ $creance->public_id }}</td>

                                <td>

                                    <span class="fw-medium">{{ $creance->nom }}</span>
            </div>
            </td>

            <td class="fw-medium text-dark">
                <i class="fe fe-phone-call me-1 text-muted small"></i>
                @php
                    $tel = trim($creance->telephone);

                    // On vérifie si le numéro commence par un "+"
                    if (str_starts_with($tel, '+')) {
                        // Pour la plupart des pays (Mali +223, Sénégal +221, etc.)
                        // On prend l'indicatif (4 premiers caractères : + et 3 chiffres)
    $indicatif = substr($tel, 0, 4);
    $reste = substr($tel, 4);

    echo "<strong>$indicatif</strong> " . trim(chunk_split($reste, 2, ' '));
} else {
    // Si pas d'indicatif, on affiche normalement par blocs de 2
                        echo trim(chunk_split($tel, 2, ' '));
                    }
                @endphp
            </td>

            <td>
                <small class="text-muted">
                    <i class="fe fe-map-pin me-1"></i>{{ Str::limit($creance->adresse, 30) }}
                </small>
            </td>

            <td>
                @if ($creance->retraits->count() == 0)
                    {{-- Cas 1 : Aucun retrait --}}
                    <span class="badge bg-light text-dark">Nouveau créancier</span>
                @elseif ($creance->retraits->where('status', 'impayée')->count() > 0)
                    {{-- Cas 2 : Au moins un retrait est impayé --}}
                    <span class="badge bg-danger">
                        {{-- Calcul dynamique du reste à payer basé sur les retraits impayés --}}
                        {{ number_format($creance->retraits->where('status', 'impayée')->sum('prix_total'), 0, ',', ' ') }}
                        F
                    </span>
                @else
                    {{-- Cas 3 : Des retraits existent et tous sont payés --}}
                    <span class="badge bg-success">Soldé</span>
                @endif
            </td>

            <td>
                <div class="dropdown">
                    <a class="btn btn-ghost btn-icon rounded-circle" href="#!" data-bs-toggle="dropdown">
                        ⋮
                    </a>

                    <div class="dropdown-menu">

                        {{-- Détails --}}
                        <a class="dropdown-item" href="{{ route('superadmin.creance.show', $creance->public_id) }}">
                            Détails
                        </a>

                        {{-- Modifier --}}
                        <a class="dropdown-item" href="{{ route('superadmin.creance.edit', $creance->public_id) }}">
                            Modifier
                        </a>

                        {{-- Retrait --}}
                        <a class="dropdown-item" href="{{ route('superadmin.creance.retrait', $creance->public_id) }}">
                            Ajouter un retrait
                        </a>

                        {{-- Supprimer --}}
                        <form method="POST" action="{{ route('superadmin.creance.delete', $creance->public_id) }}"
                            onsubmit="return confirm('Supprimer cette creance ?')">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item text-danger">
                                Supprimer
                            </button>
                        </form>

                    </div>
                </div>
            </td>


            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center py-5 text-muted">Aucune donnée disponible.</td>
            </tr>
            @endforelse
            </tbody>
            </table>
        </div>
    </div>

    <nav aria-label="Page navigation example" class="mt-4">
        <ul class="pagination justify-content-center mb-0">
            {{-- Lien précédent --}}
            <li class="page-item {{ $creances->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $creances->previousPageUrl() }}">Précedent</a>
            </li>

            {{-- Pages --}}
            @foreach ($creances->getUrlRange(1, $creances->lastPage()) as $page => $url)
                <li class="page-item {{ $creances->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Lien suivant --}}
            <li class="page-item {{ $creances->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $creances->nextPageUrl() }}">Suivant</a>
            </li>
        </ul>
    </nav>
    </div>
    </div>
@endsection
