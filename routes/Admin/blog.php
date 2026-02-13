<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BlogController;

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

   
    Route::controller(BlogController::class)->group(function () {

        
        Route::get('/blogs', 'blog')->name('admin.blog.index');
      
        Route::get('/details/blog/{public_id}', 'detailsBlog')->name('admin.blog.show');


        Route::get('/creer/blog', 'addBlog')->name('admin.blog.create');
        
      
        Route::post('/creer/blog/store', 'storeBlog')->name('admin.blog.store');


   
        Route::get('/modifier/blog/{public_id}', 'editBlog')->name('admin.blog.edit');
        
       
        Route::put('/modifier/blog/{public_id}/update', 'updateBlog')->name('admin.blog.update');

        Route::delete('/supprimer/blog/{public_id}', 'deleteBlog')->name('admin.blog.delete');

    });
    
});