<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        view()->composer('_includes._cart', function($view)
        {
            $items = 0;

            if($items = 1) {
                $cartMessage = $items . "Item";
            } else {
                $cartMessage = $items . "Items";
            }

            $view->with('cartMessage', $cartMessage);
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
