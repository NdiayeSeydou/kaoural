<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PanierController extends Controller
{
    public function panier()
    {

        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {

            $total += $item['prix'] * $item['quantity'];
        }

        return view('landing.panier', compact('cart'));
    }

    public function add(Request $request, $public_id)
    {

        $request->validate([

            'quantity' => 'required|integer|min:1',

        ]);

        $produit = Produit::where('public_id', $public_id)->firstOrFail();

        $cart = session()->get('cart', []);

        if (isset($cart[$public_id])) {

            $cart[$public_id]['quantity'] += $request->quantity;

        } else {

            $cart[$public_id] = [

                'designation' => $produit->designation,

                'quantity' => (int) $request->quantity,

                'prix' => $produit->prix_unitaire,

                'image' => $produit->image,

                'public_id' => $produit->public_id,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('cartadd', 'Produit ajouté au panier !');
    }

    public function update(Request $request)
    {
        if ($request->public_id && $request->quantity) {

            $cart = session()->get('cart');

            if (isset($cart[$request->public_id])) {

                $cart[$request->public_id]['quantity'] = (int) $request->quantity;

                session()->put('cart', $cart);

                return redirect()->back()->with('cartupd', 'Panier mis à jour');
            }
        }
    }

    public function remove(Request $request)
    {
        if ($request->public_id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->public_id])) {

                unset($cart[$request->public_id]);

                session()->put('cart', $cart);
            }

            return redirect()->back()->with('cartdel', 'Produit retiré du panier');
        }
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->back()->with('cardelall', 'Le panier a été vidé');
    }

    public function store(Request $request)
    {

        if ($request->has('telephone')) {

            $request->merge(['telephone' => str_replace(' ', '', $request->telephone)]);
        }

        $request->validate([

            'nom_client' => 'required|string|min:3|max:255',

            'adresse' => 'required|string',

            'telephone' => ['required', 'regex:/^\+[1-9][0-9]{6,14}$/'],

        ], [

            'nom_client.required' => 'Le nom est obligatoire.',

            'telephone.required' => 'Le numéro de téléphone est obligatoire.',

            'telephone.regex' => 'Le format doit être au format international',

            'adresse.required' => 'L’adresse est obligatoire.',
        ]);

        $cart = session()->get('cart');

        if (! $cart || count($cart) === 0) {

            return redirect()->back()->with('errorpani', 'Votre panier est vide.');
        }

        DB::beginTransaction();

        try {

            $total = array_sum(array_map(fn ($item) => $item['prix'] * $item['quantity'], $cart));

            $commande = Commande::create([

                'public_id' => 'CMD-'.strtoupper(Str::random(10)),

                'user_id' => Auth::id(),

                'nom_client' => $request->nom_client,

                'telephone' => $request->telephone,

                'adresse' => $request->adresse,

                'montant_total' => $total,

                'statut' => 'en_attente',
            ]);


            

           foreach ($cart as $idEnSession => $item) {
    // 1. On cherche le produit en base via son public_id
    $produit = Produit::where('public_id', $idEnSession)->first();

    // 2. On enregistre la ligne AVEC le produit_id
    $commande->lignes()->create([
        'produit_id'    => $produit ? $produit->id : null, // C'est CA qui permet de retrouver l'image !
        'designation'   => $item['designation'],
        'quantite'      => $item['quantity'],
        'prix_unitaire' => $item['prix'],
    ]);
}

            DB::commit();

            session()->forget('cart');

            return redirect()->route('panier')->with('order_complete_animation', true);

        } catch (\Exception $e) {

            DB::rollback();

            Log::error('Erreur commande : '.$e->getMessage());

            return redirect()->back()->withInput()->with('errorcom', 'Erreur technique : '.$e->getMessage());
        }
    }
}
