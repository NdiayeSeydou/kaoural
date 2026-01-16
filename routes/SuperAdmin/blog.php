<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\BlogController;

Route::prefix('superadmin')->group(function () {

    Route::controller(BlogController::class)->group(function () {

        // Listes des blogs 
        Route::get('/blogs', [BlogController::class, 'blog'])->name('superadmin.blog.index');

        // ajouter un blog 
        Route::get('/creer/blog', [BlogController::class, 'addBlog'])->name('superadmin.blog.create');

        // modifier un blog
        Route::get('/modifier/blog', [BlogController::class, 'editBlog'])->name('superadmin.blog.edit');

        // voir le details d'un blog 
        Route::get('/details/blog', [BlogController::class, 'detailsBlog'])->name('superadmin.blog.show');

    });
    
});
