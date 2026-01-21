<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Str;


class CategorieController extends Controller
{
    //listes des catégories 
    public function categorie()
    {

        $categories = Categorie::withCount('stocks')->orderBy('name', 'asc')->paginate(12, ['*'], 'categoriePage');    

        return view('superadmin.interface.categories.index', compact('categories'));    

    }

    // ajouter une catégorie
    public function addCategorie()
    {
        return view('superadmin.interface.categories.add');
    }


    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255|unique:categories,name',

        ]);

        Categorie::create([

            'name' => $request->name,

            'public_id' => Str::random(10),

        ]);

        return redirect()->route('superadmin.categorie.index')->with('ajoutcateg', 'Catégorie ajoutée avec succès');
    }

    // modifier une catégorie
    public function editCategorie($public_id)
    {
        $categorie = Categorie::where('public_id', $public_id)->firstOrFail();
        return view('superadmin.interface.categories.edit', compact('categorie'));
    }



    public function updateCategorie(Request $request, $public_id)
    {
        $categorie = Categorie::where('public_id', $public_id)->firstOrFail();

        $request->validate([


            'name' => 'required|string|max:255|unique:categories,name,' . $categorie->id,
        ]);

        $categorie->update([

            'name' => $request->name,
        ]);

        return redirect()->route('superadmin.categorie.index')->with('success', 'Catégorie mise à jour avec succès');
    }


    public function detailsCategorie($public_id)
    {
        $categorie = Categorie::where('public_id', $public_id)->firstOrFail();


        $stocks = $categorie->stocks;

        return view('superadmin.interface.categories.show', compact('categorie', 'stocks'));
    }



    //voir le details d'une catégorie
    public function deleteCategorie($public_id)
    {
        $categorie = Categorie::where('public_id', $public_id)->firstOrFail();



        if ($categorie->stocks()->count() > 0) {

            return redirect()->route('superadmin.categorie.index')->with('error', 'Impossible de supprimer cette catégorie car elle contient des stocks.');
        }

        $categorie->delete();

        return redirect()->route('superadmin.categorie.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
