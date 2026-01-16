<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\StockController;

Route::prefix('superadmin')->group(function () {

    Route::controller(StockController::class)->group(function () {

        // Listes des stocks
        Route::get('/stocks', [StockController::class, 'stock'])->name('superadmin.stock.index');


        // Ajouter un stock
        Route::get('/stock/ajouter', [StockController::class, 'addStock'])->name('superadmin.stock.create');


        // Modifier un stock
        Route::get('/stock/modifier', [StockController::class, 'editStock'])->name('superadmin.stock.edit');

        // Voir les détails d'un stock
        Route::get('/stock/details', [StockController::class, 'detailsStock'])->name('superadmin.stock.show');
    });
    
});
