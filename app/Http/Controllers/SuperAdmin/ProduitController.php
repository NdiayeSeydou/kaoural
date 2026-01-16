<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //liste des produits
    public function produit()
    {
        return view('superadmin.interface.produit.listes');
    }

    //ajout de produit
    public function addProduit(){
        return view('superadmin.interface.produit.create');
    }

    //modifier de produit
    public function editProduit(){
        return view('superadmin.interface.produit.edit');
    }

    //detail d'un produit
    public function detailsProduit(){
        return view('superadmin.interface.produit.show');
    }
    
}