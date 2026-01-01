<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BonController extends Controller
{
    public function bon()
    {
        return view('superadmin.interface.bon.bon');
    }

    //créer un bon 
    public function create()
    {
        return view('superadmin.interface.bon.create');
    }

    //voir un bon
    public function show()
    {
        return view('superadmin.interface.bon.show');
    }
}
