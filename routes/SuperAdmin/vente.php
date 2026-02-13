<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\VenteController;



Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(VenteController::class)->group(function () {

        // --- 1. ROUTES STATIQUES (Toujours en premier) ---
        // Liste des ventes
        Route::get('/ventes', 'vente')->name('superadmin.vente.index');
        
        // Formulaire d'ajout
        Route::get('/ventes/ajouter', 'addVente')->name('superadmin.vente.create');
        
        // Action d'enregistrement
        Route::post('/ventes', 'store')->name('superadmin.vente.store');


        // --- 2. ROUTES DYNAMIQUES (Avec Paramètres) ---
        // Note: On utilise des préfixes ('details/', 'modifier/') pour éviter 
        // toute collision avec les méthodes PUT ou DELETE.

        // Afficher les détails d'une vente
        Route::get('/ventes/details/{public_id}', 'detailsVente')
            ->name('superadmin.vente.show');

        // Formulaire de modification
        Route::get('/ventes/modifier/{public_id}', 'editVente')
            ->name('superadmin.vente.edit');

        // Action de mise à jour (PUT)
        Route::put('/ventes/{public_id}', 'updateVente')
            ->name('superadmin.vente.update');

        // Action de suppression (DELETE)
        Route::delete('/ventes/{public_id}', 'destroy')
            ->name('superadmin.vente.destroy');

    });
});