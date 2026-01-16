<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\ProfilController;

Route::prefix('superadmin')->group(function () {

    Route::controller(ProfilController::class)->group(function () {  
        // Listes des stocks
        Route::get('/mon-profil', [ProfilController::class, 'profil'])->name('superadmin.monprofil');


        // Ajouter un stock
        Route::get('/utilisateur/ajouter', [ProfilController::class, 'addUser'])->name('superadmin.user.create');
        // Modifier un stock
        Route::get('/utilisateur/modifier', [ProfilController::class, 'editUser'])->name('superadmin.user.edit');

        // Voir les détails d'un stock
        Route::get('/utilisateur/details', [ProfilController::class, 'detailsUser'])->name('superadmin.user.show');

    });
    
});
