<?php

use App\Http\Controllers\Client\ProfilController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function () {

    Route::controller(ProfilController::class)->group(function () {

        
        // Listes des profils du client
        Route::get('/mes/profils', [ProfilController::class, 'index'])->name('client.profils');

        //Details d'une profil
        Route::get('/profil/show', [ProfilController::class, 'show'])->name('client.profil.show');

        //mettre à jour un profil
        Route::get('/profil/update', [ProfilController::class, 'update'])->name('client.profil.update');

        //supprimer une profil
        Route::get('/profil/delete', [ProfilController::class, 'delete'])->name('client.profil.delete');
        
    });
});


