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
Route::get('products/sales/create/{id}', 'SalesController@create');
Route::post('products/sales/create/{id}', 'SalesController@store');
Route::get('products/sales/edit/{id}', 'SalesController@edit');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('users', 'UsersController');
Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');
Route::resource('sales', 'SalesController');

// delete later
Route::get('test', 'WelcomeController@Test');
