<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;


Route::prefix('admin')->group(function () {

    Route::controller(HomeController::class)->group(function () {
        // Tableau de bord
       Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');



   
    });
});
