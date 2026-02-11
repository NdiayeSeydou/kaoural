<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    // listes de mes devis
    public function index()
    {
        return view('client.interface.devis.index');
    }

    // détails d'un devis
    public function show()
    {
        return view('client.interface.devis.show');
    }

    // créer un devis
    public function create()
    {
        return view('client.interface.devis.create');
    }

    //modifier un devis

    public function edit()
    {
        return view('client.interface.devis.edit');
    }
}
