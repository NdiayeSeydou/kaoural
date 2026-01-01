<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //mon profil 
    public function profil()
    {
        return view('superadmin.interface.profil.profil');
    }

    //modifier mon profil
    public function editProfil(){
        return view('superadmin.interface.profil.editProfil');
    }

    
}
