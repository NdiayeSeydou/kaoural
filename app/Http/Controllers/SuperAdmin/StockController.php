<?php

namespace App\Http\Controllers\SuperAdmin;

use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\StockHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Helpers\Base62;
use Illuminate\Support\Str;


class StockController extends Controller
{



    //liste des stocks
    public function stock()
    {
        $stocksBoutique = Stock::with(['categorie', 'ventes'])->where('emplacement', 'boutique')->orderBy('code_article', 'asc')->paginate(12, ['*'], 'boutiquePage');

        $stocksMagasin = Stock::with(['categorie', 'ventes'])->where('emplacement', 'magasin')->orderBy('code_article', 'asc')->paginate(12, ['*'], 'magasinPage');
    
        $categories = Categorie::all();

        $fournisseurs = Fournisseur::all(); 

        return view('superadmin.interface.stock.listes', compact('stocksBoutique', 'categories', 'fournisseurs', 'stocksMagasin'));
    }






    public function store(Request $request)
    {
        if ($request->type_form === 'nouveau') {

            return $this->storeNouveauProduit($request);
        }

        if ($request->type_form === 'existant') {

            return $this->storeProduitExistant($request);
        }

        return back()->with('error', 'Type de formulaire invalide');
    }




    //ajout d'un nouveau produit 

