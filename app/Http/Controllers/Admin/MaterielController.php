<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    //listes des materiels pris par des clients
    public function index()
    {
        return view('admin.interface.materiel.listes');
    }

    //detail du materiel pris par un client
    public function show()
    {
        return view('admin.interface.materiel.show');
    }

    //edition du materiel pris par un client
    public function edit()
    {
        return view('admin.interface.materiel.edit');
    }

    //ajout de materiel pris par un client
    public function create()
    {
        return view('admin.interface.materiel.create');
    }
}