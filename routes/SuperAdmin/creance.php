<?php

use App\Http\Controllers\SuperAdmin\CreanceController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->group(function () {

    Route::controller(CreanceController::class)->group(function () {

        // Listes des stocks
        Route::get('/Creances', [CreanceController::class, 'creances'])->name('superadmin.creance.index');

        // Ajouter un stock
        Route::get('/creance/ajouter', [CreanceController::class, 'addClient'])->name('superadmin.creance.create');

        Route::post('/creance/ajouter/store', [CreanceController::class, 'store'])->name('superadmin.creance.store');

        // Modifier un stock
        Route::get('/creance/modifier/{public_id}', [CreanceController::class, 'editCreance'])->name('superadmin.creance.edit');

        // Voir les détails d'un stock
        Route::get('/creance/{public_id}/details', [CreanceController::class, 'detailsClients'])->name('superadmin.creance.show');

        Route::put('/creance/modifier/{public_id}', [CreanceController::class, 'update'])->name('superadmin.creance.update');

        Route::delete('/creance/{public_id}/supprimer', [CreanceController::class, 'destroy'])->name('superadmin.creance.delete');

        // ajouter un retrait de produit
        Route::get('/creance/{public_id}/retrait', [CreanceController::class, 'addretrait'])->name('superadmin.creance.retrait');

        Route::post('/creance/{public_id}/produit', [CreanceController::class, 'ajoutstore'])->name('superadmin.creance.ajoutstore');

        Route::get('/creance/modifier/produit/{public_id}', [CreanceController::class, 'editRetrait'])->name('superadmin.creance.editRetrait');

        Route::put('/creance/modifier/produit/{public_id}', [CreanceController::class, 'updateRetrait'])->name('superadmin.creance.updateRetrait');

        Route::get('/creance/search-stock', [CreanceController::class, 'searchStock'])->name('superadmin.creance.searchStock');

        Route::get('/creance/get-designation', [CreanceController::class, 'getDesignation'])->name('superadmin.creance.getDesignation');

        // Supprimer un produit retiré
        Route::delete('/creance/produit/{public_id}', [CreanceController::class, 'destroyRetrait'])->name('superadmin.creance.destroyRetrait');
    });

});
