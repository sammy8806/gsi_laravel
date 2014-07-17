@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('GameserverController@index') }}}">{{{ Lang::get('site.gameserver.gameserver') }}}</a></li>
<li><a href="{{{ URL::action('GameserverController@show', [$gameserver->id]) }}}">{{$gameserver->displayName}}</a></li>
<li><a href="{{{ URL::action('ConfigControllerController@show', [$gameserver->id]) }}}">Configuration</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="content">
            <table class="table table-bordered table-striped table-hover">
               <thead>
               <tr>
                  <th>Name</th>
                  <th>{{{ Lang::get('site.config.action') }}}</th>
               </tr>
               </thead>
               <tbody>
               @foreach ($configs as $config)
               <tr>
                  <td>
                     <a href="{{ URL::action('ConfigController@show', [$config->id]) }}">
                        {{$config->name}}
                     </a>
                  </td>
                  <td>
                     <a class="btn btn-xs btn-link" href="{{ URL::action('ConfigController@edit', [$config->id]) }}">
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