    public function storeNouveauProduit(Request $request)
    {
        $request->validate([

            'designation' => 'required|string|max:255',

            'categorie_id'    => 'required|exists:categories,id',

            'emplacement' => 'required|in:boutique,magasin',

            'stock_initial' => 'required|numeric|min:0',

            'prix_unitaire' => 'required|numeric|min:0',

            'fournisseur_id'  => 'required|exists:fournisseurs,id',

            'date' => 'required|date',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $stock_initial = floatval(str_replace(',', '.', $request->stock_initial));

        $prix_unitaire = floatval(str_replace(',', '.', $request->prix_unitaire));

        $lastStock = Stock::latest('id')->first();

        $nextId = $lastStock ? $lastStock->id + 1 : 1;

        $codeArticle = str_pad($nextId, 6, '0', STR_PAD_LEFT);

        $quantite_entree = 0;

        $quantite_sortie = 0;

        $quantite_restante = $stock_initial + $quantite_entree - $quantite_sortie;

        
        $prixTotal = $quantite_entree * $request->prix_unitaire;

   
        if ($quantite_restante == 0) {

            $status = 'rupture';
        } elseif ($quantite_restante <= 5) {

            $status = 'baisse';
        } else {


            $status = 'disponible';
        }


        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('stocks', 'public');
        }




        Stock::create([

            'date' => $request->date,

            'code_article' => $codeArticle,

            'designation' => $request->designation,

            'categorie_id' => $request->categorie_id,

            'emplacement' => $request->emplacement,

            'stock_initial' => $stock_initial,

            'quantite_entree' => $quantite_entree,

            'quantite_sortie' => $quantite_sortie,

            'quantite_restante' => $quantite_restante,

            'prix_unitaire' => $request->prix_unitaire,

            'prix_total' => $prixTotal,

            'fournisseur_id' => $request->fournisseur_id,

            'status' => $status,

            'image' => $imagePath,

            'public_id' => Str::random(10),

        ]);




        return redirect()->route('superadmin.stock.index')->with('stockajoutnew', 'Nouveau produit ajouté avec succès');
    }





    //ajout d'un ancien stock
    public function storeProduitExistant(Request $request)
    {
        $request->validate([

            'code_article'   => 'required|exists:stocks,code_article',

            'quantite'       => 'required|numeric|min:0.01',

            'fournisseur_id' => 'required|exists:fournisseurs,public_id',

            'date'           => 'required|date',

        ]);


      $quantite = floatval(str_replace(',', '.', $request->quantite));


        $stock = Stock::where('code_article', $request->code_article)->firstOrFail();

        $stock->quantite_entree += $quantite;

        $stock->quantite_restante += $quantite;

        if ($stock->quantite_restante == 0) {

            $stock->status = 'rupture';

        } elseif ($stock->quantite_restante <= 5) {

            $stock->status = 'baisse';
            
        } else {

            $stock->status = 'disponible';
        }

        $stock->save();


        $fournisseur = Fournisseur::where('public_id', $request->fournisseur_id)->firstOrFail();


        StockHistory::create([

            'stock_id' => $stock->id,

            'fournisseur_id' => $fournisseur->id,


            'quantite_entree' => $quantite,

            'emplacement' => $stock->emplacement,

            'date' => $request->date,

            'public_id' => Str::random(10),
        ]);

        return redirect()->route('superadmin.stock.index')->with('ajoutstockaancien', 'Stock mis à jour avec succès');
    }







    //rechercher un stock 
    public function searchStock(Request $request)
    {
        $q = $request->get('q') ?? $request->get('term');


        $stocks = Stock::where('designation', 'LIKE', "%{$q}%")

            ->orWhere('code_article', 'LIKE', "%{$q}%")
            ->limit(10)
            ->get();

        return response()->json(

            $stocks->map(function ($stock) {

                return [
                    'id' => $stock->id,

                    'text' => $stock->designation . ' — ' . $stock->code_article,

                    'designation' => $stock->designation,

                    'code_article' => $stock->code_article,
                ];
            })
        );
    }




    //détails d'un stock
    public function detailsStock($public_id)
    {


        $stock = Stock::with(['categorie', 'fournisseur'])->where('public_id', $public_id)->firstOrFail();



        Carbon::setLocale('fr');

        $stock->date_formatee = Carbon::parse($stock->date)->translatedFormat('l d F Y');

        $histories = $stock->histories()->with('fournisseur')->orderBy('date', 'desc')->get();

        foreach ($histories as $history) {

            $history->date_formatee = Carbon::parse($history->date)->translatedFormat('l d F Y');
        }

        $histories = $stock->histories()->with('fournisseur')->orderBy('date', 'desc')->paginate(5, ['*'], 'histories');

        return view('superadmin.interface.stock.detailsStock', compact('stock', 'histories'));
    }





    //ajouter un stock
    public function addStock()
    {

        $categories = Categorie::all();

        $fournisseurs = Fournisseur::all();
        return view('superadmin.interface.stock.create', compact('categories', 'fournisseurs'));
    }



    //modifier un stock
    public function editStock($public_id)
    {


        $stock = Stock::where('public_id', $public_id)->firstOrFail();

        $categories = Categorie::all();

        $fournisseurs = Fournisseur::all();

        return view('superadmin.interface.stock.edit', compact('stock', 'categories', 'fournisseurs'));
    }




    public function updateStock(Request $request, $public_id)
    {
        $stock = Stock::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'designation'   => 'required|string|max:255',

            'categorie_id'  => 'required|exists:categories,public_id',

            'emplacement'   => 'required|in:boutique,magasin',

            'quantite'      => 'required|numeric|min:0',

            'prix_unitaire' => 'required|numeric|min:0',

            'fournisseur_id' => 'required|exists:fournisseurs,public_id',

            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);



        $quantite = floatval(str_replace(',', '.', $request->quantite));

        $prix_unitaire = floatval(str_replace(',', '.', $request->prix_unitaire));



        $categorie = Categorie::where('public_id', $request->categorie_id)->firstOrFail();

        $fournisseur = Fournisseur::where('public_id', $request->fournisseur_id)->firstOrFail();


        $stock->designation = $request->designation;

        $stock->categorie_id = $categorie->id;

        $stock->emplacement = $request->emplacement;

        $stock->stock_initial = $quantite;

        $stock->quantite_restante = $quantite;

        $stock->prix_unitaire = $prix_unitaire;

        $stock->prix_total = $quantite * $prix_unitaire;

        $stock->fournisseur_id = $fournisseur->id;


        if ($request->hasFile('image')) {

            $stock->image = $request->file('image')->store('stocks', 'public');
        }


        if ($stock->quantite_restante == 0) {

            $stock->status = 'rupture';
        } elseif ($stock->quantite_restante <= 5) {

            $stock->status = 'baisse';
        } else {

            $stock->status = 'disponible';
        }

        $stock->save();

        return redirect()->route('superadmin.stock.index')->with('stockupdt', 'Stock mis à jour avec succès');
    }






