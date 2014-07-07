@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ route('perm.group.list') }}}">{{{ Lang::get('site.permissions.groups') }}}</a></li>
<li><a href="{{{ route('perm.group.add') }}}">{{{ Lang::get('site.permissions.group_add') }}}</a></li>
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
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>{{{ Lang::get('site.permissions.group_add') }}}</h2>
         </div>
         <div class="content controls">
            {{ Form::open(['method' => 'POST', 'action' => ['perm.group.store']]) }}
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('displayName', 'Name:') }}</div>
               <div class="col-md-9">{{ Form::text('displayName') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('description', 'Description:') }}</div>
               <div class="col-md-9">{{ Form::textarea('description') }}</div>
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