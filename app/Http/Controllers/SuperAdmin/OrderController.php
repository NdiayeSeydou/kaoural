<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function commande()
    {
        $commandes = Commande::with('lignes')->latest()->paginate(15);

        return view('superadmin.orders.index', compact('commandes'));
    }

    public function statusCommande()
    {
        $commandes = Commande::all();

        $groupes = [

            'en attente' => $commandes->where('statut', 'en attente'),

            'validee' => $commandes->where('statut', 'validee'),

            'en cours' => $commandes->where('statut', 'en cours'),

            'livree' => $commandes->where('statut', 'livree'),

            'annulee' => $commandes->where('statut', 'annulee'),
        ];

        return view('superadmin.orders.index', compact('groupes'));
    }

    public function edit($public_id)
    {
        $commande = Commande::where('public_id', $public_id)->firstOrFail();

        return view('superadmin.orders.edit', compact('commande'));
    }

    public function updateStatus(Request $request, $public_id)
    {
        $commande = Commande::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'statut' => 'required|in:en attente,validee,en cours,livree,annulee',
        ]);

        $commande->update(['statut' => $request->statut]);

        return redirect()->route('superadmin.order.index')->with('comupt', 'Statut de la commande mis à jour !');
    }

    public function destroy($public_id)
    {
        $commande = Commande::where('public_id', $public_id)->firstOrFail();

        $commande->delete();

        return back()->with('delcom', 'Commande supprimée avec succès.');
    }

    public function valider($public_id)
    {
        $commande = Commande::where('public_id', $public_id)->firstOrFail();

        $commande->update(['statut' => 'validee']);

        return back()->with('success', 'Commande validée avec succès !');
    }

    public function show($public_id)
    {
        $commande = Commande::with(['lignes.produit'])->where('public_id', $public_id)->firstOrFail();

        return view('superadmin.orders.show', compact('commande'));
    }

    public function status()
    {


        $commandes = Commande::all();

    $groupes = [

        'en attente' => $commandes->where('statut', 'en attente'),

        'validee'    => $commandes->where('statut', 'validee'),

        'en cours'   => $commandes->where('statut', 'en cours'),

        'livree'     => $commandes->where('statut', 'livree'),

        'annulee'    => $commandes->where('statut', 'annulee'),
    ];

        return view('superadmin.orders.status', compact("groupes"));
    }

    public function updateStatusAjax(Request $request)
{
    $request->validate([
        'public_id' => 'required|exists:commandes,public_id',
        'statut' => 'required|in:en attente,validee,en cours,livree,annulee',
    ]);

    $commande = \App\Models\Commande::where('public_id', $request->public_id)->firstOrFail();
    $commande->update(['statut' => $request->statut]);

    return response()->json(['success' => true]);
}
}
