<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FactureController;

Route::prefix('admin')->group(function () {

    Route::controller(FactureController::class)->group(function () {

        // Listes des Factures
        Route::get('/factures', [FactureController::class, 'facture'])->name('admin.facture.index');


        // Ajouter une facture 
        Route::get('/facture/ajouter', [FactureController::class, 'addFacture'])->name('admin.facture.create');

        // Modifier une facture
        Route::get('/facture/modifier', [FactureController::class, 'editFacture'])->name('admin.facture.edit');

        // Voir les détails d'une facture 
        Route::get('/facture/details', [FactureController::class, 'detailsFacture'])->name('admin.facture.show');
    });
});
