<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\RetraitStockController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(RetraitStockController::class)->group(function () {
        
      
    });
});
