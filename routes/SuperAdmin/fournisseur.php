<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\FournisseurController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(FournisseurController::class)->group(function () {

        // Listes des Fournisseurs
        Route::get('/fournisseurs', [FournisseurController::class, 'fournisseur'])->name('superadmin.fournisseur.index');

        // Ajouter un Fournisseur
        Route::get('/fournisseur/ajouter', [FournisseurController::class, 'addFournisseur'])->name('superadmin.fournisseur.create');

        // Modifier un Fournisseur
        Route::get('/fournisseur/{public_id}/edit', 'editFournisseur')->name('superadmin.fournisseur.edit');


        Route::put('/fournisseur/{public_id}/update', 'updateFournisseur')->name('superadmin.fournisseur.update');

        // Voir les détails d'un Fournisseur
        Route::get('/fournisseur/{public_id}/show', 'detailsFournisseur')->name('superadmin.fournisseur.show');

        // Modifier une entrée spécifique
        Route::get('/fournisseur/modifier/entrée/spécifique', [FournisseurController::class, 'editEntry'])->name('superadmin.fournisseur.edit_entry');

        Route::post('/fournisseur/ajouter/fournisseur', [FournisseurController::class, 'store'])->name('superadmin.fournisseur.store');


        Route::delete('/fournisseur/{public_id}/delete', 'deleteFournisseur')->name('superadmin.fournisseur.delete');
    });
});
