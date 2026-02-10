<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;

Route::prefix('admin')->group(function () {

    Route::controller(OrderController::class)->group(function () {

        // Listes des commandes passées
        Route::get('/commandes', [OrderController::class, 'commande'])->name('admin.order.index');

        // Status des commandes (avec vue kanban)
        Route::get('/commande/status', [OrderController::class, 'statusCommande'])->name('admin.order.status');

    });
});
