<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfilController;

Route::prefix('admin')->group(function () {

    Route::controller(ProfilController::class)->group(function () {  
        // Listes des stocks
        Route::get('/mon-profil', [ProfilController::class, 'profil'])->name('admin.monprofil');


        // Ajouter un stock
        Route::get('/utilisateur/ajouter', [ProfilController::class, 'addUser'])->name('admin.user.create');
        // Modifier un stock
        Route::get('/utilisateur/modifier', [ProfilController::class, 'editUser'])->name('admin.user.edit');

        // Voir les détails d'un stock
        Route::get('/utilisateur/details', [ProfilController::class, 'detailsUser'])->name('admin.user.show');

    });
    
});
