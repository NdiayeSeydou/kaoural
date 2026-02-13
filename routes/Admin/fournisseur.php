<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FournisseurController;

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

    Route::controller(FournisseurController::class)->group(function () {

        // Listes des Fournisseurs
        Route::get('/fournisseurs', [FournisseurController::class, 'fournisseur'])->name('admin.fournisseur.index');

        // Ajouter un Fournisseur
        Route::get('/fournisseur/ajouter', [FournisseurController::class, 'addFournisseur'])->name('admin.fournisseur.create');

        // Modifier un Fournisseur
        Route::get('/fournisseur/{public_id}/edit', [FournisseurController::class, 'editFournisseur'])->name('admin.fournisseur.edit');



        Route::put('/fournisseur/{public_id}/update', [FournisseurController::class, 'updateFournisseur'])->name('admin.fournisseur.update');

        // Voir les détails d'un Fournisseur
        Route::get('/fournisseur/{public_id}/show', [FournisseurController::class, 'detailsFournisseur'])->name('admin.fournisseur.show');

        // Modifier une entrée spécifique
        Route::get('/fournisseur/modifier/entrée/spécifique', [FournisseurController::class, 'editEntry'])->name('admin.fournisseur.edit_entry');

        Route::post('/fournisseur/ajouter/fournisseur', [FournisseurController::class, 'store'])->name('admin.fournisseur.store');


        Route::delete('/fournisseur/{public_id}/delete', [FournisseurController::class, 'deleteFournisseur'])->name('admin.fournisseur.delete');
    });
});
