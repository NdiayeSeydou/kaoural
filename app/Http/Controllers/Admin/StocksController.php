<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\StockEntry;
use App\Models\Product;

class StocksController extends Controller
{

    // Liste des stocks
    public function index()
    {
        $stocks = Stock::latest()->paginate(12);
        return view('admin.stocks.listes', compact('stocks'));
    }


    // Formulaire d’ajout
    public function create()
    {
        $stocks = Stock::all();
        return view('admin.stocks.add', compact('stocks'));
    }

    // voir un stock 
    public function show($encryptedId)
    {
        // Décrypter l'ID
        $id = Crypt::decrypt($encryptedId);

        // Stock principal
        $stock = Stock::findOrFail($id);

        // Quantité restante
        $qtyRemaining = $stock->quantite_entree - $stock->quantite_sortie;

        //Historique des entrées (relation)
        $entries = $stock->entries()
            ->orderBy('date', 'desc')
            ->get();

        // entrées sans date
        $noDateEntries = $entries->whereNull('date');

        return view('admin.stocks.show', compact(
            'stock',
            'qtyRemaining',
            'entries',
            'noDateEntries'
        ));
    }



    // Affiche toutes les entrées pour un produit à une date donnée (YYYY-MM-DD)
    public function historyByDate($encryptedId, $date)
    {
        $id = Crypt::decrypt($encryptedId);
        $stock = Stock::findOrFail($id);

        // Normaliser date
        $day = date('Y-m-d', strtotime($date));

        $entries = Stock::where('nom_produit', $stock->nom_produit)
            ->whereDate('date', $day)
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.stocks.show', compact('stock', 'entries', 'day'));
    }

    // Supprimer toutes les entrées pour un produit à une date donnée
    public function deleteEntriesByDate($encryptedId, $date)
    {
        $id = Crypt::decrypt($encryptedId);
        $stock = Stock::findOrFail($id);

        $day = date('Y-m-d', strtotime($date));

        // Supprimer toutes les lignes correspondant à ce produit et cette date
        Stock::where('nom_produit', $stock->nom_produit)
            ->whereDate('date', $day)
            ->delete();

        return redirect()->route('admin.stocks.show', Crypt::encrypt($stock->id))
            ->with('success', 'Entrées du ' . $day . ' supprimées.');
    }

    // Formulaire d'édition d'une entrée spécifique (historique)
    public function editEntry($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        // On récupère l'entrée avec le stock associé
        $entry = StockEntry::with('stock')->findOrFail($id);

        return view('admin.stocks.update_entry', compact('entry'));
    }


    // Mise à jour d'une entrée spécifique
    public function updateEntry(Request $request, $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        // Ici on récupère l'entrée spécifique
        $entry = Stock::findOrFail($id);

        $validated = $request->validate([
            'quantite_entree' => 'required|integer|min:0',
            'date' => 'nullable|date',
        ]);

        // Normaliser la date
        if ($request->filled('date')) {
            $validated['date'] = date('Y-m-d H:i:s', strtotime($request->input('date')));
        } else {
            $validated['date'] = $entry->date;
        }

        // Calcul de la différence avec l'ancienne quantité
        $ancienneQuantite = $entry->quantite_entree;
        $nouvelleQuantite = $validated['quantite_entree'];
        $difference = $nouvelleQuantite - $ancienneQuantite;

        // Mettre à jour le stock principal
        $stockPrincipal = Stock::where('nom_produit', $entry->nom_produit)
            ->orderBy('id', 'asc')
            ->first();

        if ($stockPrincipal) {
            $stockPrincipal->quantite_entree += $difference;
            $stockPrincipal->prix_total = $stockPrincipal->quantite_entree * $stockPrincipal->prix_unitaire;
            $stockPrincipal->save();
        }

        // Mettre à jour l'entrée
        $entry->update([
            'quantite_entree' => $nouvelleQuantite,
            'date' => $validated['date'],
            'prix_total' => $nouvelleQuantite * $entry->prix_unitaire, // si tu as prix_unitaire à l'entrée
        ]);

        return redirect()->route('admin.stocks.show', Crypt::encrypt($stockPrincipal->id))
            ->with('success', 'Entrée mise à jour et stock principal ajusté.');
    }
    


    //supprimé une entrée de stock
    public function deleteEntry($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $entry = Stock::findOrFail($id);

        $entry->delete();

        return back()->with('success', 'Entrée supprimée avec succès.');
    }


