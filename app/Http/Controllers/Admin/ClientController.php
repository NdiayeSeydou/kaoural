<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Méthode pour afficher la liste des clients
    public function index()
    {
        return view('admin.interface.client.listes');
    }

    // Méthode pour afficher le formulaire de création d'un nouveau client
    public function create()
    {
        return view('admin.interface.client.create');
    }

    //modifier un client
    public function edit()
    {
        return view('admin.interface.client.edit');
    }

    //methode pour afficher les détails d'un client spécifique
    public function show()
    {
        return view('admin.interface.client.show');
    }
    
}
