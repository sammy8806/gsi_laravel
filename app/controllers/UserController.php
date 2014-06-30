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
   public function getProfile() {
      return View::make('user/profile');
   }

   public function getDashboard() {
      return View::make('user/home');
   }

   public function getChangePassword() {
      return View::make('user/change_password');
   }

   public function getSupportTickets() {
      return View::make('user/support_tickets');
   }

   public function index() {
      return View::make('admin/user_list', ['users' => User::all()]);
   }

   public function create() {
      return View::make('admin/user_create', ['user' => new User()]);
   }

   public function store() {
      $rules = [
            'first_name'      => 'AlphaNum',
            'last_name'       => 'first_name',
            'email'           => 'Required|Email',
            'customLoginName' => 'AlphaNum|Unique:users',
            'address'         => 'AlphaNum',
            'phone'           => 'AlphaNum',
            'cellphone'       => 'AlphaNum',
            'password'        => 'AlphaNum|Min:6|Max:120|Confirmed',
      ];

      $v = Validator::make(Input::all(), $rules);

      if ($v->passes()) {

         $gameserver = new User();
         $gameserver->fill(Input::all());
         $gameserver->password = Hash::make(Input::get('password'));
         $gameserver->save();

         return Redirect::action('UserController@index');
      } else {
         return Redirect::route('UserController@create')->withErrors($v->getMessageBag());
      }
   }

   public function show() {

   }

}