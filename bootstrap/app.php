<?php

use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CountryCheck;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //


        // Group middleware setup
        $middleware->appendToGroup('check1', [
            AgeCheck::class,
            CountryCheck::class,
        ]);
        // Next go to web.php, add where to use it
        // ->middleware('check1')



        // Single middleware setup
        // $middleware->append(AgeCheck::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
