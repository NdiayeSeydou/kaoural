<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bon;
use App\Models\BonProduit;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class BonController extends Controller
{
    //liste des bons 
    public function bon()
    {

        $bons = Bon::orderBy('created_at', 'desc')->paginate(12, ['*'], 'categoriePage');

        return view('admin.interface.bon.bon', compact('bons'));
    }

    //créer un bon 
    public function addBon()
    {
        return view('admin.interface.bon.create');
    }

    //stocker un bon
    public function store(Request $request)
    {
        $request->validate([

            'destinataire' => 'required|string',

            'date_emission' => 'required|date',

            'status' => 'required|in:livre,non_livre',

            'produits.*.designation' => 'required|string',

            'produits.*.quantite' => 'required|numeric|min:0.01',

            'produits.*.libelle' => 'required|string',
        ]);

        $bon = Bon::create([

            'public_id' => Str::random(10),

            'destinataire' => $request->destinataire,

            'date_emission' => $request->date_emission,

            'status' => $request->status,
        ]);

        foreach ($request->produits as $ligne) {

            BonProduit::create([

                'bon_id' => $bon->id,

                'produit' => $ligne['designation'],

                'quantite' => $ligne['quantite'],

                'libelle' => $ligne['libelle'],

            ]);
        }

        return redirect()->route('admin.bon.index')->with('bonajo', 'Bon créé avec succès');
    }


    //voir un bon
    public function detailsBon($public_id)
    {

        $bon = Bon::where('public_id', $public_id)->with('produits')->firstOrFail();

        return view('admin.interface.bon.show', compact('bon'));
    }

    //modifier un bon
    public function editBon($public_id)
    {
        $bon = Bon::where('public_id', $public_id)->with('produits')->firstOrFail();

        return view('admin.interface.bon.edit', compact('bon'));
    }


    public function update(Request $request, $public_id)
    {
        $bon = Bon::where('public_id', $public_id)->firstOrFail();

        // Validation
        $request->validate([

            'destinataire' => 'required|string',

            'date_emission' => 'required|date',

            'status' => 'required|in:livre,non_livre',

            'produits.*.designation' => 'required|string',

            'produits.*.quantite' => 'required|numeric|min:0.01',

            'produits.*.libelle' => 'required|string',
        ]);

        // Mise à jour du bon
        $bon->update([

            'destinataire' => $request->destinataire,

            'date_emission' => $request->date_emission,

            'status' => $request->status,
        ]);

        // Supprimer les anciens produits et ajouter les nouveaux
        $bon->produits()->delete();

        if ($request->has('produits')) {

            foreach ($request->produits as $ligne) {

                BonProduit::create([

                    'bon_id' => $bon->id,

                    'produit' => $ligne['designation'],

                    'quantite' => $ligne['quantite'],

                    'libelle' => $ligne['libelle'],
                ]);
            }
        }

        return redirect()->route('admin.bon.index', $bon->public_id)->with('bonmodif', 'Bon modifié avec succès');
    }



    public function destroy($public_id)
    {
        $bon = Bon::where('public_id', $public_id)->firstOrFail();

        $bon->delete();

        return redirect()->route('admin.bon.index')->with('bondel', 'Bon supprimé');
    }


    // public function pdf($public_id)
    // {
    //     $bon = Bon::where('public_id', $public_id)->with('produits')->firstOrFail();

    //     $pdf = Pdf::loadView('admin.interface.bon.pdf', compact('bon'));

    //     return $pdf->download('bon-' . $bon->public_id . '.pdf');
    // }
}
