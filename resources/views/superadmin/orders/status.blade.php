@extends('superadmin.layout.navbar')

@section('title', 'Kanban Statut Commandes')

@section('suite')

<div class="container-fluid px-4">
    <h1 class="mb-4">Kanban des commandes</h1>

    <div class="d-flex gap-4 overflow-auto pb-4" id="kanbanBoard">

        @foreach($groupes as $statut => $commandes)

            <div class="card shadow-sm kanban-column"
                 data-statut="{{ $statut }}"
                 style="min-width:300px;">

                {{-- Header --}}
                <div class="card-header text-center bg-light">
                    <h5 class="mb-1 text-capitalize">{{ $statut }}</h5>
                    <span class="badge bg-secondary">
                        {{ $commandes->count() }}
                    </span>
                </div>

                {{-- Body --}}
                <div class="card-body kanban-items"
                     style="min-height:400px; max-height:70vh; overflow-y:auto;">

                    @foreach($commandes as $commande)

                        <div class="card mb-3 shadow-sm border-0 kanban-item"
                             data-id="{{ $commande->public_id }}">

                            <div class="card-body">

                                <h6 class="mb-2">
                                    Commande #{{ $commande->public_id }}
                                </h6>

                                <small class="text-muted d-block mb-2">
                                    {{ $commande->created_at->format('d/m/Y H:i') }}
                                </small>

                                <a href="{{ route('superadmin.orders.show', $commande->public_id) }}"
                                   class="btn btn-sm btn-outline-primary w-100">
                                    Voir
                                </a>

                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

        @endforeach

    </div>
</div>

{{-- Dragula --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    let containers = document.querySelectorAll('.kanban-items');

    dragula([...containers]).on('drop', function (el, target, source) {

        let publicId = el.getAttribute('data-id');
        let newStatut = target.closest('.kanban-column').getAttribute('data-statut');
        let oldStatut = source.closest('.kanban-column').getAttribute('data-statut');

        // Si même colonne → ne rien faire
        if (newStatut === oldStatut) return;

        fetch("{{ route('superadmin.orders.updateStatusAjax') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                public_id: publicId,
                statut: newStatut
            })
        })
        .then(response => response.json())
        .then(data => {

            if (data.success) {

                Swal.fire({
                    icon: 'success',
                    title: 'Statut mis à jour !',
                    text: 'La commande a été déplacée vers "' + newStatut + '"',
                    timer: 1800,
                    showConfirmButton: false
                });

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'La mise à jour a échoué'
                });

            }

        })
        .catch(() => {

            Swal.fire({
                icon: 'error',
                title: 'Erreur serveur',
                text: 'Impossible de mettre à jour le statut'
            });

        });

    });

});
</script>

@endsection