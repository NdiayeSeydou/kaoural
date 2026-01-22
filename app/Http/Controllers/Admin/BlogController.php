<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //listes des blogs 
    public function blog()
    {

        return view('admin.interface.blogs.listes');
    }


    // ajouter un blog 
    public function addBlog()
    {

        return view('admin.interface.blogs.create');
    }



    //modifier un blog

    public function editBlog()
    {
        return view('admin.interface.blogs.edit');
    }


    //details d'un blog 

    public function showBlog()
    {

        return view('admin.interface.blogs.show');
    }
}
