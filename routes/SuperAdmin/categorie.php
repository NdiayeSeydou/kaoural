<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\CategorieController;

Route::prefix('superadmin')->group(function () {

    Route::controller(CategorieController::class)->group(function () {
        // Listes des catégories 
        Route::get('/categories', [CategorieController::class, 'categorie'])->name('superadmin.categorie.index');

        // ajouter une catégorie
        Route::get('/creer/categorie', [CategorieController::class, 'addCategorie'])->name('superadmin.categorie.create');

        // modifier une catégorie
        Route::get('/modifier/categorie', [CategorieController::class, 'editCategorie'])->name('superadmin.categorie.edit');

        // voir le details d'une catégorie
        Route::get('/details/categorie', [CategorieController::class, 'detailsCategorie'])->name('superadmin.categorie.show');


    });
    
});
