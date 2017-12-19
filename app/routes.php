<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/signin', [
	'uses' => 'UserController@getSignin',
	'as' => 'signin',
]);

Route::post('/signin', [
	'uses' => 'UserController@postSignin',
]);

Route::get('signout', [
	'uses' => 'UserController@getSignout',
	'as' => 'signout'
]);


Route::group(['before' => 'auth'], function(){
    Route::get('/', [
    	'as'	=> 'index',
    	'uses' => 'BaseController@index',
    ]);


	Route::resource('company', 'CompanyController');
	Route::resource('user', 'UserController');
	Route::resource('category', 'CategoryController');
	Route::resource('server', 'ServerController');
	Route::resource('provider', 'ProviderController');
	Route::resource('login', 'LoginController');
	Route::resource('domain', 'DomainController');
	Route::resource('project', 'ProjectController');
	Route::resource('line', 'LineController');
	Route::resource('charge', 'ChargeController');
});

