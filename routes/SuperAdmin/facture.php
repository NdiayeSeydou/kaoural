<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\FactureController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(FactureController::class)->group(function () {

        // Listes des Factures
        Route::get('/factures', [FactureController::class, 'facture'])->name('superadmin.facture.index');


        // Ajouter une facture 
        Route::get('/facture/ajouter', [FactureController::class, 'addFacture'])->name('superadmin.facture.create');

        // Modifier une facture
        Route::get('/facture/modifier', [FactureController::class, 'editFacture'])->name('superadmin.facture.edit');

        // Voir les détails d'une facture 
        Route::get('/facture/details', [FactureController::class, 'detailsFacture'])->name('superadmin.facture.show');
    });
});
