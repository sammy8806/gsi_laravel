<?php

// START Permissions
Route::group(['before' => 'auth', 'prefix' => 'permission'], function () {

   // Groups
   Route::get('group', ['as' => 'perm.group.list', 'uses' => 'PermissionAdminController@group_index']);
   Route::get('group/create', ['as' => 'perm.group.create', 'uses' => 'PermissionAdminController@group_create']);
   Route::post('group/create', ['as' => 'perm.group.store', 'uses' => 'PermissionAdminController@group_store']);
   // Route::get('group/{id}', ['as' => 'perm.group.show', 'uses' => 'PermissionAdminController@group_show']);
   Route::get('group/{id}/edit', ['as' => 'perm.group.edit', 'uses' => 'PermissionAdminController@group_edit']);
   Route::post('group/{id}/user',
         ['as' => 'perm.group.add_user', 'uses' => 'PermissionAdminController@group_add_user']);
   Route::delete('group/{id}/user',
         ['as' => 'perm.group.del_user', 'uses' => 'PermissionAdminController@group_del_user']);
   Route::post('group/{id}/role',
         ['as' => 'perm.group.add_role', 'uses' => 'PermissionAdminController@group_add_role']);
   Route::delete('group/{id}/role',
         ['as' => 'perm.group.add_role', 'uses' => 'PermissionAdminController@group_del_role']);
   Route::patch('group/{id}', ['as' => 'perm.group.update', 'uses' => 'PermissionAdminController@group_update']);
   Route::delete('group/{id}', ['as' => 'perm.group.destroy', 'uses' => 'PermissionAdminController@group_destroy']);

   // Roles
   Route::get('role', ['as' => 'perm.role.list', 'uses' => 'PermissionAdminController@role_index']);
   Route::get('role/create', ['as' => 'perm.role.create', 'uses' => 'PermissionAdminController@role_create']);
   Route::post('role/create', ['as' => 'perm.role.store', 'uses' => 'PermissionAdminController@role_store']);
   Route::post('role/{id}/user', ['as' => 'perm.role.add_user', 'uses' => 'PermissionAdminController@role_add_user']);
   Route::delete('role/{id}/user', ['as' => 'perm.role.del_user', 'uses' => 'PermissionAdminController@role_del_user']);
   Route::post('role/{id}/group',
         ['as' => 'perm.role.add_group', 'uses' => 'PermissionAdminController@role_add_group']);
   Route::delete('role/{id}/group',
         ['as' => 'perm.role.del_group', 'uses' => 'PermissionAdminController@role_del_group']);
   Route::get('role/{id}/edit', ['as' => 'perm.role.edit', 'uses' => 'PermissionAdminController@role_edit']);
   Route::patch('role/{id}', ['as' => 'perm.role.update', 'uses' => 'PermissionAdminController@role_update']);
   Route::delete('role/{id}', ['as' => 'perm.role.destroy', 'uses' => 'PermissionAdminController@role_destroy']);

});
// END Permisions

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

   Route::get('logout', 'LoginController@getLogout');

   Route::controller('/', 'UserController');

});

Route::get('/', function () {
   return Redirect::to('/login');
});

Route::controller('/', 'LoginController');
