<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\CategorieController;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(CategorieController::class)->group(function () {

        // Listes des catégories 
        Route::get('/categories', [CategorieController::class, 'categorie'])->name('superadmin.categorie.index');

        // ajouter une catégorie
        Route::get('/creer/categorie', [CategorieController::class, 'addCategorie'])->name('superadmin.categorie.create');

        // modifier une catégorie
        Route::get('/modifier/categorie/{public_id}', [CategorieController::class, 'editCategorie'])->name('superadmin.categorie.edit');

        //envoie des infos de modif 
        Route::put('categorie/update/{public_id}', [CategorieController::class, 'updateCategorie'])->name('superadmin.categorie.update');


        //details d'une catégorie 
        Route::get('/details/categorie/{public_id}', [CategorieController::class, 'detailsCategorie'])->name('superadmin.categorie.show');

        Route::post('/creer/categorie/ajout', [CategorieController::class, 'store'])->name('superadmin.categorie.store');


        // Suppression
        Route::delete('categorie/delete/{public_id}', [CategorieController::class, 'deleteCategorie'])->name('superadmin.categorie.delete');

    });
    
});
