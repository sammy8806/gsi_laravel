<?php

/**
 * Created by PhpStorm.
 * User: steven
 * Date: 30.06.14
 * Time: 15:28
 */
class LoginController extends BaseController {

   public function getLogin() {
      return View::make('public.login', ['user' => new User()]);
   }

   public function postLogin() {
      $rules = [
            'username' => 'Required|Min:3',
            'password' => 'Required|Min:3',
      ];

      $v = Validator::make(Input::all(), $rules);

      if ($v->passes()) {

         $stay = Input::get('stay') ? true : false;

         $try = Auth::attempt([
            'customLoginName' => Input::get('username'),
            'password' => Input::get('password'),
            'active' => 'active'
         ], $stay);

         if($try) {
            return Redirect::action('UserController@getDashboard');
         } else {
             return Redirect::action('LoginController@getLogin')->with('flash_notice', 'Not logged in');
         }

      }

      return Redirect::action('LoginController@getLogin')->withErrors($v->getMessageBag());

   }

   public function getLogout() {
      Auth::logout();
      return Redirect::action('LoginController@getLogin')->with('flash_notice', 'Successfully logged out!');
   }

   public function getRegister() {

   }

//   public function missingMethod($parameters = array()) {
//       var_dump(Route::currentRouteName());
//       var_dump($parameters);
//
//   }

} 