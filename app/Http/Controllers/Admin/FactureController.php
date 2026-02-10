<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    // Méthode pour afficher la liste des factures
    public function facture()
    {
        return view('admin.interface.facture.listes');
    }

    // Méthode pour afficher le formulaire de création d'une nouvelle facture
    public function addFacture()
    {
        return view('admin.interface.facture.create');
    }

    //modifier une facture
    public function editFacture()
    {
        return view('admin.interface.facture.edit');
    }

    //methode pour afficher les détails d'une facture spécifique
    public function detailsFacture()
    {
        return view('admin.interface.facture.show');
    }
    
}
