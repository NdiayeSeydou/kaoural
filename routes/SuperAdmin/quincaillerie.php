<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\QuincaillerieController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(QuincaillerieController::class)->group(function () {

        // Listes des stocks
        Route::get('/Quincailleries', [QuincaillerieController::class, 'quincaillerie'])->name('superadmin.quincaillerie.index');


        // Ajouter un stock
        Route::get('/quincaillerie/ajouter', [QuincaillerieController::class, 'addQuincaillerie'])->name('superadmin.quincaillerie.create');


        Route::post('/quincaillerie/ajouter/store', [QuincaillerieController::class, 'store'])->name('superadmin.quincaillerie.store');

        // Modifier un stock
        Route::get('/quincaillerie/modifier/{public_id}', [QuincaillerieController::class, 'editQuincaillerie'])->name('superadmin.quincaillerie.edit');

        // Voir les détails d'un stock
        Route::get('/quincaillerie/{public_id}/details', [QuincaillerieController::class, 'detailsQuincaillerie'])->name('superadmin.quincaillerie.show');


        Route::put('/quincaillerie/modifier/{public_id}', [QuincaillerieController::class, 'update'])->name('superadmin.quincaillerie.update');



        Route::delete('/quincaillerie/{public_id}/supprimer', [QuincaillerieController::class, 'destroy'])->name('superadmin.quincaillerie.delete');

        // ajouter un retrait de produit 
        Route::get('/quincaillerie/{public_id}/retrait', [QuincaillerieController::class, 'addretrait'])->name('superadmin.quincaillerie.retrait');


        Route::post('/quincaillerie/{public_id}/produit', [QuincaillerieController::class, 'ajoutstore'])->name('superadmin.quincaillerie.ajoutstore');



        Route::get('/quincaillerie/modifier/produit/{public_id}', [QuincaillerieController::class, 'editRetrait'])->name('superadmin.quincaillerie.editRetrait');


        Route::post('/quincaillerie/modifier/produit/{public_id}', [QuincaillerieController::class, 'updateRetrait'])->name('superadmin.quincaillerie.updateRetrait');


        Route::get('/quincaillerie/search-stock', [QuincaillerieController::class, 'searchStock'])->name('superadmin.quincaillerie.searchStock');


        Route::get('/quincaillerie/get-designation', [QuincaillerieController::class, 'getDesignation'])->name('superadmin.quincaillerie.getDesignation');




        // Supprimer un produit retiré
        Route::delete('/quincaillerie/produit/{public_id}', [QuincaillerieController::class, 'destroyRetrait'])->name('superadmin.quincaillerie.destroyRetrait');
    });
});
