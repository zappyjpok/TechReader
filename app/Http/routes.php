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
Route::resource('roles', 'RolesController');

//Profile Routes
Route::get('users/profile/create/{name}', 'ProfilesController@create');
Route::get('users/profile/show/{name}', 'ProfilesController@show');
Route::post('users/profile/store/{name}', 'ProfilesController@store');
Route::get('users/profile/edit/{name}', 'ProfilesController@edit');
Route::patch('users/profile/update/{name}', 'ProfilesController@update');
Route::delete('users/profile/delete/{id}', ['uses' => 'ProfilesController@destroy', 'as' => 'profile.destroy']);

//Address Routes
Route::get('users/order/address/create/{name}', 'AddressesController@create');
Route::post('users/order/address/store/{id}', 'AddressesController@store');
Route::get('users/order/address/select_address/{name}', 'AddressesController@select');
Route::get('users/order/address/edit/{id}', 'AddressesController@edit');
Route::patch('users/order/address/update/{id}', 'AddressesController@update');
Route::delete('users/order/address/delete/{id}', ['uses' => 'AddressesController@destroy', 'as' => 'address.destroy']);

// delete later
Route::get('test', 'WelcomeController@Test');

// This route should be last
Route::get('catalog/{name}', 'WelcomeController@show');
Route::get('category/{name}', 'WelcomeController@display');


