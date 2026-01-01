<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    //listes des materiels pris par des clients
    public function index()
    {
        return view('superadmin.interface.materiel.listes');
    }

    //detail du materiel pris par un client
    public function show()
    {
        return view('superadmin.interface.materiel.show');
    }

    //edition du materiel pris par un client
    public function edit()
    {
        return view('superadmin.interface.materiel.edit');
    }

    //ajout de materiel pris par un client
    public function create()
    {
        return view('superadmin.interface.materiel.create');
    }
}