@extends('landing.layouts.navbar')
@section('title', 'Mon panier')


@if (session('errorcom'))
    <div class="alert alert-warning">erreur</div>
@endif

@section('suite')
    <div class="cart_area section_padding_100_70 clearfix">
        <div class="container">
            <div class="row">
                {{-- SECTION GAUCHE : TABLEAU DES PRODUITS --}}
                <div class="col-12 col-lg-8">
                    <div class="cart-table mb-50">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Suppr.</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Produit</th>
                                        <th scope="col">Prix Unitaire</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalGeneral = 0; @endphp
                                    @if (session('cart') && count(session('cart')) > 0)
                                        @foreach (session('cart') as $id => $details)
                                            @php $totalGeneral += $details['prix'] * $details['quantity']; @endphp
                                            <tr>
                                                <td>
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="public_id" value="{{ $id }}">
                                                        <button type="submit" class="btn btn-sm text-danger"><i
                                                                class="icofont-trash"></i></button>
                                                    </form>
                                                </td>
                                                <td><img src="{{ asset('storage/' . $details['image']) }}"
                                                        style="width: 50px; border-radius: 5px;"></td>
                                                <td class="text-left font-weight-bold">{{ $details['designation'] }}</td>
                                                <td>{{ number_format($details['prix'], 0, ',', ' ') }} FCFA</td>
                                                <td>
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="public_id" value="{{ $id }}">
                                                        <input type="number" name="quantity"
                                                            class="form-control form-control-sm mx-auto"
                                                            value="{{ $details['quantity'] }}" min="1"
                                                            onchange="this.form.submit()" style="width: 70px;">
                                                    </form>
                                                </td>
                                                <td class="font-weight-bold text-primary">
                                                    {{ number_format($details['prix'] * $details['quantity'], 0, ',', ' ') }}
                                                    FCFA</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="p-5 text-center">
                                                <p>Votre panier est vide.</p>
                                                <a href="{{ route('produit') }}" class="btn btn-primary btn-sm">Continuer
                                                    mes achats</a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-lg-4">
                    <div class="cart-total-area mb-30 p-4 bg-white border shadow-sm" style="border-radius: 15px;">
                        <h5 class="mb-4">Finaliser ma commande</h5>

                        <form action="{{ route('commande.store') }}" method="POST" id="orderForm">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold small">Nom Complet</label>
                                <input type="text" name="nom_client" class="form-control"
                                    value="{{ old(
                         'nom_client',
                                        auth()->check() ? Str::limit(auth()->user()->name . ' ' . auth()->user()->surname, 30, '...') : '',
                                    ) }}"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold small">Adresse de livraison</label>
                                <input type="text" name="adresse" class="form-control"
                                    value="{{ old('adresse', auth()->check() ? auth()->user()->adresse : '') }}" required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="d-block font-weight-bold small">Téléphone (WhatsApp)</label>
                                <input type="tel" id="phone" name="phone_visible" class="form-control w-100"
                                    required>
                                <input type="hidden" name="telephone" id="telephone"
                                    value="{{ old('telephone', auth()->check() ? auth()->user()->telephone : '') }}">
                            </div>

                            <div class="bg-light p-3 mb-4 rounded border">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Total :</span>
                                    <h5 class="text-primary mb-0">{{ number_format($totalGeneral, 0, ',', ' ') }} FCFA</h5>
                                </div>
                            </div>

                            <button type="submit" id="btn-submit" class="btn btn-primary btn-lg w-100 font-weight-bold"
                                {{ $totalGeneral == 0 ? 'disabled' : '' }}>
                                CONFIRMER
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // 1. Initialisation Téléphone
            const phoneInput = document.querySelector("#phone");
            const hiddenPhoneInput = document.querySelector("#telephone");
            const iti = window.intlTelInput(phoneInput, {
                initialCountry: "ml",
                separateDialCode: true,
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });

            if (hiddenPhoneInput.value) {
                // setNumber va remplir le champ visuel et détecter le pays automatiquement
                iti.setNumber(hiddenPhoneInput.value);
            }

            // 2. Gestion de l'envoi
            const orderForm = document.querySelector("#orderForm");
            if (orderForm) {
                orderForm.addEventListener("submit", function(e) {
                    // If phone is invalid, prevent submission and show error
                    if (!iti.isValidNumber()) {
                        e.preventDefault();
                        Swal.fire('Erreur', 'Veuillez saisir un numéro de téléphone valide.', 'error');
                        return;
                    }

                    // Set the hidden input to the international number and
                    // allow the form to submit normally so HTML constraint
                    // validation (required on other fields) runs as expected.
                    hiddenPhoneInput.value = iti.getNumber();
                });
            }



        });
    </script>

    <style>
        .iti {
            display: block !important;
            width: 100% !important;
        }
    </style>
@endsection
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if (session('order_complete_animation'))

            // --- FONCTION POUR LES BALLONS/CONFETTIS ---
            var duration = 5 * 1000; // 5 secondes de fête
            var animationEnd = Date.now() + duration;
            var defaults = {
                startVelocity: 30,
                spread: 360,
                ticks: 60,
                zIndex: 9999
            };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            var interval = setInterval(function() {
                var timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                var particleCount = 50 * (timeLeft / duration);

                // Lancement de deux jets de confettis (gauche et droite)
                confetti(Object.assign({}, defaults, {
                    particleCount,
                    origin: {
                        x: randomInRange(0.1, 0.3),
                        y: Math.random() - 0.2
                    },
                    colors: ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff',
                        '#00ffff'
                    ]
                }));
                confetti(Object.assign({}, defaults, {
                    particleCount,
                    origin: {
                        x: randomInRange(0.7, 0.9),
                        y: Math.random() - 0.2
                    },
                    colors: ['#ffbb33', '#4285F4', '#EA4335', '#34A853']
                }));
            }, 250);

            // --- FENÊTRE SWEETALERT2 AVEC EMOJIS ---
            Swal.fire({
                title: 'COMMANDE VALIDÉE ! ',
                html: `
                <div style="font-size: 1.1rem; line-height: 1.6;">
                    <p>Bravo ! Votre commande a été enregistrée avec succès.</p>
                    <p><strong>Prochaine étape :</strong> Un conseiller va vous <strong>appeler immédiatement</strong> pour confirmer votre commande et convenir du <strong>moyen de paiement</strong>.</p>
                    <p class="small text-muted mt-3">
                        <i class="icofont-info-circle"></i> Le paiement s'effectue à la livraison ou via transfert après l'appel de confirmation.
                    </p>
                </div>
            `,
                icon: 'success',
                iconColor: '#28a745',
                background: '#fff url(https://www.transparenttextures.com/patterns/cubes.png)',
                showConfirmButton: true,
                confirmButtonText: 'Continuer mes achats',
                confirmButtonColor: '#007bff',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('produit') }}";
                }
            });
        @endif
    });
</script>
