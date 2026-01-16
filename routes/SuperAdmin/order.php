<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\OrderController;

Route::prefix('superadmin')->group(function () {

    Route::controller(OrderController::class)->group(function () {

        // Listes des commandes passées
        Route::get('/commandes', [OrderController::class, 'commande'])->name('superadmin.order.index');

        // Status des commandes (avec vue kanban)
        Route::get('/commande/status', [OrderController::class, 'statusCommande'])->name('superadmin.order.status');

    });
});