    //  Enregistrer un stock
    public function store(Request $request)
    {
        $request->validate([
            'nom_produit.*' => 'required|string',
            'quantite_entree.*' => 'required|integer|min:1',
            'prix_unitaire.*' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|max:2048',
            'date.*' => 'nullable|date',
        ]);

        $nomProduits = $request->nom_produit;
        $quantites = $request->quantite_entree;
        $prixUnitaires = $request->prix_unitaire;
        $images = $request->file('images');

        foreach ($nomProduits as $index => $nom) {
            $qty = (int) $quantites[$index];

            // Chercher un stock principal existant pour ce produit
            $existing = Stock::where('nom_produit', $nom)
                ->orderBy('id', 'asc')
                ->first();

            if ($existing) {
                // Si existe, incrémenter la quantité et mettre à jour le prix total
                $existing->quantite_entree += $qty;
                $existing->prix_total = $existing->quantite_entree * $existing->prix_unitaire;
                $existing->save();
            } else {
                $data = [
                    'nom_produit' => $nom,
                    'quantite_entree' => $qty,
                    'quantite_sortie' => 0,
                    'prix_unitaire' => $prixUnitaires[$index],
                    'alerte_stock' => 5,
                ];

                // Upload image si présente
                if (isset($images[$index]) && $images[$index]) {
                    $data['image'] = $images[$index]->store('stocks', 'public');
                }

                // Calcul prix total
                $data['prix_total'] = $data['quantite_entree'] * $data['prix_unitaire'];

                // date de l'entrée si fournie
                if (isset($request->date[$index]) && $request->date[$index]) {
                    $data['date'] = date('Y-m-d H:i:s', strtotime($request->date[$index]));
                }

                // Créer le stock
                Stock::create($data);
            }
        }

        return redirect()->route('admin.stocks.index')->with('success', 'Stocks enregistrés avec succès.');
    }

    // Formulaire d’édition
    public function edit($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $stock = Stock::findOrFail($id);

        return view('admin.stocks.update', compact('stock'));
    }

    //Mise à jour du stock
    public function update(Request $request, $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $stock = Stock::findOrFail($id);

        $data = $request->validate([
            'nom_produit' => 'required|string',
            'quantite_entree' => 'required|integer|min:0',
            'prix_unitaire' => 'required|numeric|min:0',
            'alerte_stock' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'date' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('stocks', 'public');
        }

        // gérer la date si fournie
        if ($request->filled('date')) {
            $data['date'] = date('Y-m-d H:i:s', strtotime($request->input('date')));
        }

        // Quantité sortie actuelle (non modifiable)
        $quantite_sortie = $stock->quantite_sortie;

        // Nouveau stock disponible
        $quantite_dispo = $data['quantite_entree'] - $quantite_sortie;

        if ($quantite_dispo < 0) {
            return back()->withErrors([
                'quantite_entree' => 'La quantité entrée ne peut pas être inférieure à la quantité déjà vendue.'
            ]);
        }

        $data['prix_total'] = $quantite_dispo * $data['prix_unitaire'];

        // Réinjecter la quantité sortie inchangée
        $data['quantite_sortie'] = $quantite_sortie;

        $stock->update($data);

        return redirect()->route('admin.stocks.index')
            ->with('success', 'Stock mis à jour.');
    }

    //  Supprimer un stock
    public function destroy($encryptedId)
    {

        $id = Crypt::decrypt($encryptedId);

        $stock = Stock::findOrFail($id);

        $stock->delete();

        return redirect()->route('admin.stocks.index')
            ->with('success', 'Stock supprimé avec succès.');
    }


    //Ajouter une quantité a un produit existant
    public function addQuantity(Request $request)
    {
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'quantite_entree' => 'required|integer|min:1',
            'date' => 'nullable|date',
        ]);

        $stock = Stock::findOrFail($request->stock_id);

        // Enregistrer l’historique
        StockEntry::create([
            'stock_id' => $stock->id,
            'quantite' => $request->quantite_entree,
            'date' => $request->date ?? now(),
        ]);

        // Mettre à jour le stock principal
        $stock->quantite_entree += $request->quantite_entree;
        $stock->prix_total = $stock->quantite_entree * $stock->prix_unitaire;
        $stock->save();

        return redirect()->route('admin.stocks.index', Crypt::encrypt($stock->id))
            ->with('success', 'Quantité ajoutée avec succès.');
    }


    // Prix total du stock disponible
    public function totalStockValue()
    {
        // Récupérer tous les produits sous forme groupée (par nom)
        $stocks = Stock::select('nom_produit')
            ->groupBy('nom_produit')
            ->get();

        $total = 0;

        foreach ($stocks as $item) {
            // Récupérer le stock principal (la première entrée)
            $principal = Stock::where('nom_produit', $item->nom_produit)
                ->orderBy('id', 'asc')
                ->first();

            if ($principal) {
                // Calcul de la quantité disponible réelle
                $qtyAvailable = $principal->quantite_entree - $principal->quantite_sortie;

                if ($qtyAvailable > 0) {
                    // Ajouter au total général
                    $total += $qtyAvailable * $principal->prix_unitaire;
                }
            }
        }

        return $total;
    }
    
}
