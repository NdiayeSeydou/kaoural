<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\VenteController;

Route::prefix('superadmin')->group(function () {

    Route::controller(VenteController::class)->group(function () {

        // Listes des ventes
        Route::get('/ventes', [VenteController::class, 'vente'])->name('superadmin.vente.index');


        // Ajouter une vente
        Route::get('/ventes/ajouter', [VenteController::class, 'addVente'])->name('superadmin.vente.create');


        // Modifier une vente
        Route::get('/ventes/modifier', [VenteController::class, 'editVente'])->name('superadmin.vente.edit');

        // Voir les détails d'une vente
        Route::get('/ventes/details', [VenteController::class, 'detailsVente'])->name('superadmin.vente.show');

        
    });
});
