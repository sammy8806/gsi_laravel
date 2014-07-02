@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('GameserverController@index') }}}">{{{ Lang::get('site.gameserver.gameserver') }}}</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="header">
            <h2><i class="icon-gamepad"> {{{ Lang::get('site.gameserver.gameservers') }}}</i></h2>&nbsp;
            <a class="btn btn-xs" href="{{ action('GameserverController@create') }}"><i class="icon-plus"></i> {{{
               Lang::get('site.gameserver.gameserver_add') }}}</a>
         </div>
         <div class="content">
            <table class="table table-bordered table-striped table-hover">
               <thead>
               <tr>
                  <th>{{{ Lang::get('site.gameserver.connection_info') }}}</th>
                  <th>{{{ Lang::get('site.gameserver.gameserver') }}}</th>
                  <th>{{{ Lang::get('site.gameserver.status') }}}</th>
                  <th>{{{ Lang::get('site.gameserver.action') }}}</th>
               </tr>
               </thead>
               <tbody>
               @foreach ($gameservers as $gameserver)
               <tr>
                  <td>
                     <a href="{{ URL::action('GameserverController@show', array($gameserver->id)) }}">
                        {{$gameserver->ipport->ip->ip}}:{{$gameserver->ipport->port}}
                     </a>
                  </td>
                  <td>
                     <a href="{{ URL::action('GameserverController@show', array($gameserver->id)) }}">
                        {{$gameserver->displayName }}
                     </a>
                  </td>
                  <td>
                     <a href="{{ URL::action('GameserverController@show', array($gameserver->id)) }}">
                        {{$gameserver->status }}
                     </a>
                  </td>
                  <td>Start | Stop</td>
               </tr>
               @endforeach
               </tbody>
            </table>
            <br/>
         </div>
      </div>

   </div>
</div>
@stop