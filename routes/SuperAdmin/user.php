<?php

use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->group(function () {

    Route::controller(UserController::class)->group(function () {

        Route::get('/utilisateurs', 'user')->name('superadmin.user.index');

        Route::get('/utilisateur/ajouter', 'addUser')->name('superadmin.user.create');

        Route::post('/utilisateur/ajouter', 'storeUser')->name('superadmin.user.store');

        Route::get('/utilisateur/modifier/{public_id}', 'editUser')->name('superadmin.user.edit');

        Route::put('/utilisateur/modifier/{public_id}', 'updateUser')->name('superadmin.user.update');

        Route::get('/utilisateur/details/{public_id}', 'detailsUser')->name('superadmin.user.show');

        Route::delete('/utilisateur/supprimer/{public_id}', 'destroyUser')->name('superadmin.user.destroy');

        Route::patch('/utilisateur/statut/{public_id}', [UserController::class, 'toggleStatus'])->name('superadmin.user.toggle');

    });


    }); 
