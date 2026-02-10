<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RetraitStockController;

Route::prefix('admin')->group(function () {

    Route::controller(RetraitStockController::class)->group(function () {
        
      
    });
});
