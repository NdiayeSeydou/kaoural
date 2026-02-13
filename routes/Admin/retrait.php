<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RetraitStockController;

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

    Route::controller(RetraitStockController::class)->group(function () {
        
      
    });
});
