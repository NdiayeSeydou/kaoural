<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quincaillerie;
use Illuminate\Support\Str;
use App\Models\RetraitStock;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use Illuminate\Support\Facades\Storage;

class QuincaillerieController extends Controller
{
    //listes des quincailleries
    public function quincaillerie()
    {

        $quincailleries = Quincaillerie::withCount('retraits')->latest()->paginate(15);

        return view('admin.interface.quincaillerie.listes', compact('quincailleries'));
    }

    //détails d'une quincaillerie
    public function detailsQuincaillerie($public_id)
    {

        $quincaillerie = Quincaillerie::where('public_id', $public_id)->with(['retraits' => fn($q) =>

        $q->orderBy('date', 'desc')])->firstOrFail();


        $retraitsParJour = $quincaillerie->retraits->groupBy(function ($item) {

            return $item->date->format('Y-m-d');
        });


        return view('admin.interface.quincaillerie.detailsQuincaillerie', compact('quincaillerie', 'retraitsParJour'));
    }


    //ajouter une quincaillerie
    public function addQuincaillerie()
    {
        return view('admin.interface.quincaillerie.addQuincaillerie');
    }



    public function store(Request $request)
    {
        $request->validate(
            [

                'nom'       => 'required|string',

                'telephone' => 'nullable|string|unique:quincailleries,telephone',

                'adresse'   => 'nullable|string',
            ],
            [

                'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé par une autre quincaillerie.',

                'nom.required'     => 'Le nom de la quincaillerie est obligatoire.',
            ]
        );

        Quincaillerie::create([

            'public_id' => Str::random(10),

            'nom'       => $request->nom,

            'telephone' => $request->telephone,

            'adresse'   => $request->adresse,

        ]);

        return redirect()->route('admin.quincaillerie.index')->with('quinajout', 'Quincaillerie ajoutée avec succès');
    }



    //modifier une quincaillerie
    public function editQuincaillerie($public_id)
    {

        $quincaillerie = Quincaillerie::where('public_id', $public_id)->firstOrFail();

        return view('admin.interface.quincaillerie.editQuincaillerie', compact('quincaillerie'));
    }


