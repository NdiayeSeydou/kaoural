<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\BonController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(BonController::class)->group(function () {

        // Listes des bons 
        Route::get('/bons', [BonController::class, 'bon'])->name('superadmin.bon.index');


        // Ajouter un bon 
        Route::get('/bon/ajouter', [BonController::class, 'addBon'])->name('superadmin.bon.create');

        // Modifier un bon
        Route::get('/bon/modifier/{public_id}', [BonController::class, 'editBon'])->name('superadmin.bon.edit');


        // Voir les détails d'un bon 
        Route::get('/bon/details/{public_id}', [BonController::class, 'detailsBon'])->name('superadmin.bon.show');


         Route::put('/bon/modifier/update/{public_id}', [BonController::class, 'update'])->name('superadmin.bon.update');


        Route::post('/bon/store', [BonController::class, 'store'])->name('superadmin.bon.store');

        //supression
        Route::delete('/bon/supprimer/{public_id}', [BonController::class, 'destroy'])->name('superadmin.bon.destroy');

    });
});
