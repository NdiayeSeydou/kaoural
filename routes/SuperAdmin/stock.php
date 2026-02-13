<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\StockController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(StockController::class)->group(function () {

        // Listes des stocks
        Route::get('/stocks', [StockController::class, 'stock'])->name('superadmin.stock.index');


        // Ajouter un stock
        Route::get('/stock/ajouter', [StockController::class, 'addStock'])->name('superadmin.stock.create');


        // Modifier un stock
        Route::get('/stock/modifier/{public_id}', [StockController::class, 'editStock'])->name('superadmin.stock.edit');

        // Voir les détails d'un stock
        Route::get('/stock/details/{public_id}', [StockController::class, 'detailsStock'])->name('superadmin.stock.show');


        //méthode pour ajouter un nouveau stock 

        Route::post('/stock/ajouter/nouveau', [StockController::class, 'storeNouveauProduit'])->name('superadmin.stock.nouveau');


        //méthode pour ajouter un ancien stock 
        Route::post('/stock/ajouter/ancien', [StockController::class, 'storeProduitExistant'])->name('superadmin.stock.ancien');

        //envoie des infos pour la modification 
        Route::put('/stock/modifier/{public_id}', [StockController::class, 'updateStock'])->name('superadmin.stock.modifier');


        // Supprimer un stock
        Route::delete('/stock/supprimer/{public_id}', [StockController::class, 'destroyStock'])->name('superadmin.stock.supprimer');

        // web.php
        Route::get('/superadmin/stock/search', [StockController::class, 'searchStock'])->name('superadmin.stock.search');


        Route::get('/stock/history/{public_id}/edit', [StockController::class, 'editHistory'])->name('superadmin.stock.history.edit');


        Route::put('/stock/history/{public_id}', [StockController::class, 'updateHistory'])->name('superadmin.stock.history.update');


        Route::delete('/stock/history/{public_id}', [StockController::class, 'destroyHistory'])->name('superadmin.stock.history.destroy');

    });
});
