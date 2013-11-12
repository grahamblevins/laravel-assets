<?php namespace Blevins\Meta;

use Config;
use Illuminate\Support\ServiceProvider;

class MetaServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		include 'helpers.php';
		include 'macros.php';

		$this->package('blevins/meta');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['blevins.meta'] = $this->app->share(function($app)
		{
			return new MetaBuilder(Config::get('meta'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('blevins.meta');
	}

}