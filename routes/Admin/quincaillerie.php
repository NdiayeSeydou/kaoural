<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuincaillerieController;

Route::prefix('admin')->group(function () {

    Route::controller(QuincaillerieController::class)->group(function () {

        // Listes des stocks
        Route::get('/Quincailleries', [QuincaillerieController::class, 'quincaillerie'])->name('admin.quincaillerie.index');


        // Ajouter un stock
        Route::get('/quincaillerie/ajouter', [QuincaillerieController::class, 'addQuincaillerie'])->name('admin.quincaillerie.create');


        Route::post('/quincaillerie/ajouter/store', [QuincaillerieController::class, 'store'])->name('admin.quincaillerie.store');

        // Modifier un stock
        Route::get('/quincaillerie/modifier/{public_id}', [QuincaillerieController::class, 'editQuincaillerie'])->name('admin.quincaillerie.edit');

        // Voir les détails d'un stock
        Route::get('/quincaillerie/{public_id}/details', [QuincaillerieController::class, 'detailsQuincaillerie'])->name('admin.quincaillerie.show');


        Route::put('/quincaillerie/modifier/{public_id}', [QuincaillerieController::class, 'update'])->name('admin.quincaillerie.update');



        Route::delete('/quincaillerie/{public_id}/supprimer', [QuincaillerieController::class, 'destroy'])->name('admin.quincaillerie.delete');

        // ajouter un retrait de produit 
        Route::get('/quincaillerie/{public_id}/retrait', [QuincaillerieController::class, 'addretrait'])->name('admin.quincaillerie.retrait');


        Route::post('/quincaillerie/{public_id}/produit', [QuincaillerieController::class, 'ajoutstore'])->name('admin.quincaillerie.ajoutstore');



        Route::get('/quincaillerie/modifier/produit/{public_id}', [QuincaillerieController::class, 'editRetrait'])->name('admin.quincaillerie.editRetrait');


        Route::post('/quincaillerie/modifier/produit/{public_id}', [QuincaillerieController::class, 'updateRetrait'])->name('admin.quincaillerie.updateRetrait');


        Route::get('/quincaillerie/search-stock', [QuincaillerieController::class, 'searchStock'])->name('admin.quincaillerie.searchStock');


        Route::get('/quincaillerie/get-designation', [QuincaillerieController::class, 'getDesignation'])->name('admin.quincaillerie.getDesignation');




        // Supprimer un produit retiré
        Route::delete('/quincaillerie/produit/{public_id}', [QuincaillerieController::class, 'destroyRetrait'])->name('admin.quincaillerie.destroyRetrait');
    });
});
