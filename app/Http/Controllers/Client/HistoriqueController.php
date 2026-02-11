<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class HistoriqueController extends Controller
{
    // listes de mes historiques
    public function index()
    {
        return view('client.interface.commandes.index');
    }

    // détails d'un historique
    public function show()
    {
        return view('client.interface.commandes.show');
    }
}
