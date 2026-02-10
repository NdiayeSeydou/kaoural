<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Support\Str;
use App\Models\StockHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FournisseurController extends Controller
{
    // Méthode pour afficher la liste des fournisseurs

    public function fournisseur()
    {

        $fournisseurs = Fournisseur::with('categorie')->get();

        $categories = Categorie::all();

        return view('admin.interface.fournisseur.listes', compact('fournisseurs', 'categories'));
    }

    // Méthode pour afficher le formulaire de création d'un nouveau fournisseur
    public function addFournisseur()
    {

        $categories = Categorie::all();

        return view('admin.interface.fournisseur.create', compact('categories'));
    }


    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|string|max:255',

            'adresse' => 'nullable|string|max:255',

            'categorie_id' => 'required|exists:categories,id',

            'telephone' => [

                'required',

                'regex:/^\+[1-9][0-9]{6,14}$/',

                'unique:fournisseurs,telephone'

            ],

        ]);


        Fournisseur::create([

            'name' => $request->name,

            'adresse' => $request->adresse,

            'categorie_id' => $request->categorie_id,

            'telephone' => $request->telephone,

            'public_id' => Str::random(10),


        ]);

        return redirect()->route('admin.fournisseur.index')->with('ajoutfourn', 'Nouveau fournisseur ajouté avec succès');
    }

    //modifier un fournisseur
    public function editFournisseur($public_id)
    {
        $fournisseur = Fournisseur::where('public_id', $public_id)->firstOrFail();

        $categories = Categorie::all();

        return view('admin.interface.fournisseur.edit', compact('fournisseur', 'categories'));
    }


    public function updateFournisseur(Request $request, $public_id)
    {
        $fournisseur = Fournisseur::where('public_id', $public_id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'telephone' => [
                'required',
                'regex:/^\+[1-9][0-9]{6,14}$/',
                'unique:fournisseurs,telephone,' . $fournisseur->id
            ],
        ]);

        $fournisseur->update([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'categorie_id' => $request->categorie_id,
            'telephone' => $request->telephone,
        ]);

        return redirect()
            ->route('admin.fournisseur.index')
            ->with('fourjour', 'Fournisseur mis à jour avec succès');
    }


    //methode pour afficher les détails d'un fournisseur spécifique
    public function detailsFournisseur($public_id)
    {
        $fournisseur = Fournisseur::where('public_id', $public_id)
            ->with('categorie')
            ->firstOrFail();

        $historiques = StockHistory::with('stock')
            ->where('fournisseur_id', $fournisseur->id)
            ->orderBy('date', 'desc')
            ->paginate(10);

        // Statistiques
        $totalProduits = $historiques->pluck('stock_id')->unique()->count();

        $quantiteTotale = StockHistory::where('fournisseur_id', $fournisseur->id)
            ->sum('quantite_entree');

        $derniereLivraison = StockHistory::where('fournisseur_id', $fournisseur->id)
            ->orderBy('date', 'desc')
            ->value('date');

        return view(
            'superadmin.interface.fournisseur.show',
            compact(
                'fournisseur',
                'historiques',
                'totalProduits',
                'quantiteTotale',
                'derniereLivraison'
            )
        );
    }

    //modifier une entrée 
    public function editEntry()
    {
        return view('admin.interface.fournisseur.edit_entry');
    }


    public function deleteFournisseur($public_id)
    {
        $fournisseur = Fournisseur::where('public_id', $public_id)->firstOrFail();

        // Vérifier si le fournisseur a des stocks associés ou des historiques de stocks
        $stockCount = $fournisseur->stockHistories()->count();
        
        if ($stockCount > 0) {
            // Retour avec message d'erreur
            return redirect()
                ->route('admin.fournisseur.index')
                ->with('error', "Impossible de supprimer ce fournisseur : il est associé à $stockCount stock(s).");
        }

        // Suppression
        $fournisseur->delete();

        // Message de succès
        return redirect()
            ->route('admin.fournisseur.index')
            ->with('fourdel', 'Fournisseur supprimé avec succès.');
    }
}
