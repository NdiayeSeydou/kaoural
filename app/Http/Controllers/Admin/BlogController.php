<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

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

    public function editBlog($public_id)
    {
        $blog = Blog::where('public_id', $public_id)->firstOrFail();

        return view('admin.interface.blogs.edit', compact('blog'));
    }


    //details d'un blog 

    public function showBlog($public_id)
    {
        $blog = Blog::where('public_id', $public_id)->firstOrFail();

        return view('admin.interface.blogs.show', compact('blog'));
    }
}
