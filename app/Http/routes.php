<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');


Route::get('home', 'HomeController@index');

Route::get('products/sales', 'SalesController@index');
Route::get('products/sales/create/{name}', 'SalesController@create');
Route::post('products/sales/store', 'SalesController@store');
Route::get('products/sales/edit/{name}', 'SalesController@edit');
Route::patch('products/sales/update/{id}', 'SalesController@update');
Route::delete('products/sales/{id}', ['uses' => 'SalesController@destroy', 'as' => 'sales.destroy']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('users', 'UsersController');
Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');

//Profile Routes
Route::get('users/profile/create/{name}', 'ProfilesController@create');
Route::get('users/profile/show/{name}', 'ProfilesController@show');
Route::post('users/profile/store/{name}', 'ProfilesController@store');

// This route should be last
Route::get('/{name}', 'WelcomeController@show');

// delete later
Route::get('test', 'WelcomeController@Test');
