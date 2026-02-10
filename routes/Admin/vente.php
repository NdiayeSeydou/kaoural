<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\VenteController;


Route::prefix('admin')->group(function () {

    Route::controller(VenteController::class)->group(function () {

        Route::get('/ventes', 'vente')->name('admin.vente.index');
        
      
        Route::get('/ventes/ajouter', 'addVente')->name('admin.vente.create');
        
     
        Route::post('/ventes', 'store')->name('admin.vente.store');

        Route::get('/ventes/details/{public_id}', 'detailsVente')->name('admin.vente.show');


        Route::get('/ventes/modifier/{public_id}', 'editVente')->name('admin.vente.edit');

      
        Route::put('/ventes/{public_id}', 'updateVente')->name('admin.vente.update');

        
        Route::delete('/ventes/{public_id}', 'destroy')->name('admin.vente.destroy');

    });
});