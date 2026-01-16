<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemandeController extends Controller
{

    //listes des demandes passées
    public function demande()
    {
        return view('superadmin.interface.demandes.index');
    }

    //renseigné une demande
    public function repondreDemande()
    {
        return view('superadmin.interface.demandes.renseigne');
    }
    
}
