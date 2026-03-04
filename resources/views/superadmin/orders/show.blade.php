@extends('superadmin.layout.navbar')
@section('title', 'Commande #' . $commande->public_id)
@section('suite')

    <div class="custom-container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('superadmin.order.index') }}" class="btn btn-dark">
                <i class="fa fa-arrow-left me-1"></i> Retour à la liste
            </a>

        </div>

        <div class="card shadow-sm border-0 p-4">


            <hr class="my-4">

            <div class="row mb-5">
                <div class="col-md-6">
                    <h6 class="text-muted text-uppercase small fw-bold">Destinataire :</h6>
                    <h5 class="fw-bold mb-1">{{ Str::ucfirst($commande->nom_client) }}</h5>
                    <p class="text-muted mb-1"><i class="fa fa-phone me-1"></i>
                        @php
                            $cleanPhone = str_replace(' ', '', $commande->telephone);
                            if (preg_match('/^(\+\d{3})(\d+)$/', $cleanPhone, $matches)) {
                                $indicatif = $matches[1];
                                $reste = $matches[2];
                                $final = "<strong>$indicatif</strong> " . implode(' ', str_split($reste, 2));
                            } else {
                                $final = implode(' ', str_split($cleanPhone, 2));
                            }
                        @endphp
                        {!! $final !!}
                    </p>
                    <p class="text-muted"><i class="fa fa-map-marker me-1"></i>
                        {{ Str::ucfirst(Str::limit($commande->adresse, 33, '...')) }}
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h6 class="text-muted text-uppercase small fw-bold">Statut de la commande :</h6>
                    @php
                        $statusColor =
                            $commande->statut == 'validee'
                                ? 'success'
                                : ($commande->statut == 'en_attente'
                                    ? 'warning'
                                    : 'danger');
                    @endphp
                    <span class="badge bg-{{ $statusColor }} fs-6 px-3">
                        {{ ucfirst(str_replace('_', ' ', $commande->statut)) }}
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead class="bg-light">
                        <tr>
                            <th class="py-3 ps-3">Image</th>
                            <th class="py-3">Désignation</th>
                            <th class="py-3 text-center">Quantité</th>
                            <th class="py-3 text-end">Prix Unitaire</th>
                            <th class="py-3 text-end pe-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commande->lignes as $ligne)
                            <tr class="border-bottom align-middle">
                                <td class="py-3 ps-3">
                                    {{-- On vérifie si la relation 'produit' existe pour cette ligne --}}
                                    @if ($ligne->produit && $ligne->produit->image)
                                        <img src="{{ asset('storage/' . $ligne->produit->image) }}"
                                            style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;"
                                            alt="{{ $ligne->designation }}">
                                    @else
                                        {{-- Icône de remplacement si le produit a été supprimé ou n'a pas d'image --}}
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                            style="width: 50px; height: 50px;">
                                            <i class="fa fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>

                                <td class="py-3">
                                    <span class="fw-medium text-dark">{{ $ligne->designation }}</span>
                                </td>
                                <td class="py-3 text-center">
                                    <span class="badge bg-light text-dark border">x{{ (int) $ligne->quantite }}</span>
                                </td>
                                <td class="py-3 text-end">{{ number_format($ligne->prix_unitaire, 0, ',', ' ') }}
                                    <small>FCFA</small>
                                </td>
                                <td class="py-3 text-end pe-3 fw-bold text-primary">
                                    {{ number_format($ligne->quantite * $ligne->prix_unitaire, 0, ',', ' ') }} FCFA
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-end mt-4">
                <div class="col-md-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Sous-total :</span>
                        <span class="fw-bold">{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</span>
                    </div>
                   
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-primary">TOTAL :</h5>
                        <h5 class="fw-bold text-primary">{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {

            .btn,
            .navbar,
            .sidebar {
                display: none !important;
            }

            .card {
                box-shadow: none !important;
                border: none !important;
            }

            .custom-container {
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
            }
        }

        .table thead th {
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
    </style>

@endsection
