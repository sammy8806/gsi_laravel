@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">

        <div class="block">
            <div class="content">
                <a href="{{{ URL::action('GameserverController@index') }}}">
                    <h1><i class="icon-gamepad"></i></h1>
                    <h3>{{{ Lang::get('site.navi.gameserver') }}}</h3>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="block">
            <div class="content">
                <a href="{{{ URL::action('UserController@getProfile') }}}">
                    <h1><i class="icon-male"></i></h1>
                    <h3>{{{ Lang::get('site.navi.profile') }}}</h3>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">

        <div class="block">
            <div class="content">
                <a href="{{{ URL::action('UserController@getChangePassword') }}}">
                    <h1><i class="icon-key"></i></h1>
                    <h3>{{{ Lang::get('site.navi.chpass') }}}</h3>
                </a>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="block">
            <div class="content">
                <a href="{{{ URL::action('UserController@getSupportTickets') }}}">
                    <h1><i class="icon-pencil"></i></h1>
                    <h3>{{{ Lang::get('site.navi.ticket') }}}</h3>
                </a>
            </div>
        </div>
    </div>

</div>
@stop