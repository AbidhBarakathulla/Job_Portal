<?php


use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'checkAge' => \App\Http\Middleware\CheckAge::class,
        ]); // custom middleware register
            $middleware->validateCsrfTokens(
                except: ['stripe/*', 'login']
                ); // validate login form with csrf token
           
    }) 
    ->withSchedule(function(Schedule $schedule){
        $schedule->command('app:display-table')->everyFiveSeconds();
    })

    ->withExceptions(function (Exceptions $exceptions) {
       
    })->create();
        // other middleware...
   