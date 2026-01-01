<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    //liste des ventes
    public function vente()
    {
        return view('superadmin.interface.vente.listes');
    }

    //détails d'une vente
    public function detailsVente()
    {
        return view('superadmin.interface.vente.detailsVente');
    }
    //ajouter une vente
    public function addVente()
    {
        return view('superadmin.interface.vente.create');
    }
    //modifier une vente
    public function editVente()
    {
        return view('superadmin.interface.vente.edit');
    }
}
