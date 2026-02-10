<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 

class BlogController extends Controller
{
    // listes des blogs
    public function blog()
    {
        $blogs = Blog::latest()->get();

        return view('superadmin.interface.blogs.index', compact('blogs'));
    }

    // ajouter un blog
    public function addBlog()
    {
        return view('superadmin.interface.blogs.add');
    }

    public function storeBlog(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',

            'description' => 'required',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $blog = new Blog;

        $blog->public_id = (string) Str::random(10); 

        $blog->title = $request->title;

        $blog->description = $request->description;

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('blogs', 'public');

            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('superadmin.blog.index')->with('addblog', 'Blog créé avec succès !');
    }

    // modifier un blog
   public function editBlog($public_id)
    {
        $blog = Blog::where('public_id', $public_id)->firstOrFail();

        return view('superadmin.interface.blogs.edit', compact('blog'));
    }

    // voir le details d'un blog
   public function detailsBlog($public_id)
    {
        $blog = Blog::where('public_id', $public_id)->firstOrFail();

        return view('superadmin.interface.blogs.show', compact('blog'));
    }


    public function updateBlog(Request $request, $public_id)
    {
        $blog = Blog::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'title' => 'required|max:255',

            'description' => 'required',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $blog->title = $request->title;

        $blog->description = $request->description;

        if ($request->hasFile('image')) {
          
            if ($blog->image) {

                Storage::disk('public')->delete($blog->image);
            }
            $path = $request->file('image')->store('blogs', 'public');

            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('superadmin.blog.index')->with('updblog', 'Blog mis à jour !');
    }

    // Suppression du blog
    public function deleteBlog($public_id)
    {
        $blog = Blog::where('public_id', $public_id)->firstOrFail();
        
        if ($blog->image) {

            Storage::disk('public')->delete($blog->image);
        }
        
        $blog->delete();

        return redirect()->back()->with('delblog', 'Blog supprimé définitivement.');
    }
}
