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
            @include('admin._gameserver_form')
            {{ Form::close() }}
         </div>
      </div>
   </div>
</div>

@stop
