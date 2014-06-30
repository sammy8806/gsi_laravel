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

Route::get('/', function() {
    return Redirect::to('/dashboard');
});

//Route::get('/dashboard', ['as' => 'user_dashboard', 'uses' => 'UserController@showDashboard']);
//Route::get('/gameserver', ['as' => 'user_gameserver_list', 'uses' => 'UserController@showGameserverList']);

//Route::get('user/profile', 'UserController@showProfile');

Route::resource('/gameserver', 'GameserverController');

//App::missing(function($exception)
//{
//    return Response::view('errors.404', array(), 404);
//});

// API KRAMS

// Restfull Routing :)
Route::resource('res/user', 'UserController');
Route::resource('res/game', 'GameController');
//Route::resource('res/gameserver', 'GameserverController');
Route::resource('res/host', 'HostController');
Route::resource('res/script', 'ScriptController');
Route::resource('res/ticket', 'TicketController');

// Last but not least ...
Route::controller('/', 'UserController');