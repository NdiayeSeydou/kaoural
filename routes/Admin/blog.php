<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BlogController;

Route::prefix('admin')->group(function () {

    Route::controller(BlogController::class)->group(function () {

        // Listes des blogs 
        Route::get('/blogs', [BlogController::class, 'blog'])->name('admin.blog.index');

        // ajouter un blog 
        Route::get('/creer/blog', [BlogController::class, 'addBlog'])->name('admin.blog.create');

        // modifier un blog
        Route::get('/modifier/blog', [BlogController::class, 'editBlog'])->name('admin.blog.edit');

        // voir le details d'un blog 
        Route::get('/details/blog', [BlogController::class, 'showBlog'])->name('admin.blog.show');
    });
});
