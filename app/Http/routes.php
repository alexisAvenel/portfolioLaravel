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


Route::get('/', 'WelcomeController@index', ['as' => 'home']);
//Route::get('home', 'HomeController@index');
Route::resource('news', 'PostsController');
Route::resource('link', 'LinksController', ['only' => ['create', 'store']]);
Route::get('r/{link}', ['as' => 'link.show', 'uses' => 'LinksController@show'])->where('link','[0-9]+');

Route::controllers([
	'admin' => 'Admin\AdminController',
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Admin area

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
	Route::get('/', 'Admin\AdminController@index', ['as' => 'admin.home']);
});

// Logging in and out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/auth/register', 'Auth\AuthController@getRegister', function(){
	return redirect('home');
});
//Route::post('/auth/register', 'Auth\AuthController@postRegister');