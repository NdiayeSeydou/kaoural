<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\QuincaillerieController;

Route::prefix('superadmin')->group(function () {

    Route::controller(QuincaillerieController::class)->group(function () {  
        
        // Listes des stocks
        Route::get('/Quincailleries', [QuincaillerieController::class, 'quincaillerie'])->name('superadmin.quincaillerie.index');


        // Ajouter un stock
        Route::get('/quincaillerie/ajouter', [QuincaillerieController::class, 'addQuincaillerie'])->name('superadmin.quincaillerie.create');

        // Modifier un stock
        Route::get('/quincaillerie/modifier', [QuincaillerieController::class, 'editQuincaillerie'])->name('superadmin.quincaillerie.edit');

        // Voir les détails d'un stock
        Route::get('/quincaillerie/details', [QuincaillerieController::class, 'detailsQuincaillerie'])->name('superadmin.quincaillerie.show');


        // ajouter un retrait de produit 
        Route::get('/quincaillerie/retrait/produit', [QuincaillerieController::class, 'retraitProduit'])->name('superadmin.quincaillerie.retrait');


        // Modifier un retrait 
        Route::get('/quincaillerie/modifier/produit', [QuincaillerieController::class, 'editRetrait'])->name('superadmin.quincaillerie.produit');

        

    });
    
});
