<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Categorie;
use Illuminate\Support\Str;

class FournisseurController extends Controller
{
    // Méthode pour afficher la liste des fournisseurs

    public function fournisseur()
    {

        $fournisseurs = Fournisseur::with('categorie')->get();

        return view('superadmin.interface.fournisseur.listes', compact('fournisseurs'));
    }

    // Méthode pour afficher le formulaire de création d'un nouveau fournisseur
    public function addFournisseur()
    {

        $categories = Categorie::all();

        return view('superadmin.interface.fournisseur.create', compact('categories'));
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

        return redirect()->route('superadmin.fournisseur.index')->with('ajoutfourn', 'Nouveau fournisseur ajouté avec succès');
    }

    //modifier un fournisseur
    public function editFournisseur()
    {
        return view('superadmin.interface.fournisseur.edit');
    }

    //methode pour afficher les détails d'un fournisseur spécifique
    public function detailsFournisseur()
    {
        return view('superadmin.interface.fournisseur.show');
    }

    //modifier une entrée 
    public function editEntry()
    {
        return view('superadmin.interface.fournisseur.edit_entry');
    }
}
