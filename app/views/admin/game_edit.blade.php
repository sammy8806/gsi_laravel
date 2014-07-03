@extends('layouts.master')

@section('content')
<div class="row">
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>GAME EDIT</h2>
         </div>
         <div class="content controls">
            {{ Form::model($game, ['method' => 'PATCH', 'action' => ['GameController@update', $game->id]]) }}
            @include('admin._game_form')
            {{ Form::close() }}
         </div>
      </div>
   </div>
</div>
@stop