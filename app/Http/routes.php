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


Route::get('/', function () {
	//echo (Auth::check()) ? 'Logged in' : 'Not logged in';
	//echo(Session::get('test'));

    return view('main/index');
});

//Route::get('/','PostController@index');

// route to show the login form
//Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
//Route::post('login', array('uses' => 'HomeController@doLogin'));

//Route::get('api/todo', ['uses' => 'TodoController@index','middleware'=>'simpleauth']);
//Route::post('api/todo', ['uses' => 'TodoController@store','middleware'=>'simpleauth']);

Route::resource('posts', 'PostController');

//Route::get('posts', array('uses' => 'PostController@index'));

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/*
 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
});
*/