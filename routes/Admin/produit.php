<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;

// les produits (ventes)

// affiche la liste des produits
Route::get('/products', [ProductsController::class, 'index'])
    ->name('admin.products.index');

// vue ajout produit
Route::get('/products/create', [ProductsController::class, 'create'])
    ->name('admin.products.create');

// enregistrement produit
Route::post('/products/store', [ProductsController::class, 'store'])
    ->name('admin.products.store');

// détails produit (ID chiffré)
Route::get('/products/{encryptedId}', [ProductsController::class, 'show'])
    ->name('admin.products.show');

// page édition
Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])
    ->name('admin.products.edit');

// mise à jour
Route::put('/products/{product}/update', [ProductsController::class, 'update'])
    ->name('admin.products.update');

// suppression
Route::delete('/products/delete/{stock}', [ProductsController::class, 'destroy'])
    ->name('admin.products.destroy');
// fin des produits (ventes)
