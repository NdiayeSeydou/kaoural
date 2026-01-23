<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProduitController extends Controller
{
    //liste des produits
    public function produit()
    {
        $produits = Produit::with('categorie')->latest()->paginate(12, ['*'], 'produitPage');

        return view('superadmin.interface.produit.listes', compact('produits'));
    }

    //ajout de produit
    public function addProduit()
    {
        $categories = Categorie::all();

        return view('superadmin.interface.produit.create', compact('categories'));
    }


    public function storeProduit(Request $request)
    {
        $request->validate([

            'designation' => 'required|string|max:255',

            'categorie_id' => 'required|exists:categories,id',

            'description'    => 'nullable|string|max:1000',

            'prix_unitaire' => 'required|numeric|min:0',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('produits', 'public');
        }

        Produit::create([

            'public_id' => Str::random(10),

            'designation' => $request->designation,

            'description'  => $request->description,

            'categorie_id' => $request->categorie_id,

            'prix_unitaire' => $request->prix_unitaire,

            'image' => $imagePath,
        ]);

        return redirect()->route('superadmin.produit.index')->with('prodadd', 'Produit ajouté avec succès');
    }


    //modifier de produit
    public function editProduit($public_id)
    {
        $produit = Produit::where('public_id', $public_id)->firstOrFail();

        $categories = Categorie::all();

        return view('superadmin.interface.produit.edit', compact('produit', 'categories'));
    }

    public function updateProduit(Request $request, $public_id)
    {
        $produit = Produit::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'designation' => 'required|string|max:255',

            'categorie_id' => 'required|exists:categories,id',

            'description'    => 'nullable|string|max:1000',

            'prix_unitaire' => 'required|numeric|min:0',

            'image' => 'nullable|image|max:2048',

        ]);

        if ($request->hasFile('image')) {

            if ($produit->image) {

                Storage::disk('public')->delete($produit->image);
            }
            $produit->image = $request->file('image')->store('produits', 'public');
        }

        $produit->update([

            'designation' => $request->designation,

            'categorie_id' => $request->categorie_id,

            'prix_unitaire' => $request->prix_unitaire,

            'description'  => $request->description,

        ]);

        return redirect()->route('superadmin.produit.index')->with('proedit', 'Produit modifié avec succès');
    }


    //detail d'un produit
    public function detailsProduit($public_id)
    {
        $produit = Produit::where('public_id', $public_id)->with('categorie')->firstOrFail();

        return view('superadmin.interface.produit.show', compact('produit'));
    }


    public function deleteProduit($public_id)
    {
        $produit = Produit::where('public_id', $public_id)->firstOrFail();

        if ($produit->image) {

            Storage::disk('public')->delete($produit->image);
        }

        $produit->delete();

        return redirect()->route('superadmin.produit.index')->with('prodel', 'Produit supprimé');
    }
}
