<?php

use App\Http\Controllers\SuperAdmin\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {

    Route::controller(OrderController::class)->group(function () {

        Route::get('/commandes', [OrderController::class, 'commande'])->name('superadmin.order.index');

        Route::get('/commande/status', [OrderController::class, 'statusCommande'])->name('superadmin.order.status');

        Route::get('/orders/{public_id}', [OrderController::class, 'show'])->name('superadmin.orders.show');

        Route::get('/superadmin/orders/{public_id}/valider', [OrderController::class, 'valider'])->name('superadmin.orders.valider');

        Route::get('/superadmin/orders/{public_id}/modifier', [OrderController::class, 'edit'])->name('superadmin.orders.edit');


        Route::put('/superadmin/orders/{public_id}/status', [OrderController::class, 'updateStatus'])->name('superadmin.orders.updateStatus');

        Route::delete('/superadmin/orders/{public_id}', [OrderController::class, 'destroy'])->name('superadmin.orders.destroy');

        Route::get('/commande/status/kanban', [OrderController::class, 'status'])->name('superadmin.order.kanban');

        Route::post('/commande/update-status-ajax', [OrderController::class, 'updateStatusAjax'])
    ->name('superadmin.orders.updateStatusAjax');


        

    });
});
