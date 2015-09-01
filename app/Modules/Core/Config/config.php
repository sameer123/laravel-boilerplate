<?php

return [
    'name' => 'Core',
    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your module. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [
        Barryvdh\Debugbar\ServiceProvider::class,
        Prettus\Repository\Providers\RepositoryServiceProvider::class,
        hisorange\BrowserDetect\Provider\BrowserDetectService::class,
        Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class,
    ],
    'localProviders' => [
        Laracasts\Generators\GeneratorsServiceProvider::class,
        Stolz\HtmlTidy\ServiceProvider::class,
        Lord\Laroute\LarouteServiceProvider::class,
        Clockwork\Support\Laravel\ClockworkServiceProvider::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */
    'aliases' => [
        'Debugbar' => Barryvdh\Debugbar\Facade::class,
        'BrowserDetect' => hisorange\BrowserDetect\Facade\Parser::class,
    ],
    'localAliases' => [
        'Clockwork' => Clockwork\Support\Laravel\Facade::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Class Middlewares
    |--------------------------------------------------------------------------
    |
    | This array of class Middlewares will be registered when this application
    | is started.
    |
    */
    'middlewares' => [

    ],
    'localMiddlewares' => [
        'APP_TIDY' => Stolz\HtmlTidy\Middleware::class,
        'APP_CLOCKWORK' => Clockwork\Support\Laravel\ClockworkMiddleware::class,
    ],
];
