<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\UserController;

Route::prefix('superadmin')->group(function () {

    Route::controller(UserController::class)->group(function () {  
        
        // Listes des stocks
        Route::get('/utilisateurs', [UserController::class, 'user'])->name('superadmin.user.index');


        // Ajouter un stock
        Route::get('/utilisateur/ajouter', [UserController::class, 'addUser'])->name('superadmin.user.create');

        // Modifier un stock
        Route::get('/utilisateur/modifier', [UserController::class, 'editUser'])->name('superadmin.user.edit');

        // Voir les détails d'un stock
        Route::get('/utilisateur/details', [UserController::class, 'detailsUser'])->name('superadmin.user.show');

    });
    
});
