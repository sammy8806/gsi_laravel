@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('GameserverController@index') }}}">{{{ Lang::get('site.gameserver.gameserver') }}}</a></li>
<li><a href="{{{ URL::action('GameserverController@show', [$gameserver->id]) }}}">{{$gameserver->displayName}}</a></li>
<li><a href="{{{ URL::action('ModControllerController@show', [$mod->id]) }}}">{{{ Lang::get('site.mod.mods') }}}</a></li>
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
                  <th>status</th>
                  <th>{{{ Lang::get('site.gameserver.action') }}}</th>
               </tr>
               </thead>
               <tbody>
               @foreach ($mods as $mod)
               <tr>
                  <td>
                     <a href="{{ URL::action('ModController@show', [$mod->id]) }}">
                        {{$mod->name}}
                     </a>
                  </td>
                  <td>
                     installed (if rel(gs<->mod) exists else not installed
                  </td>
                  <td>
                     <a class="btn btn-xs btn-link" href="{{ URL::action('ModController@install', [$mod->id]) }}">
                        <i class="icon-edit-sign"></i>
                        install
                     </a>
                     <a class="btn btn-xs btn-link" href="{{ URL::action('ModController@delete', [$mod->id]) }}">
                        <i class="icon-eject"></i>
                        delete
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