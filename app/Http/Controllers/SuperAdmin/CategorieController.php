<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //listes des catégories 
    public function categorie()
    {
        return view('superadmin.interface.categories.index');
    }

    // ajouter une catégorie
    public function addCategorie()
    {
        return view('superadmin.interface.categories.add');
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
