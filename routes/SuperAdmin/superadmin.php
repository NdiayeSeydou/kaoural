<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
Route::prefix('superadmin')->group(function () {
    
    Route::controller(SuperAdminController::class)->group(function () {

    // Tableau de bord du supermAdmin
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');

    // Profil 
    Route::get('/settings', [SuperAdminController::class, 'setting'])->name('superadmin.setting');

    // Mise à jour des informations personnelles
    Route::put('/settings/update', [SuperAdminController::class, 'updateProfile'])->name('superadmin.updateProfile');

    });


});
