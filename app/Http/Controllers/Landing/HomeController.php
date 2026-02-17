<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Produit;

class HomeController extends Controller
{
    public function home()
    {
        
        $produitsAVendre = Produit::inRandomOrder()->take(6)->get();

        $meilleuresVentes = Produit::latest()->take(6)->get();

        return view('welcome', compact('produitsAVendre', 'meilleuresVentes'));
    }
}
