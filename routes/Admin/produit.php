<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProduitController;

Route::prefix('admin')->group(function () {

    Route::controller(ProduitController::class)->group(function () {

        // Listes des produits 
        Route::get('/produits', [ProduitController::class, 'produit'])->name('admin.produit.index');

        // ajouter un produit 
        Route::get('/creer/produit', [ProduitController::class, 'addProduit'])->name('admin.produit.create');

        Route::post('/store/produit', [ProduitController::class, 'storeProduit'])->name('admin.produit.store');

        // modifier un produit
        Route::get('/modifier/produit/{public_id}', [ProduitController::class, 'editProduit'])->name('admin.produit.edit');

        Route::put('/update/produit/{public_id}', [ProduitController::class, 'updateProduit'])->name('admin.produit.update');

        // voir le details d'un produit 
        Route::get('/details/produit/{public_id}', [ProduitController::class, 'detailsProduit'])->name('admin.produit.show');

        Route::delete('/delete/produit/{public_id}', [ProduitController::class, 'deleteProduit'])->name('admin.produit.delete');
    });
});
