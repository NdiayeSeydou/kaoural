<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //mon profil 
    public function profil()
    {
        return view('admin.interface.profil.profil');
    }

    //modifier mon profil
    public function editProfil(){
        return view('admin.interface.profil.editProfil');
    }

    
}
