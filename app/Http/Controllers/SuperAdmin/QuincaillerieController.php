<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuincaillerieController extends Controller
{
    //listes des quincailleries
    public function quincaillerie()
    {
        return view('superadmin.interface.quincaillerie.listes');
    }

    //détails d'une quincaillerie
    public function detailsQuincaillerie()
    {
        return view('superadmin.interface.quincaillerie.detailsQuincaillerie');
    }

    //ajouter une quincaillerie
    public function addQuincaillerie()
    {
        return view('superadmin.interface.quincaillerie.addQuincaillerie');
    }

    //modifier une quincaillerie
    public function editQuincaillerie()
    {
        return view('superadmin.interface.quincaillerie.editQuincaillerie');
    }
}
