@extends('layouts.master')

@section('content')
<div class="row">
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>GAME ADD</h2>
         </div>
         <div class="content controls">
            {{ Form::model($game, ['method' => 'POST', 'action' => ['GameController@store']]) }}
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('name', 'Name:') }}</div>
               <div class="col-md-9">{{ Form::text('name') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('short', 'Shorty:') }}</div>
               <div class="col-md-9">{{ Form::text('short') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('live_console', 'Live Console:') }}</div>
               <div class="col-md-9">
                  <div class="checkbox-inline">{{ Form::checkbox('live_console') }}</div>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('check_type', 'Check Type:') }}</div>
               <div class="col-md-9">{{ Form::select('check_type', ['qstat' => 'QStat', 'node' =>
                  'NodeJS',
                  'no' => 'Nothing']) }}
               </div>
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

















