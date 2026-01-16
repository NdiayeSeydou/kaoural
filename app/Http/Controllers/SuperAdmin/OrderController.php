<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //listes des commandes passées 
    public function commande()
    {
        return view('superadmin.orders.index');
    }

    //status des commandes avec vue kanban
    public function statusCommande()
    {
        return view('superadmin.orders.status');
    }
    
}
