<?php

/**
 * Created by PhpStorm.
 * User: mgade
 * Date: 30.06.14
 * Time: 05:18
 */
class UserController extends BaseController
{

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'user.home';

    /**
     * Show the user profile.
     */
    public function getProfile($id = null)
    {
        if ($id === null)
            $id = Auth::user()->id;
        return View::make('user/profile', ['user' => User::findOrFail($id)]);
    }

    public function getDashboard()
    {
        return View::make('user/home');
    }

    public function getChangePassword($id = null)
    {
        if ($id === null)
            $id = Auth::user()->id;
        return View::make('user/change_password', ['user' => User::findOrFail($id)]);
    }

    public function getSupportTickets()
    {
        return View::make('user/support_tickets');
    }

    public function index()
    {
        return View::make('admin/user_list', ['users' => User::all()]);
    }

    public function create()
    {
        return View::make('admin/user_create', ['user' => new User()]);
    }

    public function update($id)
    {
        $rules = [
            'first_name' => 'AlphaNum',
            'last_name' => 'AlphaNum',
            'email' => 'Required|Email',
            'address' => 'AlphaNum',
            'phone' => 'AlphaNum',
            'cellphone' => 'AlphaNum',
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

    public function patchUpdatePassword($id)
    {
        $rules = [
            'password' => 'AlphaNum|Min:6|Max:120|Confirmed',
        ];

        $v = Validator::make(Input::all(), $rules);

        if ($v->passes()) {

            $user = User::findOrFail($id);
            $user->fill(Input::all());
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::action('UserController@getChangePassword', $id);
        } else {
            return Redirect::action('UserController@getChangePassword', $id)->withErrors($v->getMessageBag());
        }
    }

    public function store()
    {
        $rules = [
            'first_name' => 'AlphaNum',
            'last_name' => 'AlphaNum',
            'email' => 'Required|Email',
            'customLoginName' => 'AlphaNum|Unique:users',
            'address' => 'AlphaNum',
            'phone' => 'AlphaNum',
            'cellphone' => 'AlphaNum',
            'password' => 'AlphaNum|Min:6|Max:120|Confirmed',
        ];

        $v = Validator::make(Input::all(), $rules);

        if ($v->passes()) {

            $user = new User();
            $user->fill(Input::all());
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::action('UserController@index');
        } else {
            return Redirect::route('UserController@create')->withErrors($v->getMessageBag());
        }
    }

    public function show()
    {

    }

}