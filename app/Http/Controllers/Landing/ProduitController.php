<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Produit;

class ProduitController extends Controller
{
   public function produit()
{
    $categories = Categorie::all()->map(function ($categorie) {
        
        $categorie->setRelation('produits', 
            $categorie->produits()->paginate(45, ['*'], 'cat' . $categorie->id)
                ->withQueryString() 
        );
        return $categorie;
    });

   
    $produits = Produit::with('categorie')->latest()->paginate(45)->withQueryString();

    return view('landing.produit', compact('categories', 'produits'));
}
}
