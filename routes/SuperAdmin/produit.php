<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\ProduitController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(ProduitController::class)->group(function () {

        // Listes des produits 
        Route::get('/produits', [ProduitController::class, 'produit'])->name('superadmin.produit.index');

        // ajouter un produit 
        Route::get('/creer/produit', [ProduitController::class, 'addProduit'])->name('superadmin.produit.create');

        Route::post('/store/produit', [ProduitController::class, 'storeProduit'])->name('superadmin.produit.store');

        // modifier un produit
        Route::get('/modifier/produit/{public_id}', [ProduitController::class, 'editProduit'])->name('superadmin.produit.edit');

        Route::put('/update/produit/{public_id}', [ProduitController::class, 'updateProduit'])->name('superadmin.produit.update');

        // voir le details d'un produit 
        Route::get('/details/produit/{public_id}', [ProduitController::class, 'detailsProduit'])->name('superadmin.produit.show');

        Route::delete('/delete/produit/{public_id}', [ProduitController::class, 'deleteProduit'])->name('superadmin.produit.delete');
    });
});
