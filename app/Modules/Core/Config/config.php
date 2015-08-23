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
    ],
    'localProviders' => [
        Laracasts\Generators\GeneratorsServiceProvider::class,
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
    ],
    'localAliases' => [
    ],
];
