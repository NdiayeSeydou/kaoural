<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;

Route::prefix('admin')->middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

    Route::controller(CategorieController::class)->group(function () {

        // Listes des catégories 
        Route::get('/categories', [CategorieController::class, 'categorie'])->name('admin.categorie.index');

        // ajouter une catégorie
        Route::get('/creer/categorie', [CategorieController::class, 'addCategorie'])->name('admin.categorie.create');

        // modifier une catégorie
        Route::get('/modifier/categorie/{public_id}', [CategorieController::class, 'editCategorie'])->name('admin.categorie.edit');

        //envoie des infos de modif 
        Route::put('categorie/update/{public_id}', [CategorieController::class, 'updateCategorie'])->name('admin.categorie.update');


        //details d'une catégorie 
        Route::get('/details/categorie/{public_id}', [CategorieController::class, 'detailsCategorie'])->name('admin.categorie.show');

        Route::post('/creer/categorie/ajout', [CategorieController::class, 'store'])->name('admin.categorie.store');


        // Suppression
        Route::delete('categorie/delete/{public_id}', [CategorieController::class, 'deleteCategorie'])->name('admin.categorie.delete');

    });
    
});
