<?php

use App\Http\Controllers\Admin\CreanceController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

    Route::controller(CreanceController::class)->group(function () {

        // Listes des stocks
        Route::get('/Creances', [CreanceController::class, 'creances'])->name('admin.creance.index');

        // Ajouter un stock
        Route::get('/creance/ajouter', [CreanceController::class, 'addClient'])->name('admin.creance.create');

        Route::post('/creance/ajouter/store', [CreanceController::class, 'store'])->name('admin.creance.store');

        // Modifier un stock
        Route::get('/creance/modifier/{public_id}', [CreanceController::class, 'editCreance'])->name('admin.creance.edit');

        // Voir les détails d'un stock
        Route::get('/creance/{public_id}/details', [CreanceController::class, 'detailsClients'])->name('admin.creance.show');

        Route::put('/creance/modifier/{public_id}', [CreanceController::class, 'update'])->name('admin.creance.update');

        Route::delete('/creance/{public_id}/supprimer', [CreanceController::class, 'destroy'])->name('admin.creance.delete');

        // ajouter un retrait de produit
        Route::get('/creance/{public_id}/retrait', [CreanceController::class, 'addretrait'])->name('admin.creance.retrait');

        Route::post('/creance/{public_id}/produit', [CreanceController::class, 'ajoutstore'])->name('admin.creance.ajoutstore');

        Route::get('/creance/modifier/produit/{public_id}', [CreanceController::class, 'editRetrait'])->name('admin.creance.editRetrait');

        Route::put('/creance/modifier/produit/{public_id}', [CreanceController::class, 'updateRetrait'])->name('admin.creance.updateRetrait');

        Route::get('/creance/search-stock', [CreanceController::class, 'searchStock'])->name('admin.creance.searchStock');

        Route::get('/creance/get-designation', [CreanceController::class, 'getDesignation'])->name('admin.creance.getDesignation');

        // Supprimer un produit retiré
        Route::delete('/creance/produit/{public_id}', [CreanceController::class, 'destroyRetrait'])->name('admin.creance.destroyRetrait');
    });

});
