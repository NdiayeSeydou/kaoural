<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\VenteController;


Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(VenteController::class)->group(function () {

        Route::get('/ventes', 'vente')->name('superadmin.vente.index');
   
        Route::get('/ventes/ajouter', 'addVente')->name('superadmin.vente.create');
        
        Route::post('/ventes', 'store')->name('superadmin.vente.store');
        
        Route::get('/ventes/details/{public_id}', 'detailsVente')->name('superadmin.vente.show');

     
        Route::get('/ventes/modifier/{public_id}', 'editVente')->name('superadmin.vente.edit');

     
        Route::put('/ventes/{public_id}', 'updateVente')->name('superadmin.vente.update');

      
        Route::delete('/ventes/{public_id}', 'destroy')->name('superadmin.vente.destroy');

    });

});