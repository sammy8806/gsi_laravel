@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="block">
            <div class="content">
                <h3>{{{ Lang::get('site.gameserver.gameserver') }}}: %DISPLAY_NAME%</h3>

                <p>Status: <span class="btn btn-success btn-clean"><i class="icon-ok"></i> Active</span></p>
                <span class="btn"><i class="icon-off"></i> {{{ Lang::get('site.gameserver.start_server') }}}</span>
                <span class="btn"><i class="icon-repeat"></i> {{{ Lang::get('site.gameserver.restart_server') }}}</span>
                <span class="btn"><i class="icon-remove"></i> {{{ Lang::get('site.gameserver.stop_server') }}}</span>
                </br></br>
                <span class="btn btn-lg"><i class="icon-cogs"></i> {{{ Lang::get('site.gameserver.config_files') }}}</span>
                <span class="btn btn-lg"><i class="icon-download-alt"></i> {{{ Lang::get('site.gameserver.install_addons') }}}</span>
                <span class="btn btn-lg"><i class="icon-terminal"></i> {{{ Lang::get('site.gameserver.screen_log') }}}</span>
                <span class="btn btn-lg"><i class="icon-signal"></i> {{{ Lang::get('site.gameserver.gameserver_stats') }}}</span>

            </div>
        </div>
    </div>
</div>
@stop