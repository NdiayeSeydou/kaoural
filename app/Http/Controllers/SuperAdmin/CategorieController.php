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

        $categories = Categorie::all();

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

        return redirect()->route('superadmin.categorie.index')->with('  ', 'Catégorie ajoutée avec succès');
    }

    // modifier une catégorie
    public function editCategorie()
    {
        return view('superadmin.interface.categories.edit');
    }
    //voir le details d'une catégorie
    public function detailsCategorie()
    {
        return view('superadmin.interface.categories.show');
    }
}
