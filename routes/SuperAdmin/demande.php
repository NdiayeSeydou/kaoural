<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DemandeController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(DemandeController::class)->group(function () {

        // Listes des demandes passées
        Route::get('/demandes', [DemandeController::class, 'demande'])->name('superadmin.demande.index');

        // Renseigné une demande
        Route::get('/repondre/demande', [DemandeController::class, 'repondreDemande'])->name('superadmin.demande.repondre');

    });

});
