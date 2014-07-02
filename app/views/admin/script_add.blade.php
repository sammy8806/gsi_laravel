@extends('layouts.master')

@section('content')
<div class="row">
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>SCRIPT ADD</h2>
         </div>
         <div class="content controls">
            {{ Form::model($script, ['method' => 'POST', 'action' => ['ScriptController@store']]) }}
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('name', 'Name:') }}</div>
               <div class="col-md-9">{{ Form::text('name') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('interpreter', 'Interpreter:') }}</div>
               <div class="col-md-9">{{ Form::text('interpreter') }}</div>
            </div>
            <div class="form-row">
                 <div class="col-md-3">{{ Form::label('commands', 'Commands:') }}</div>
                 <div class="col-md-9">{{ Form::textarea('commands') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('type', 'Type:') }}</div>
               <div class="col-md-9">{{ Form::select('type', [
                   'start' => 'Start',
                   'stop' =>'Stop',
                   'install' => 'Install',
                   'backup' => 'Backup',
                   'delete' => 'Delete',
                   'reinstall' => 'Reinstall'
                   ]) }}
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

















