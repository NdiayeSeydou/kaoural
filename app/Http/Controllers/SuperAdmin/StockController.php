<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //liste des stocks
    public function stock()
    {
        return view('superadmin.interface.stock.listes');
    }

    //détails d'un stock
    public function detailsStock()
    {
        return view('superadmin.interface.stock.detailsStock');
    }

    //ajouter un stock
    public function addStock()
    {
        return view('superadmin.interface.stock.create');
    }
    //modifier un stock
    public function editStock()
    {
        return view('superadmin.interface.stock.edit');
    }
}
