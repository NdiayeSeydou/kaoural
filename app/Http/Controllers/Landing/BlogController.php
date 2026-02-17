<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        
        $blogs = Blog::latest()->paginate(12);

        return view('landing.blog', compact('blogs'));
    }


      public function detailsBlog($public_id)
    {
        $blog = Blog::where('public_id', $public_id)->firstOrFail();

        return view('landing.read', compact('blog'));
    }
}
