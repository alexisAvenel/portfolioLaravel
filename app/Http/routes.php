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

Route::group(['middleware' => ['web']], function () {
	/*** Resources ***/
	Route::resource('news', 'PostsController');
	Route::resource('link', 'LinksController', ['only' => ['create', 'store']]);

	/*** Gets ***/
	Route::get('/', ['as' => 'home', 'uses' => 'WelcomeController@index']);
	Route::get('r/{link}', ['as' => 'link.show', 'uses' => 'LinksController@show'])->where('link','[0-9]+');

	/*** Admin ***/
	Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
		Route::get('/', 'AdminController@index', ['as' => 'admin.home']);
		Route::resource('news', 'PostsController');
		Route::get('/settings', 'AdminController@settings', ['as' => 'admin.settings']);

		Route::post('/ajax/update_post_online', 'PostsController@updatePostOnline');
	});

	/*** Auth ***/
	Route::get('/auth/login', 'Auth\AuthController@getLogin');
	Route::post('/auth/login', 'Auth\AuthController@postLogin');
	Route::get('/auth/logout', 'Auth\AuthController@getLogout');
	Route::get('/auth/register', 'Auth\AuthController@getRegister');
	//Route::post('/auth/register', 'Auth\AuthController@postRegister');
});