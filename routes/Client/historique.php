<?php

use App\Http\Controllers\Client\HistoriqueController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->middleware(['auth', 'verified', 'rolemanager:client'])->group(function () {

    Route::controller(HistoriqueController::class)->group(function () {
        
        // Listes des historiques du client
        Route::get('/mes/historiques', [HistoriqueController::class, 'index'])->name('client.historiques');

        //Details d'une historique
        Route::get('/historique/show', [HistoriqueController::class, 'show'])->name('client.historique.show');

        //supprimer une historique
        Route::get('/historique/delete', [HistoriqueController::class, 'delete'])->name('client.historique.delete');

        
    });
});


