<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StockController;

Route::prefix('admin')->group(function () {

    Route::controller(StockController::class)->group(function () {

        // Listes des stocks
        Route::get('/stocks', [StockController::class, 'stock'])->name('admin.stock.index');


        // Ajouter un stock
        Route::get('/stock/ajouter', [StockController::class, 'addStock'])->name('admin.stock.create');


        // Modifier un stock
        Route::get('/stock/modifier/{public_id}', [StockController::class, 'editStock'])->name('admin.stock.edit');

        // Voir les détails d'un stock
        Route::get('/stock/details/{public_id}', [StockController::class, 'detailsStock'])->name('admin.stock.show');


        //méthode pour ajouter un nouveau stock 

        Route::post('/stock/ajouter/nouveau', [StockController::class, 'storeNouveauProduit'])->name('admin.stock.nouveau');


        //méthode pour ajouter un ancien stock 
        Route::post('/stock/ajouter/ancien', [StockController::class, 'storeProduitExistant'])->name('admin.stock.ancien');

        //envoie des infos pour la modification 
        Route::put('/stock/modifier/{public_id}', [StockController::class, 'updateStock'])->name('admin.stock.modifier');


        // Supprimer un stock
        Route::delete('/stock/supprimer/{public_id}', [StockController::class, 'destroyStock'])->name('admin.stock.supprimer');

        // web.php
        Route::get('/admin/stock/search', [StockController::class, 'searchStock'])->name('admin.stock.search');


        Route::get('/stock/history/{public_id}/edit', [StockController::class, 'editHistory'])->name('admin.stock.history.edit');


        Route::put('/stock/history/{public_id}', [StockController::class, 'updateHistory'])->name('admin.stock.history.update');


        Route::delete('/stock/history/{public_id}', [StockController::class, 'destroyHistory'])->name('admin.stock.history.destroy');

    });
});
