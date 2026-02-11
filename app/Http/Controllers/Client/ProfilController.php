<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // afficher mon profil
    public function index()
    {
        return view('client.interface.profil.profil');
    }

    // modifier mon profil
    public function edit()
    {
        return view('client.interface.profil.edit');
    }
}
