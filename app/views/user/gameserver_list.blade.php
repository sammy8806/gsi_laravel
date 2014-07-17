@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('GameserverController@index') }}}">{{{ Lang::get('site.gameserver.gameserver') }}}</a></li>
@stop

@section('content')
@if(Session::has('errors'))
<div class="block">
   @foreach(Session::get('errors')->getMessages() as $error)
   @foreach($error as $error_data)
   <div class="alert alert-danger">
      <b>Error:</b> {{ $error_data }}
   </div>
   @endforeach
   @endforeach
</div>
@endif
@if(Session::has('flash_notice'))
<div class="block">
   <div class="alert alert-danger">
      <b>{{{ Session::get('flash_notice') }}}</b>
   </div>
</div>
@endif
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
                     <a href="{{ URL::action('GameserverController@show', [$gameserver->id]) }}">
                        {{$gameserver->ipport->ip->ip}}:{{$gameserver->ipport->port}}
                        {{ Auth::getUser()->hasPermission($gameserver) ? 'OK' : 'No Access' }}
                     </a>
                  </td>
                  <td>
                     <a href="{{ URL::action('GameserverController@show', [$gameserver->id]) }}">
                        {{$gameserver->displayName }}
                     </a>
                  </td>
                  <td>
                     <a href="{{ URL::action('GameserverController@show', [$gameserver->id]) }}">
                        {{$gameserver->status }}
                     </a>
                  </td>
                  <td>
                     <a class="btn btn-xs btn-link" href="{{ URL::action('GameserverController@edit', [$gameserver->id]) }}">
                        <i class="icon-edit-sign"></i>
                        Edit
                     </a>
                  </td>
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
