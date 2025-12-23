<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function produit(){
        return view('landing.produit');
    }
}
