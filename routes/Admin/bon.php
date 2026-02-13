<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BonController;

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

    Route::controller(BonController::class)->group(function () {

        // Listes des bons 
        Route::get('/bons', [BonController::class, 'bon'])->name('admin.bon.index');


        // Ajouter un bon 
        Route::get('/bon/ajouter', [BonController::class, 'addBon'])->name('admin.bon.create');

        // Modifier un bon
        Route::get('/bon/modifier/{public_id}', [BonController::class, 'editBon'])->name('admin.bon.edit');


        // Voir les détails d'un bon 
        Route::get('/bon/details/{public_id}', [BonController::class, 'detailsBon'])->name('admin.bon.show');


         Route::put('/bon/modifier/update/{public_id}', [BonController::class, 'update'])->name('admin.bon.update');


        Route::post('/bon/store', [BonController::class, 'store'])->name('admin.bon.store');

        //supression
        Route::delete('/bon/supprimer/{public_id}', [BonController::class, 'destroy'])->name('admin.bon.destroy');

    });
});
