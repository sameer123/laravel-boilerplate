<?php
namespace App\Modules\Core\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
	/**
	 * Register the Core module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Core\Providers\RouteServiceProvider');

		$this->registerNamespaces();
		
		$this->registerConfig();
		$this->registerServiceProviders();
		$this->registerFacadeAliases();
		if ($this->app->environment() == 'local') {
			$this->registerServiceProviders('localProviders');
			$this->registerFacadeAliases('localAliases');
		}
	}

	/**
	 * Register the Core module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('core', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('core', realpath(__DIR__.'/../Resources/Views'));
	}
	
	/**
     	 * Register config.
     	 *
     	 * @return void
     	 */
    	protected function registerConfig()
    	{
	        $this->publishes([
	            __DIR__.'/../Config/config.php' => config_path('core.php'),
	        ]);
	        $this->mergeConfigFrom(
	            __DIR__.'/../Config/config.php', 'core'
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
        	$localProviders = $this->app['config']->get('core.'.$prividerConfig);
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
	        $facadeAliases = $this->app['config']->get('core.'.$aliasConfig);
	        foreach ($facadeAliases as $alias => $facade)
	        {
	            $loader->alias($alias, $facade);
	        }
    	}
}
