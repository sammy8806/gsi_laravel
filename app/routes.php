<?php

Route::group(['before' => 'auth', 'prefix' => 'user'], function () {

   Route::get('/', function () {
      return Redirect::to('dashboard');
   });

   Route::resource('gameserver', 'GameserverController');
   Route::resource('game', 'GameController');
   Route::controller('game', 'GameController');
   Route::resource('ip', 'IpController');
   Route::resource('user', 'UserController');
   Route::resource('scripts', 'ScriptController');
   Route::resource('ticket', 'TicketController');

   Route::controller('action', 'ActionController');

   Route::resource('res/user', 'UserController');
   Route::resource('res/game', 'GameController');
   Route::resource('res/gameserver', 'GameserverController');
   Route::resource('res/host', 'HostController');
   Route::resource('res/script', 'ScriptController');
   Route::resource('res/ticket', 'TicketController');

   Route::get('logout', 'LoginController@getLogout');

   Route::controller('/', 'UserController');

});

Route::get('/', function () {
   return Redirect::to('/login');
});

Route::controller('/', 'LoginController');
