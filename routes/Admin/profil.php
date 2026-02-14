<?php

use App\Http\Controllers\Admin\ProfilController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

    Route::controller(ProfilController::class)->group(function () {

        Route::get('/mon-profil', [ProfilController::class, 'profil'])->name('admin.monprofil');

        
        Route::post('/mon-profil/update', 'updateProfil')->name('admin.profil.update');

    });

});
