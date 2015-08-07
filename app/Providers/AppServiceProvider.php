<?php namespace App\Providers;

use App\Category;
use App\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\library\ShoppingCart as ShoppingCart;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $page = '*';
        View::composer($page, function($view)
        {
            $view->with('categories',Category::all());
        });

        View::composer($page, function($view)
        {
            $shoppingCart = new ShoppingCart();
            $count = $shoppingCart->numberOfItems();
            $itemCount = '';

            if($count != 1)
            {
                $itemCount = "$count items";
            } else {
                $itemCount = "$count item";
            }

            $authCartCheck = $this->checkLogIn();


            $view->with([
                'itemCount'=> $itemCount,
                'authCartCheck' => $authCartCheck
            ]);
        });

        View::composer($page, function($view)
        {
            if(Sale::all() > 4)
            {
                $randomSales = Sale::all()->random(4);
                $view->with('randomSales', $randomSales);
            }
        });
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
	}

    private function checkLogIn()
    {

        if(Auth::check())
        {
            return action('OrdersController@show');
        } else{
            return  url('/auth/login');
        }
    }

}
