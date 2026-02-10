<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Creance;
use App\Models\RetraisCreance;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreanceController extends Controller
{
   
    public function creances()
    {
        $creances = Creance::with('retraits')->withCount('retraits')->latest()->paginate(15);

        $totalCreances = $creances->sum(fn ($c) => $c->reste_a_payer);

        return view('admin.interface.creance.listes', compact('creances', 'totalCreances'));
    }

    
    public function detailsClients($public_id)
    {
        $creance = Creance::where('public_id', $public_id)->firstOrFail();

       
        $retraitsPagine = $creance->retraits()->orderBy('date', 'desc')->paginate(10);

        
        $retraitsParJour = $retraitsPagine->getCollection()->groupBy(function ($item) {
            return $item->date->format('Y-m-d');
        });

        
        $retraitsPagine->setCollection($retraitsParJour);

        $creance->total_du = $creance->retraits()->where('status', 'impayée')->sum('prix_total');

        return view('admin.interface.creance.show', [

            'creance' => $creance,

            'retraitsParJour' => $retraitsPagine, 
        ]);
    }

    // ajouter une quincaillerie
    public function addClient()
    {
        return view('admin.interface.creance.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [

                'nom' => 'required|string',

                'telephone' => 'nullable|string|unique:creances,telephone',

                'adresse' => 'nullable|string',
            ],
            [

                'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé par un autre créancier.',

                'nom.required' => 'Le nom du créancier est obligatoire.',
            ]
        );

        Creance::create([

            'public_id' => Str::random(10),

            'nom' => $request->nom,

            'telephone' => $request->telephone,

            'adresse' => $request->adresse,

        ]);

        return redirect()->route('admin.creance.index')->with('creanceajout', 'Créancier ajoutée avec succès');
    }

    // modifier une quincaillerie
    public function editCreance($public_id)
    {

        $creance = Creance::where('public_id', $public_id)->firstOrFail();

        return view('admin.interface.creance.edit', compact('creance'));
    }

    public function update(Request $request, $public_id)
    {
        $creance = Creance::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'nom' => 'required|string',

            'telephone' => 'nullable|string|unique:creances,telephone,'.$creance->id,

            'adresse' => 'nullable|string',
        ]);

        $creance->update([

            'nom' => $request->nom,

            'telephone' => $request->telephone,

            'adresse' => $request->adresse,
        ]);

        return redirect()->route('admin.creance.index')->with('creancemodif', 'Créance mise à jour');
    }

    public function destroy($public_id)
    {
        $creance = Creance::where('public_id', $public_id)->firstOrFail();

        $creance->delete();

        return back()->with('creancedel', 'Créancier supprimé avec succès');
    }

    // retrait de produit
    public function retraitProduit()
    {
        return view('admin.interface.creance.retrait');
    }

    public function addretrait($public_id)
    {
        $creance = Creance::where('public_id', $public_id)->firstOrFail();

        $stocks = Stock::where('quantite_restante', '>', 0)->get();

        return view('admin.interface.creance.retrait',   compact('creance', 'stocks'));
    }

    public function ajoutstore(Request $request, $public_id)
    {
        $creance = Creance::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'date' => 'required|date',

            'status' => 'required|in:impayée,payée',

            'produits' => 'required|array|min:1',

            'produits.*.stock_public_id' => 'required|exists:stocks,public_id',

            'produits.*.quantite_sortie' => 'required|numeric|min:0.01',
        ]);

        foreach ($request->produits as $ligne) {

            $stock = Stock::where('public_id', $ligne['stock_public_id'])->firstOrFail();

            $quantite_sortie = floatval($ligne['quantite_sortie']);

     
            if ($quantite_sortie > $stock->quantite_restante) {

                return back()->withErrors(['stockerror' => "Stock insuffisant pour {$stock->designation}"])->withInput();
            }

            $quantite_restante_finale = $stock->quantite_restante - $quantite_sortie;

            $prix_unitaire = $ligne['prix_unitaire'] ?? $stock->prix_vente ?? 0;

          
            RetraisCreance::create([
                
                'public_id' => Str::random(10),

                'creance_id' => $creance->id,

                'stock_public_id' => $stock->public_id,

                'designation' => $stock->designation,

                'code_article' => $stock->code_article,

                'image' => $stock->image,

                'categorie_id' => $stock->categorie_id,

                'stock_initial' => $stock->quantite_restante, 

                'quantite_sortie' => $quantite_sortie,

                'quantite_restante' => $quantite_restante_finale,

                'fournisseur_id' => $stock->fournisseur_id,

                'emplacement' => $stock->emplacement,

                'status' => $request->status,

                'prix_unitaire' => $prix_unitaire,

                'prix_total' => $prix_unitaire * $quantite_sortie,

                'date' => $request->date,
            ]);

           
            $stock->update([

                'quantite_sortie' => $stock->quantite_sortie + $quantite_sortie,

                'quantite_restante' => $quantite_restante_finale,
            ]);
        }

        return redirect()->route('admin.creance.show', $creance->public_id)->with('retraitadd', 'Le retrait sur créance a été effectué et le stock mis à jour.');
    }


    public function editRetrait($public_id)
    {

        $retrait = RetraisCreance::where('public_id', $public_id)->firstOrFail();

        return view('admin.interface.creance.edit_retrait', compact('retrait'));
    }

    public function updateRetrait(Request $request, $public_id)
    {
        // 1. On trouve le retrait avec sa créance parente
        $retrait = RetraisCreance::where('public_id', $public_id)->firstOrFail();

        // On stocke le public_id de la créance pour être sûr de l'avoir à la fin
        $creance_public_id = $retrait->creance->public_id;

        $request->validate([

            'quantite_sortie' => ['required', 'numeric', 'min:0.01'],

            'prix_unitaire' => ['nullable', 'numeric', 'min:0'],

            'designation' => ['required', 'string', 'max:255'],

            'status' => ['required', 'string', 'in:bon,sans bon,impayée,payée'],
        ]);

        $stock = Stock::where('public_id', $retrait->stock_public_id)->firstOrFail();

        $ancienne_quantite = $retrait->quantite_sortie;

        $nouvelle_quantite = floatval($request->quantite_sortie);

        $diff = $nouvelle_quantite - $ancienne_quantite;

        if ($diff > $stock->quantite_restante) {

            return back()->withErrors([

                'quantite_sortie' => 'Stock insuffisant. Disponible : '.($stock->quantite_restante + $ancienne_quantite),

            ])->withInput();
        }


        $retrait->update([

            'quantite_sortie' => $nouvelle_quantite,

            'prix_unitaire' => $request->prix_unitaire ?? $stock->prix_unitaire,

            'prix_total' => ($request->prix_unitaire ?? $stock->prix_unitaire) * $nouvelle_quantite,

            'designation' => $request->designation,

            'status' => $request->status,
        ]);

        $stock->quantite_sortie += $diff;

        $stock->quantite_restante -= $diff;

  
        if ($stock->quantite_restante == 0) {

            $stock->status = 'rupture';

        } elseif ($stock->quantite_restante <= 5) {

            $stock->status = 'baisse';

        } else {

            $stock->status = 'disponible';
        }

        $stock->save();


        return redirect()->route('admin.creance.show', $creance_public_id)->with('modifprod', 'Retrait mis à jour avec succès');
    }

    public function searchStock(Request $request)
    {
        $q = $request->get('q') ?? $request->get('term');

        $stocks = Stock::where('designation', 'LIKE', "%{$q}%")->orWhere('code_article', 'LIKE', "%{$q}%")->limit(10)->get();

        return response()->json(

            $stocks->map(function ($stock) {

                return [

                    'id' => $stock->public_id,

                    'text' => $stock->designation.' — '.$stock->code_article,

                    'designation' => $stock->designation,

                    'code_article' => $stock->code_article,

                    'quantite_restante' => $stock->quantite_restante,
                ];
            })
        );
    }

    public function getDesignation(Request $request)
    {
        $code = $request->query('code_article');

        $stock = Stock::where('code_article', $code)->first();

        if ($stock) {
            return response()->json([

                'success' => true,

                'designation' => $stock->designation,
            ]);
        }

        return response()->json([

            'success' => false,

            'designation' => null,
        ]);
    }

    public function destroyRetrait($public_id)
    {
        $retrait = RetraisCreance::where('public_id', $public_id)->firstOrFail();

      
        $creance = $retrait->creance;

        $stock = Stock::where('public_id', $retrait->stock_public_id)->first();

        if ($stock) {
           
            $stock->quantite_restante += $retrait->quantite_sortie;

            $stock->quantite_sortie -= $retrait->quantite_sortie; 

            if ($stock->quantite_restante == 0) {

                $stock->status = 'rupture';

            } elseif ($stock->quantite_restante <= 5) {

                $stock->status = 'baisse';

            } else {

                $stock->status = 'disponible';
            }
            $stock->save();
        }

 
        if ($retrait->image) {

            $imagePath = $retrait->image;

            $imageStillUsed = RetraisCreance::where('image', $imagePath)->where('id', '!=', $retrait->id)->exists();

            if (! $imageStillUsed && Storage::disk('public')->exists($imagePath)) {

                Storage::disk('public')->delete($imagePath);
            }
        }

        $retrait->delete();

        return redirect()->route('admin.creance.show', $creance->public_id)->with('deleteretrait', 'Retrait supprimé avec succès.');
    }
}
