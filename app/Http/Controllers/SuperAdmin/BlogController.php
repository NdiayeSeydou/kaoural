<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //listes des blogs 
    public function blog()
    {
        return view('superadmin.interface.blogs.index');
    }


    //ajouter un blog 
    public function addBlog()
    {
        return view('superadmin.interface.blogs.add');
    }

    // modifier un blog 
    public function editBlog()
    {

        return view('superadmin.interface.blogs.edit');
    }


    //voir le details d'un blog 
    public function detailsBlog()
    {
        return view('superadmin.interface.blogs.show');
    }
}
