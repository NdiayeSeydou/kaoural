<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    // listes de mes factures
    public function index()
    {
        return view('client.interface.factures.index');
    }

    // détails d'une facture
    public function show()
    {
        return view('client.interface.factures.show');
    }

    
}
