<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class CreanceController extends Controller
{

    // listes de mes créances
    public function index()
    {
        return view('client.interface.creances.index');
    }

    

    // détails d'une créance
    public function show()
    {
        return view('client.interface.creances.show');
    }
}
