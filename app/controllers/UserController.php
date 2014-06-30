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
    public function getProfile()
    {
        return View::make('user/profile');
    }

    public function getDashboard()
    {
        return View::make('user/home');
    }

    public function getGameserverList()
    {
        return View::make('user/gameserver_list');
    }
    public function getChangePassword()
    {
        return View::make('user/change_password');
    }
    public function getSupportTickets()
    {
        return View::make('user/support_tickets');
    }

}