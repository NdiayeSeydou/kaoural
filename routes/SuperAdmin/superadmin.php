<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {
    Route::controller(SuperAdminController::class)->group(function () {
        // Tableau de bord
       Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');

    // Paramètres - affichage du formulaire
    Route::get('/settings', [SuperAdminController::class, 'setting'])->name('superadmin.setting');

    // Mise à jour des informations personnelles
    Route::put('/settings/update', [SuperAdminController::class, 'updateProfile'])->name('superadmin.updateProfile');
    });
});
