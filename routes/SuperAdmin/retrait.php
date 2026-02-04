<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\RetraitStockController;

Route::prefix('superadmin')->group(function () {

    Route::controller(RetraitStockController::class)->group(function () {
        
      
    });
});
