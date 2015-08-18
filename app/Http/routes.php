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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('users', 'UsersController');
Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');
Route::resource('roles', 'RolesController');

// Sales Controller Route
Route::get('products/sales', 'SalesController@index');
Route::get('products/sales/create/{name}', 'SalesController@create');
Route::post('products/sales/store', 'SalesController@store');
Route::get('products/sales/edit/{name}', 'SalesController@edit');
Route::patch('products/sales/update/{id}', 'SalesController@update');
Route::delete('products/sales/{id}', ['uses' => 'SalesController@destroy', 'as' => 'sales.destroy']);

//Profile Countroller Routes
Route::get('users/profile/create/{name}', 'ProfilesController@create');
Route::get('users/profile/show/{name}', 'ProfilesController@show');
Route::post('users/profile/store/{name}', 'ProfilesController@store');
Route::get('users/profile/edit/{name}', 'ProfilesController@edit');
Route::patch('users/profile/update/{name}', 'ProfilesController@update');
Route::delete('users/profile/delete/{id}', ['uses' => 'ProfilesController@destroy', 'as' => 'profile.destroy']);


//Address Controller Routes
Route::get('users/order/address/create/{name}', 'AddressesController@create');
Route::post('users/order/address/store/{id}', 'AddressesController@store');
Route::get('users/order/address/select_address/{name}', 'AddressesController@select');
Route::get('users/order/address/edit/{id}', 'AddressesController@edit');
Route::patch('users/order/address/update/{id}', 'AddressesController@update');
Route::delete('users/order/address/delete/{id}', ['uses' => 'AddressesController@destroy', 'as' => 'address.destroy']);

// AddRole Controller Routes
Route::get('users/role/create/{name}', 'AddRolesController@create');
Route::post('users/role/store/{id}', 'AddRolesController@store');
Route::delete('users/role/delete/{id}/{role}', ['uses' => 'AddRolesController@destroy', 'as' => 'AddRoles.destroy']);

// Order Controller Routes
Route::get('orders/', 'OrdersController@index');
Route::get('order/remove_item/{id}', 'OrdersController@destroy');
Route::post('order/update_quantity', 'OrdersController@updateQuantity');
Route::post('order/store_address', 'OrdersController@addAddress');
Route::get('order/confirm', 'OrdersController@create');
Route::get('order/processing', 'OrdersController@store');
Route::get('order/processed', 'OrdersController@processed');
Route::get('order/', 'OrdersController@show');
Route::get('order/view/{id}', 'OrdersController@view');
Route::patch('order/shipping_date/{id}', 'OrdersController@updateShipping');

// Validation Controller Routes
Route::get('register/check/username/{name}', ['uses' => 'ValidationController@checkUserName', 'as' => 'checkName']);
Route::get('register/check/email/{name}', ['uses' => 'ValidationController@checkEmail', 'as' => 'checkName']);

// Welcome Controller Routes
Route::get('catalog/product/{name}', 'WelcomeController@show');
Route::post('catalog/store', 'WelcomeController@store');
Route::get('catalog/{name}', 'WelcomeController@display');




