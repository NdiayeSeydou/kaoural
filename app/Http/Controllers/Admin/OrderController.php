<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //listes des commandes passées 
    public function commande()
    {
        return view('admin.orders.index');
    }

    //status des commandes avec vue kanban
    public function statusCommande()
    {
        return view('admin.orders.status');
    }
    
}
