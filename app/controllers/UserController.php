<?php

/**
 * Created by PhpStorm.
 * User: mgade
 * Date: 30.06.14
 * Time: 05:18
 */
class UserController extends BaseController {

   /**
    * The layout that should be used for responses.
    */
   protected $layout = 'user.home';

   /**
    * Show the user profile.
    */
   public function getProfile($id = null) {
      if ($id === null) {
         $id = Auth::user()->id;
      }

      return View::make('user.profile', ['user' => User::findOrFail($id)]);
   }

   public function getDashboard() {
      return View::make('user.home');
   }

   public function getChangePassword($id = null) {
      if ($id === null) {
         $id = Auth::user()->id;
      }

      return View::make('user.change_password', ['user' => User::findOrFail($id)]);
   }

   public function getSupportTickets() {
      return View::make('user.support_tickets');
   }

   public function index() {
      return View::make('admin.user_list', ['users' => User::all()]);
   }

   public function create() {
      return View::make('admin.user_create', ['user' => new User()]);
   }

   public function update($id) {
      $rules = [
            'first_name' => 'AlphaNum',
            'last_name'  => 'AlphaNum',
            'email'      => 'Required|Email',
            'address'    => 'AlphaNum',
            'phone'      => 'AlphaNum',
            'cellphone'  => 'AlphaNum',
      ];

      $v = Validator::make(Input::all(), $rules);

      if ($v->passes()) {

         $user = User::findOrFail($id);
         $user->fill(Input::all());
         $user->save();

         return Redirect::action('UserController@getProfile', $id);
      } else {
         return Redirect::action('UserController@getProfile', $id)->withErrors($v->getMessageBag());
      }
   }

   public function patchChangePassword($id) {
      $rules = [
            'password' => 'required|min:6|max:120|confirmed',
            'password_confirmation' => 'required|min:3'
      ];

      $v = Validator::make(Input::all(), $rules);

      if ($v->passes() && Input::get('password') != "") {

         $user = User::findOrFail($id);
         $user->password = Hash::make(Input::get('password'));
         $user->save();

         Session::flash('flash_notice', 'Updated to: "' . Input::get('password') . '"');

         return Redirect::action('UserController@getChangePassword', $id);
      } else {
         return Redirect::action('UserController@getChangePassword', $id)->withErrors($v->getMessageBag());
      }
   }


   public function edit($id) {

      // Sight Permission Types

      /** @var UserSightPermissionType $sightPermissionType */
      $sightPermissionTypes = [];
      foreach (UserSightPermissionType::all() as $sightPermissionType) {
         $sightPermissionTypes[$sightPermissionType->id] = $sightPermissionType->objectName;
      }

      // Sight Permissions

      $aff_sightPerms = [];

      foreach (User::find($id)->sightPermissions as $sightPermission)
         $aff_sightPerms[] = $sightPermission->id;

      $sightPermissions = [];
      /** @var UserSightPermission $sightPermission */
      foreach (UserSightPermission::all() as $sightPermission) {
         if (!in_array($sightPermission->id, $aff_sightPerms)) {
            $sightPermissions[$sightPermission->id] = $sightPermission->sightPermissionTypes[0]->objectName;
         }
      }

      return View::make('admin.user_edit', [
                  'user'                 => User::findOrFail($id),
                  'sightPermissionTypes' => $sightPermissionTypes,
                  'sightPermissions'     => $sightPermissions
            ]
      );
   }

   public function store() {
      $rules = [
            'first_name'      => 'AlphaNum',
            'last_name'       => 'AlphaNum',
            'email'           => 'Required|Email',
            'customLoginName' => 'AlphaNum|Unique:users',
            'address'         => 'AlphaNum',
            'phone'           => 'AlphaNum',
            'cellphone'       => 'AlphaNum',
            'password'        => 'AlphaNum|Min:6|Max:120|Confirmed',
      ];

      $v = Validator::make(Input::all(), $rules);

      if ($v->passes()) {

         $user = new User();
         $user->fill(Input::all());
         $user->password = Hash::make(Input::get('password'));
         $user->save();

         return Redirect::action('UserController@index');
      } else {
         return Redirect::action('UserController@create')->withErrors($v->getMessageBag());
      }
   }

   public function show() {

   }

}