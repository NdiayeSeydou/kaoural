<?php

use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->middleware(['auth', 'verified', 'rolemanager:client'])->group(function () {

    Route::controller(ClientController::class)->group(function () {
        
        // Tableau de bord
        Route::get('/dashboard', [ClientController::class, 'index'])->name('client.dashboard');

        // Paramètres - affichage du formulaire
        Route::get('/settings', [ClientController::class, 'setting'])->name('client.setting');

        // Mise à jour des informations personnelles
        Route::put('/settings/update', [ClientController::class, 'updateProfile'])->name('client.updateProfile');
    });
});