    public function update(Request $request, $public_id)
    {
        $quincaillerie = Quincaillerie::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'nom' => 'required|string',

            'telephone' => 'nullable|string|unique:quincailleries,telephone,' . $quincaillerie->id,

            'adresse' => 'nullable|string',
        ]);

        $quincaillerie->update([

            'nom'       => $request->nom,

            'telephone' => $request->telephone,

            'adresse'   => $request->adresse,
        ]);

        return redirect()->route('admin.quincaillerie.index')->with('quinmodif', 'Quincaillerie mise à jour');
    }



    public function destroy($public_id)
    {
        $quincaillerie = Quincaillerie::where('public_id', $public_id)->firstOrFail();

        $quincaillerie->delete();

        return back()->with('quindel', 'Quincaillerie supprimée');
    }


    //retrait de produit 
    public function retraitProduit()
    {
        return view('admin.interface.quincaillerie.retrait');
    }



    public function addretrait($public_id)
    {
        $quincaillerie = Quincaillerie::where('public_id', $public_id)->firstOrFail();

        $stocks = Stock::where('quantite_restante', '>', 0)->get();

        return view(
            'admin.interface.quincaillerie.retrait',
            compact('quincaillerie', 'stocks')
        );
    }



    public function ajoutstore(Request $request, $public_id)
    {
        $quincaillerie = Quincaillerie::where('public_id', $public_id)->firstOrFail();

        $request->validate(
            [
                'date' => 'required|date',

                'status' => 'required|in:impayée,payée,bon,sans bon',

                'produits' => 'required|array|min:1',

                'produits.*.stock_public_id' => 'required|exists:stocks,public_id',

                'produits.*.quantite_sortie' => [
                    'required',
                    'regex:/^\d+([.,]\d+)?$/'
                ],

                'produits.*.prix_unitaire' => 'nullable|numeric|min:0',
            ],
            [

                'produits.*.quantite_sortie.required' => 'Ce champ est obligatoire',

                'produits.*.quantite_sortie.regex' => 'La quantité doit être un nombre valide',

                'produits.*.stock_public_id.required' => 'Veuillez sélectionner un produit',

                'produits.*.stock_public_id.exists' => 'Le produit sélectionné est invalide',

                'date.required' => 'La date est obligatoire',

                'status.required' => 'Le statut est obligatoire',
            ]
        );


        foreach ($request->produits as $index => $ligne) {

            $stock = Stock::where('public_id', $ligne['stock_public_id'])->firstOrFail();


            $quantite_sortie = floatval(str_replace(',', '.', $ligne['quantite_sortie']));

            if ($quantite_sortie <= 0) {

                return back()->withErrors([

                    "produits.$index.quantite_sortie" => "La quantité doit être supérieure à 0 pour {$stock->designation}"

                ])->withInput();
            }

            if ($quantite_sortie > $stock->quantite_restante) {

                return back()->withErrors([

                    "produits.$index.quantite_sortie" => "Stock insuffisant pour {$stock->designation}"

                ])->withInput();
            }

            $quantite_restante = $stock->quantite_restante - $quantite_sortie;

            $prix_unitaire = $ligne['prix_unitaire'] ?? $stock->prix_unitaire ?? 0;

            $prix_total = $prix_unitaire * $quantite_sortie;

            RetraitStock::create([

                'public_id' => Str::random(10),

                'quincaillerie_id' => $quincaillerie->id,

                'stock_public_id' => $stock->public_id,

                'designation' => $stock->designation,

                'code_article' => $stock->code_article,

                'image' => $stock->image,

                'categorie_id' => $stock->categorie_id,

                'stock_initial' => $stock->stock_initial,

                'quantite_sortie' => $quantite_sortie,

                'quantite_restante' => $quantite_restante,

                'fournisseur_id' => $stock->fournisseur_id,

                'emplacement' => $stock->emplacement,

                'status' => $request->status,

                'prix_unitaire' => $prix_unitaire,

                'prix_total' => $prix_total,

                'date' => $request->date,
            ]);


            $stock->update([

                'quantite_sortie' => $stock->retraits()->sum('quantite_sortie'),

                'quantite_restante' => $quantite_restante,
            ]);
        }

        return redirect()->route('admin.quincaillerie.show', $quincaillerie->public_id)->with('retraitadd', 'Retrait ajouté avec succès');
    }




    //modifier un retrait 
    public function editRetrait($public_id)
    {


        $retrait = RetraitStock::where('public_id', $public_id)->firstOrFail();

        return view('admin.interface.quincaillerie.edit_retrait', compact('retrait'));
    }

    public function updateRetrait(Request $request, $public_id)
    {
        $retrait = RetraitStock::where('public_id', $public_id)->firstOrFail();

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

                'quantite_sortie' => 'Stock insuffisant pour ' . $stock->designation

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


        $quincaillerie = $retrait->quincaillerie;


        return redirect()->route('admin.quincaillerie.show', $quincaillerie->public_id)->with('modifprod', 'Retrait mis à jour avec succès');
    }



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
                    'id' => $stock->public_id,
                    'text' => $stock->designation . ' — ' . $stock->code_article,
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
        $retrait = RetraitStock::where('public_id', $public_id)->firstOrFail();

     
        $stock = Stock::where('public_id', $retrait->stock_public_id)->first();

        if ($stock) {
            
            $stock->quantite_restante += $retrait->quantite_sortie;

           
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

    
            $imageStillUsed = RetraitStock::where('image', $imagePath)
                ->where('id', '!=', $retrait->id)
                ->exists();

          
            if (!$imageStillUsed && Storage::disk('public')->exists($imagePath)) {

                Storage::disk('public')->delete($imagePath);
            }
        }
  
        $retrait->delete();

        return redirect()->route('admin.quincaillerie.show', $retrait->quincaillerie->public_id)->with('deleteretrait', 'Retrait supprimé avec succès.');
    }
    
}
