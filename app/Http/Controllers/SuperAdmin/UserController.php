<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //listes des utilisateurs 
    public function user()
    {
        return view('superadmin.interface.user.listes');
    }

    //détails d'un utilisateur
    public function detailsUser()
    {
        return view('superadmin.interface.user.detailsUser');
    }

    //ajouter un utilisateur
    public function addUser()
    {
        return view('superadmin.interface.user.addUser');
    }

    //modifier un utilisateur
    public function editUser()
    {
        return view('superadmin.interface.user.editUser');
    }
}
