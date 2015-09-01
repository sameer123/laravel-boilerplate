<?php

return [
    'name' => 'CoreUi',
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
        hisorange\BrowserDetect\Provider\BrowserDetectService::class,
        Styde\Html\HtmlServiceProvider::class,
        Laracasts\Utilities\JavaScript\JavascriptServiceProvider::class,
        Arcanedev\NoCaptcha\Laravel\ServiceProvider::class,
    ],
    'localProviders' => [
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
        'BrowserDetect' => hisorange\BrowserDetect\Facade\Parser::class,
        'Alert'   => Styde\Html\Facades\Alert::class,
        'Field'   => Styde\Html\Facades\Field::class,
        'Menu'    => Styde\Html\Facades\Menu::class,
        'Form'    => Collective\Html\FormFacade::class,
        'Html'    => Collective\Html\HtmlFacade::class,
        'Access' => Styde\Html\Facades\Access::class,
        'JavaScript'=>Laracasts\Utilities\JavaScript\JavaScriptFacade::class,
        'Captcha' => Arcanedev\NoCaptcha\Laravel\Facade::class,
    ],
    'localAliases' => [
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
        \Styde\Html\Alert\Middleware::class,
    ],
    'localMiddlewares' => [
        // 'APP_TIDY' => Stolz\HtmlTidy\Middleware::class,   //example
    ],
];
