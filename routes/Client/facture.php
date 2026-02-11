<?php

use App\Http\Controllers\Client\FactureController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function () {

    Route::controller(FactureController::class)->group(function () {
        
        // Listes des factures du client
        Route::get('/mes/factures', [FactureController::class, 'index'])->name('client.factures');

        //Details d'une facture
        Route::get('/facture/show', [FactureController::class, 'show'])->name('client.facture.show');


        //supprimer une facture
        Route::get('/facture/delete', [FactureController::class, 'delete'])->name('client.facture.delete');

        
    });
});


