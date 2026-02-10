<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
Route::prefix('admin')->group(function () {
    
    Route::controller(AdminController::class)->group(function () {

    // Tableau de bord du supermAdmin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    


    });


});