    public function destroyStock($public_id)
    {


        $stock = Stock::where('public_id', $public_id)->firstOrFail();


        if ($stock->image && Storage::disk('public')->exists($stock->image)) {


            Storage::disk('public')->delete($stock->image);
        }


        Stock::destroy($stock->id);


        return redirect()->route('superadmin.stock.index')->with('stockdel', 'Stock supprimé avec succès');
    }




    public function historyByDate($stockId)
    {
        $stock = Stock::findOrFail($stockId);


        $histories = $stock->histories()->with('fournisseur')->orderBy('date', 'desc')->get();

        return view('superadmin.interface.stock.detailsStock', compact('stock', 'histories'));
    }



    // Afficher le formulaire pour éditer un historique
    public function editHistory($public_id)
    {
        $history = StockHistory::with(['fournisseur', 'stock'])->where('public_id', $public_id)->firstOrFail();


        $fournisseurs = Fournisseur::all();

        return view('superadmin.interface.stock.editHistory', compact('history', 'fournisseurs'));
    }

    // Mettre à jour l'historique
    public function updateHistory(Request $request, $historyPublicId)
    {


        $history = StockHistory::where('public_id', $historyPublicId)->firstOrFail();

        $request->validate([

            'date' => 'required|date',

            'quantite_entree' => 'required|numeric|min:0.01',

            'emplacement' => 'required|in:boutique,magasin',

            'fournisseur_id' => 'required|exists:fournisseurs,public_id',
        ]);



        $quantite_entree = floatval(str_replace(',', '.', $request->quantite_entree));



        $fournisseur = Fournisseur::where('public_id', $request->fournisseur_id)->firstOrFail();

        $history->update([

            'date' => $request->date,

            'quantite_entree' => $quantite_entree,

            'emplacement' => $request->emplacement,

            'fournisseur_id' => $fournisseur->id,
        ]);


        $stock = $history->stock;

        $stock->quantite_entree = $stock->histories()->sum('quantite_entree');

        $stock->quantite_restante = $stock->stock_initial + $stock->quantite_entree - $stock->quantite_sortie;


        if ($stock->quantite_restante == 0) {

            $stock->status = 'rupture';
        } elseif ($stock->quantite_restante <= 5) {

            $stock->status = 'baisse';
        } else {

            $stock->status = 'disponible';
        }

        $stock->save();

        return redirect()->route('superadmin.stock.show', $stock->public_id)->with('edithistory', 'Historique mis à jour avec succès');
    }





    public function destroyHistory($historyPublicId)
    {
        $history = StockHistory::with('stock')->where('public_id', $historyPublicId)->firstOrFail();

        $stock = $history->stock;

        try {
            DB::transaction(function () use ($history, $stock) {


                StockHistory::destroy($history->id);

                if ($stock) {

                    $stock->quantite_entree = $stock->histories()->sum('quantite_entree');

                    $stock->quantite_restante = $stock->stock_initial + $stock->quantite_entree - $stock->quantite_sortie;

                    if ($stock->quantite_restante == 0) {

                        $stock->status = 'rupture';
                    } elseif ($stock->quantite_restante <= 5) {

                        $stock->status = 'baisse';
                    } else {

                        $stock->status = 'disponible';
                    }

                    $stock->save();
                }
            });
        } catch (\Exception $e) {

            return back()->with('error', 'Impossible de supprimer l\'entrée d\'historique.');
        }

        $message = 'Entrée d\'historique supprimée avec succès';

        if ($stock) {
            return redirect()->route('superadmin.stock.show', $stock->public_id)->with('historydel', $message);
        }

        return redirect()->route('superadmin.stock.index')->with('historydel', $message);
    }
}
