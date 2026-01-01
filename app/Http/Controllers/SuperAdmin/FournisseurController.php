<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    // Méthode pour afficher la liste des fournisseurs
    public function index()
    {
        return view('superadmin.interface.fournisseur.listes');
    }

    // Méthode pour afficher le formulaire de création d'un nouveau fournisseur
    public function create()
    {
        return view('superadmin.interface.fournisseur.create');
    }

    //modifier un fournisseur
    public function edit()
    {
        return view('superadmin.interface.fournisseur.edit');
    }

    //methode pour afficher les détails d'un fournisseur spécifique
    public function show()
    {
        return view('superadmin.interface.fournisseur.show');
    }
    
}
