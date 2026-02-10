<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemandeController extends Controller
{

    //listes des demandes passées
    public function demande()
    {
        return view('admin.interface.demandes.index');
    }

    //renseigné une demande
    public function repondreDemande()
    {
        return view('admin.interface.demandes.renseigne');
    }
    
}
