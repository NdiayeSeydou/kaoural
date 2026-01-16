<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\ProduitController;

Route::prefix('superadmin')->group(function () {

    Route::controller(ProduitController::class)->group(function () {
        // Listes des produits 
        Route::get('/produits', [ProduitController::class, 'produit'])->name('superadmin.produit.index');

        // ajouter un produit 
        Route::get('/creer/produit', [ProduitController::class, 'addProduit'])->name('superadmin.produit.create');

        // modifier un produit
        Route::get('/modifier/produit', [ProduitController::class, 'editProduit'])->name('superadmin.produit.edit');

        // voir le details d'un produit 
        Route::get('/details/produit', [ProduitController::class, 'detailsProduit'])->name('superadmin.produit.show');

    });
    
});
