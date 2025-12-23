<?php

// use App\Http\Middleware\SessionFermer;
// use App\Http\Middleware\SessionFerme;
// use App\Http\Middleware\SessionFermee;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RoleManager;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'rolemanager' => RoleManager::class,
            //pour l'admin 
            // 'session.fermee' => SessionFermee::class,
            //pour le patissier 
            // 'session.fermer' => SessionFermer::class,
            // 'session.ferme' => SessionFerme::class,
            



        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
