<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Méthode pour afficher la liste des clients
    public function index()
    {
        return view('superadmin.interface.client.listes');
    }

    // Méthode pour afficher le formulaire de création d'un nouveau client
    public function create()
    {
        return view('superadmin.interface.client.create');
    }

    //modifier un client
    public function edit()
    {
        return view('superadmin.interface.client.edit');
    }

    //methode pour afficher les détails d'un client spécifique
    public function show()
    {
        return view('superadmin.interface.client.show');
    }
    
}
