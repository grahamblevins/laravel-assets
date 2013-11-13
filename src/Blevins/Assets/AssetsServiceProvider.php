<?php namespace Blevins\Assets;

use Config;
use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider {

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

		$this->package('blevins/assets');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['blevins.assets'] = $this->app->share(function($app)
		{
			return new AssetsBuilder(Config::get('assets'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('blevins.assets');
	}

}