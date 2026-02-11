<?php

use App\Http\Controllers\Client\DevisController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function () {

    Route::controller(DevisController::class)->group(function () {
        
        // Listes des créances du client
        Route::get('/mes/devis', [DevisController::class, 'index'])->name('client.devis');

        //Details d'une créance
        Route::get('/devis/show', [DevisController::class, 'show'])->name('client.devis.show');


        // Créer un nouveau devis
        Route::get('/devis/create', [DevisController::class, 'create'])->name('client.devis.create');

        //mettre à jour un devis
        Route::get('/devis/update', [DevisController::class, 'update'])->name('client.devis.update');

        //supprimer un devis
        Route::get('/devis/delete', [DevisController::class, 'delete'])->name('client.devis.delete');

        
    });
});


