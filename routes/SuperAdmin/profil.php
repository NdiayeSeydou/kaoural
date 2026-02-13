<?php

use App\Http\Controllers\SuperAdmin\ProfilController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(ProfilController::class)->group(function () {
        // Listes des stocks
        Route::get('/mon-profil', [ProfilController::class, 'profil'])->name('superadmin.monprofil');

        // Route pour enregistrer les modifications du profil
        Route::post('/mon-profil/update', 'updateProfil')->name('superadmin.profil.update');

        

    });

});
