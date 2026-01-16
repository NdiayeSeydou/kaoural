<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\BonController;

Route::prefix('superadmin')->group(function () {

    Route::controller(BonController::class)->group(function () {  

        // Listes des bons 
        Route::get('/bons', [BonController::class, 'bon'])->name('superadmin.bon.index');


        // Ajouter un bon 
        Route::get('/bon/ajouter', [BonController::class, 'addBon'])->name('superadmin.bon.create');   
         
        // Modifier un bon
        Route::get('/bon/modifier', [BonController::class, 'editBon'])->name('superadmin.bon.edit');

        // Voir les détails d'un bon 
        Route::get('/bon/details', [BonController::class, 'detailsBon'])->name('superadmin.bon.show');

    });
    
});
