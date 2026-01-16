<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BonController extends Controller
{
    //liste des bons 
    public function bon()
    {
        return view('superadmin.interface.bon.bon');
    }

    //créer un bon 
    public function addBon()
    {
        return view('superadmin.interface.bon.create');
    }

    //voir un bon
    public function detailsBon()
    {
        return view('superadmin.interface.bon.show');
    }
    
    //modifier un bon
    public function editBon()
    {
        return view('superadmin.interface.bon.edit');
    }

}
