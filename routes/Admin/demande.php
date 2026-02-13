<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DemandeController;

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

    Route::controller(DemandeController::class)->group(function () {

        // Listes des demandes passées
        Route::get('/demandes', [DemandeController::class, 'demande'])->name('admin.demande.index');

        // Renseigné une demande
        Route::get('/repondre/demande', [DemandeController::class, 'repondreDemande'])->name('admin.demande.repondre');

    });

});
