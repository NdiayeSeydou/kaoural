<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //liste des produits
    public function index()
    {
        return view('superadmin.interface.produit.listes');
    }

    //ajout de produit
    public function create(){
        return view('superadmin.interface.produit.create');
    }

    //edition de produit
    public function edit(){
        return view('superadmin.interface.produit.edit');
    }

    //detail de produit
    public function show(){
        return view('superadmin.interface.produit.show');
    }
}