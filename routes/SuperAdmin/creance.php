<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\CreanceController;

Route::prefix('superadmin')->group(function () {

    Route::controller(CreanceController::class)->group(function () {  
        
        // Listes des créances 
        Route::get('/creances', [CreanceController::class, 'creance'])->name('superadmin.creance.index');


        // Ajouter une créance
        Route::get('/creance/ajouter', [CreanceController::class, 'addCreance'])->name('superadmin.creance.create');   
         
        // Modifier une créance
        Route::get('/creance/modifier', [CreanceController::class, 'editCreance'])->name('superadmin.creance.edit');

        // Voir les détails d'une créance 
        Route::get('/creance/details', [CreanceController::class, 'detailsCreance'])->name('superadmin.creance.show');

        //ajouter un retrait de produit 
        Route::get('/creance/retrait', [CreanceController::class, 'retrait'])->name('superadmin.creance.show');


    });
    
});
