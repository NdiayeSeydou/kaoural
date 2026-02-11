<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function panier()
    {
        return view('landing.panier');
    }
}
