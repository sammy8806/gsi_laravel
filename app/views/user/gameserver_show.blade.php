@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('GameserverController@index') }}}">{{{ Lang::get('site.gameserver.gameserver') }}}</a></li>
<li><a href="{{{ URL::action('GameserverController@show', [$gameserver->id]) }}}">{{$gameserver->displayName}}</a></li>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="block">
            <div class="content">
                <h3>
                    {{{ Lang::get('site.gameserver.gameserver') }}}: {{$gameserver->displayName}}
                    <small>
                    <a href="{{ action('GameserverController@edit') }}">
                        {{{ Lang::get('site.gameserver.change_settings') }}}
                    </a>
                    </small>
                </h3>

                <p>Status: <span class="btn btn-success btn-clean"><i class="icon-ok"></i> Active</span></p>
                <span class="btn"><i class="icon-off"></i> {{{ Lang::get('site.gameserver.start_server') }}}</span>
                <span class="btn"><i class="icon-repeat"></i> {{{ Lang::get('site.gameserver.restart_server') }}}</span>
                <span class="btn"><i class="icon-remove"></i> {{{ Lang::get('site.gameserver.stop_server') }}}</span>
                <span class="btn"><i class="icon-fire"></i> {{{ Lang::get('site.gameserver.reinstall_server') }}}</span>
                <span class="btn"><i class="icon-trash"></i> {{{ Lang::get('site.gameserver.delete_server') }}}</span>
                </br></br>
                <span class="btn btn-lg"><i
                        class="icon-cogs"></i> {{{ Lang::get('site.gameserver.config_files') }}}</span>
                <span class="btn btn-lg"><i class="icon-download-alt"></i> {{{ Lang::get('site.gameserver.install_addons') }}}</span>
                <span class="btn btn-lg"><i
                        class="icon-terminal"></i> {{{ Lang::get('site.gameserver.screen_log') }}}</span>
                <span class="btn btn-lg"><i class="icon-signal"></i> {{{ Lang::get('site.gameserver.gameserver_stats') }}}</span>

            </div>
        </div>
    </div>
</div>
@stop