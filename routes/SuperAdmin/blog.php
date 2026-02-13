<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SuperAdmin\BlogController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

   
    Route::controller(BlogController::class)->middleware(['auth', 'verified', 'rolemanager:client'])->group(function () {

        
        Route::get('/blogs', 'blog')->name('superadmin.blog.index');
      
        Route::get('/details/blog/{public_id}', 'detailsBlog')->name('superadmin.blog.show');


        Route::get('/creer/blog', 'addBlog')->name('superadmin.blog.create');
        
      
        Route::post('/creer/blog/store', 'storeBlog')->name('superadmin.blog.store');


   
        Route::get('/modifier/blog/{public_id}', 'editBlog')->name('superadmin.blog.edit');
        
       
        Route::put('/modifier/blog/{public_id}/update', 'updateBlog')->name('superadmin.blog.update');

        Route::delete('/supprimer/blog/{public_id}', 'deleteBlog')->name('superadmin.blog.delete');

    });
    
});