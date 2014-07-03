@extends('layouts.master')

@section('content')
<div class="row">
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>SCRIPT ADD</h2>
         </div>
         <div class="content controls">
            {{ Form::model($script, ['method' => 'POST', 'action' => ['ScriptController@store', $script->id]]) }}
@include('admin._script_form')
            {{ Form::close() }}
         </div>
      </div>
   </div>
</div>


@stop
