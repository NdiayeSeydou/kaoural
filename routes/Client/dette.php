<?php

use App\Http\Controllers\Client\CreanceController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function () {

    Route::controller(CreanceController::class)->group(function () {
        
        // Listes des créances du client
        Route::get('/mes/creances', [CreanceController::class, 'index'])->name('client.creances');

        //Details d'une créance
        Route::get('/creance/show', [CreanceController::class, 'show'])->name('client.creance.show');

        
        //supprimer une créance
        Route::get('/creance/delete', [CreanceController::class, 'delete'])->name('client.creance.delete');


    });
});


