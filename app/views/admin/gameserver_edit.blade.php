@extends('layouts.master')

@section('content')
<div class="row">
   <div class="col-md-6">
      @if(Session::has('errors'))
      <div class="block">
         {{-- Session::get('errors')->getMessages() --}}
         @foreach(Session::get('errors')->getMessages() as $error)
         @foreach($error as $error_data)
         <div class="alert alert-danger">
            <b>Error:</b> {{ $error_data }}
         </div>
         @endforeach
         @endforeach
      </div>
      @endif
      <div class="block">
         <div class="header">
            <h2>IP ADD</h2>
         </div>
         <div class="content controls">
            {{ Form::model($gameserver, ['method' => 'PATCH', 'action' => ['GameserverController@update',$gameserver->id]]) }}
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('game', 'Game:') }}</div>
               <div class="col-md-9">{{ Form::select('game', $games, $game_selected) }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('user', 'User:') }}</div>
               <div class="col-md-9">{{ Form::select('user', $users, $user_selected) }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('slot', 'Slot:') }}</div>
               <div class="col-md-9">{{ Form::text('slot') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('memory', 'Memory:') }}</div>
               <div class="col-md-9">{{ Form::text('memory') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('status', 'Status:') }}</div>
               <div class="col-md-9">{{ Form::select('status', ['active' => 'active', 'blocked' => 'blocked', 'maintanance' => 'maintanance']) }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('ip', 'IP:') }}</div>
               <div class="col-md-9">{{ Form::select('ip', $ips, $ip_selected) }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('port', 'Port:') }}</div>
               <div class="col-md-9">{{ Form::text('port', $port) }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('displayName', 'Display Name:') }}</div>
               <div class="col-md-9">{{ Form::text('displayName') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-9 col-md-offset-3">
                  {{ Form::submit('Save') }}
               </div>
            </div>
            {{ Form::close() }}
         </div>
      </div>
   </div>
</div>

@stop
