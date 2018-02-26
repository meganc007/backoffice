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
	'as' => 'signout',
]);

Route::get('forgotpassword', [
	'uses' => 'PasswordController@getForgotPassword',
	'as' => 'forgot',
]);

Route::post('forgotpassword', [
	'uses' => 'PasswordController@postForgotPassword',
	'as' => 'forgot',
]);

Route::get('resetpassword/{email}/{reset_token}', [
	'uses' => 'PasswordController@getResetPassword',
	'as' => 'reset',
]);

Route::post('resetpassword/{email}/{reset_token}', [
	'uses' => 'PasswordController@postResetPassword',
	'as' => 'reset',
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

	Route::get('project/change', [
		'as' => 'project.ajaxchange',
		'uses' => 'ProjectController@change',
	]);
	
	Route::resource('project', 'ProjectController');
	Route::resource('line', 'LineController');

	Route::get('charge/change', [
		'as' => 'charge.ajaxchange',
		'uses' => 'ChargeController@change',
	]);

	Route::resource('charge', 'ChargeController');

	Route::get('comment/change', [
		'as' => 'comment.ajaxchange',
		'uses' => 'CommentController@change',
	]);

	Route::get('comment/linechange', [
		'as' => 'comment.linechange',
		'uses' => 'CommentController@lineChange',
	]);

	Route::get('comment/chargechange', [
		'as' => 'comment.chargechange',
		'uses' => 'CommentController@chargeChange',
	]);
	
	Route::resource('comment', 'CommentController');


});

Route::group(['before' => 'notadmin'], function() {

	Route::resource('category', 'CategoryController');
	Route::resource('server', 'ServerController');
	Route::resource('provider', 'ProviderController');
	Route::resource('login', 'LoginController');

	Route::get('company/create', [
		'uses' => 'CompanyController@create',
	]);

	Route::get('domain/create', [
		'uses' => 'DomainController@create',
	]);

	Route::get('domain/{domain}/edit', [
		'uses' => 'DomainController@edit',
	]);

	Route::get('project/create', [
		'uses' => 'ProjectController@create',
	]);

	Route::get('project/{project}/edit', [
		'uses' => 'ProjectController@edit',
	]);

	Route::get('line/create', [
		'uses' => 'LineController@create',
	]);

	Route::get('line/{line}/edit', [
		'uses' => 'LineController@edit',
	]);

	Route::get('charge/create', [
		'uses' => 'ChargeController@create',
	]);

	Route::get('charge/{charge}/edit', [
		'uses' => 'ChargeController@edit',
	]);

});
