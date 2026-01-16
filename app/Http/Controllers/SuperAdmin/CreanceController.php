<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreanceController extends Controller
{
    // listes des créancier 
    public function creance()
    {
        return view('superadmin.interface.creance.listes');
    }

    // détails d'une créance    
    public function detailsCreance()
    {
        return view('superadmin.interface.creance.show');
    }


    // ajouter une créance

    public function addCreance()
    {
        return view('superadmin.interface.creance.create');
    }


    // modifier une créance
    public function editCreance()
    {
        return view('superadmin.interface.creance.edit');
    }

    // ajouter un retrait 
    public function retrait()
    {
        return view('superadmin.interface.creance.retrait');
    }
}
