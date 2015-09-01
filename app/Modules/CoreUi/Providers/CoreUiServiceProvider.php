<?php
namespace App\Modules\CoreUi\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class CoreUiServiceProvider extends ServiceProvider
{
	/**
	 * Register the CoreUi module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\CoreUi\Providers\RouteServiceProvider');

		$this->registerNamespaces();
		
		$this->registerConfig();
		$this->registerServiceProviders();
		$this->registerFacadeAliases();
		$this->registerMiddlewares();
		if ($this->app->environment() == 'local') {
			$this->registerServiceProviders('localProviders');
			$this->registerFacadeAliases('localAliases');
			$this->registerMiddlewares('localMiddlewares');
		}
	}

	/**
	 * Register the CoreUi module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('core-ui', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('core-ui', realpath(__DIR__.'/../Resources/Views'));
	}
	
	/**
     	 * Register config.
     	 *
     	 * @return void
     	 */
    	protected function registerConfig()
    	{
	        $this->publishes([
	            __DIR__.'/../Config/config.php' => config_path('module.core-ui.php'),
	        ]);
	        $this->mergeConfigFrom(
	            __DIR__.'/../Config/config.php', 'module.core-ui'
	        );
    	}

    	/**
     	 * Merge the given configuration with the existing configuration.
     	 *
     	 * @param  string  $path
     	 * @param  string  $key
     	 * @return void
     	 */
    	protected function mergeConfigFrom($path, $key)
    	{
	        $config = $this->app['config']->get($key, []);
	
	        $this->app['config']->set($key, array_merge(require $path, $config));
    	}

    	/**
         * Loda local service providers
         */
    	protected function registerServiceProviders($prividerConfig='providers')
    	{
        	$localProviders = $this->app['config']->get('module.core-ui.'.$prividerConfig);
	        foreach ($localProviders as $provider)
	        {
	            $this->app->register($provider);
	        }
    	}

    	/**
         * Load additional Aliases
         * Base file Alias load is /config/app.php => aliases
         */
    	public function registerFacadeAliases($aliasConfig='aliases')
    	{
	        $loader = AliasLoader::getInstance();
	        $facadeAliases = $this->app['config']->get('module.core-ui.'.$aliasConfig);
	        foreach ($facadeAliases as $alias => $facade)
	        {
	            $loader->alias($alias, $facade);
	        }
    	}
    	/**
         * Load additional Middlewares
         * Base file Middlewares load is /config.php => middlewares
         */
        public function registerMiddlewares($middlewareConfig='middlewares')
        {
            $kernel = $this->app->make('Illuminate\Contracts\Http\Kernel');
            $middlewares = $this->app['config']->get('module.core-ui.'.$middlewareConfig);
            foreach ($middlewares as $condition => $middleware)
            {
                if (env($condition) && true) {
                    $kernel->pushMiddleware($middleware);
                }
            }
        }
}
