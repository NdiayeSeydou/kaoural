<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    // Méthode pour afficher la liste des factures
    public function index()
    {
        return view('superadmin.interface.facture.listes');
    }

    // Méthode pour afficher le formulaire de création d'une nouvelle facture
    public function create()
    {
        return view('superadmin.interface.facture.create');
    }

    //modifier une facture
    public function edit()
    {
        return view('superadmin.interface.facture.edit');
    }

    //methode pour afficher les détails d'une facture spécifique
    public function show()
    {
        return view('superadmin.interface.facture.show');
    }
}
