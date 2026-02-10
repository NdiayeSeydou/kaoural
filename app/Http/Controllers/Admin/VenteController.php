<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VenteController extends Controller
{
    // Liste des ventes groupées par date
    

public function vente()
{
    // 🔵 VENTES BOUTIQUE (pagination indépendante)
    $datesBoutique = Vente::where('emplacement', 'boutique')
        ->select('date_vente')
        ->distinct()
        ->orderBy('date_vente', 'desc')
        ->paginate(10, ['*'], 'boutiquePage');

    $ventesBoutique = Vente::where('emplacement', 'boutique')
        ->whereIn('date_vente', $datesBoutique->pluck('date_vente'))
        ->orderBy('date_vente', 'desc')
        ->orderBy('created_at', 'asc')
        ->get()
        ->groupBy('date_vente');

    // 🔴 VENTES MAGASIN (pagination indépendante)
    $datesMagasin = Vente::where('emplacement', 'magasin')
        ->select('date_vente')
        ->distinct()
        ->orderBy('date_vente', 'desc')
        ->paginate(10, ['*'], 'magasinPage');

    $ventesMagasin = Vente::where('emplacement', 'magasin')
        ->whereIn('date_vente', $datesMagasin->pluck('date_vente'))
        ->orderBy('date_vente', 'desc')
        ->orderBy('created_at', 'asc')
        ->get()
        ->groupBy('date_vente');

    return view(
        'admin.interface.vente.listes',
        compact('ventesBoutique', 'ventesMagasin', 'datesBoutique', 'datesMagasin')
    );
}


    // Détails d'une vente
    public function detailsVente($public_id)
    {
        $vente = Vente::with('stock')->where('public_id', $public_id)->firstOrFail();

        return view('admin.interface.vente.detailsVente', compact('vente'));
    }

    // Formulaire d'ajout
    public function addVente()
    {
        $stocks = Stock::where('quantite_restante', '>', 0)->get();

        return view('admin.interface.vente.create', compact('stocks'));
    }

    // Enregistrement d'une ou plusieurs ventes
    public function store(Request $request)
    {
        $request->validate([

            'date_vente' => 'required|date',

            'produits' => 'required|array|min:1',

            'produits.*.stock_id' => 'required|exists:stocks,id',

            'produits.*.quantite' => 'required|numeric|min:0.01',

            'produits.*.prix_unitaire' => 'required|numeric|min:0',
        ]);

        try {
            DB::transaction(function () use ($request) {

                foreach ($request->produits as $item) {

                    $stock = Stock::lockForUpdate()->findOrFail($item['stock_id']);

                    if ($item['quantite'] > $stock->quantite_restante) {

                        throw new \Exception("Stock insuffisant pour : {$stock->designation} (Disponible: {$stock->quantite_restante})");
                    }

                    Vente::create([

                        'public_id' => Str::random(10),

                        'date_vente' => $request->date_vente,

                        'stock_id' => $stock->id,

                        'designation' => $stock->designation,

                        'code_article' => $stock->code_article,

                        'image' => $stock->image,

                        'quantite' => $item['quantite'],

                        'prix_unitaire' => $item['prix_unitaire'],

                        'prix_total' => $item['quantite'] * $item['prix_unitaire'],

                        'emplacement' => $stock->emplacement,
                    ]);

                    // Mise à jour du stock
                    $stock->quantite_sortie += $item['quantite'];

                    $stock->quantite_restante -= $item['quantite'];

                    $this->updateStockStatus($stock);

                    $stock->save();
                }

            });

            return redirect()->route('admin.vente.index')->with('venteajoutnew', 'Vente enregistrée avec succès');

        } catch (\Exception $e) {

            return back()->withInput()->with('errorventenew', 'Erreur : '.$e->getMessage());
        }
    }

    // Formulaire de modification
    public function editVente($public_id)
    {
        $vente = Vente::with('stock')->where('public_id', $public_id)->firstOrFail();

        $stocks = Stock::where('quantite_restante', '>', 0)->orWhere('id', $vente->stock_id)->get();

        return view('admin.interface.vente.edit', compact('vente', 'stocks'));
    }

    public function updateVente(Request $request, $public_id)
    {
        $vente = Vente::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'date_vente' => 'required|date',

            'stock_id' => 'required|exists:stocks,id',

            'quantite' => 'required|numeric|min:0.01',

            'prix_unitaire' => 'required|numeric|min:0',
        ]);

        try {
            DB::transaction(function () use ($request, $vente) {

                $ancienStock = Stock::lockForUpdate()->find($vente->stock_id);

                if ($ancienStock) {

                    $ancienStock->quantite_sortie -= $vente->quantite;

                    $ancienStock->quantite_restante += $vente->quantite;

                    $this->updateStockStatus($ancienStock);

                    $ancienStock->save();
                }

                $nouveauStock = Stock::lockForUpdate()->findOrFail($request->stock_id);

                if ($request->quantite > $nouveauStock->quantite_restante) {

                    throw new \Exception("Stock insuffisant pour {$nouveauStock->designation}. Disponible : {$nouveauStock->quantite_restante}");
                }

                $nouveauStock->quantite_sortie += $request->quantite;

                $nouveauStock->quantite_restante -= $request->quantite;

                $this->updateStockStatus($nouveauStock);

                $nouveauStock->save();

                $vente->update([

                    'date_vente' => $request->date_vente,

                    'stock_id' => $nouveauStock->id,

                    'designation' => $nouveauStock->designation,

                    'code_article' => $nouveauStock->code_article,

                    'image' => $nouveauStock->image,

                    'quantite' => $request->quantite,

                    'prix_unitaire' => $request->prix_unitaire,

                    'prix_total' => $request->quantite * $request->prix_unitaire,

                    'emplacement' => $nouveauStock->emplacement,
                ]);

            });

            return redirect()->route('admin.vente.index')->with('ventupdt', 'Vente mise à jour avec succès');

        } catch (\Exception $e) {

            return back()->with('errupt', $e->getMessage());
        }
    }

    // Suppression et restauration du stock
    public function destroy($public_id)
    {
        $vente = Vente::where('public_id', $public_id)->firstOrFail();

        try {

            DB::transaction(function () use ($vente) {

                $stock = $vente->stock;

                if ($stock) {

                    $stock->quantite_sortie -= $vente->quantite;

                    $stock->quantite_restante += $vente->quantite;

                    $this->updateStockStatus($stock);

                    $stock->save();
                }

                $vente->delete();
            });

            return back()->with('delvente', 'Vente supprimée et stock restauré');

        } catch (\Exception $e) {

            return back()->with('error', 'Erreur lors de la suppression : '.$e->getMessage());
        }
    }

    private function updateStockStatus($stock)
    {
        if ($stock->quantite_restante <= 0) {

            $stock->status = 'rupture';

        } elseif ($stock->quantite_restante <= 5) {

            $stock->status = 'baisse';

        } else {

            $stock->status = 'disponible';
        }
    }
}
