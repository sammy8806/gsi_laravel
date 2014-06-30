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
            <h2>User Add</h2>
         </div>
         <div class="content controls">
            {{ Form::model($user, ['method' => 'POST', 'action' => ['UserController@store']]) }}
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('customLoginName', 'Login Name:') }}</div>
               <div class="col-md-9">{{ Form::text('customLoginName') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('password', 'Password:') }}</div>
               <div class="col-md-9">{{ Form::password('password') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('password_confirmation', 'Password Confirm:') }}</div>
               <div class="col-md-9">{{ Form::password('password_confirmation') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('email', 'Email:') }}</div>
               <div class="col-md-9">{{ Form::email('email') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('status', 'Status:') }}</div>
               <div class="col-md-9">{{ Form::select('status', ['active' => 'active', 'blocked' => 'blocked', 'tempBanned' => 'tempBanned']) }}</div>
            </div>

            <div class="form-row">
               <div class="col-md-3">{{ Form::label('first_name', 'First Name:') }}</div>
               <div class="col-md-9">{{ Form::text('first_name') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('last_name', 'Last Name:') }}</div>
               <div class="col-md-9">{{ Form::text('last_name') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('address', 'Address:') }}</div>
               <div class="col-md-9">{{ Form::text('address') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('phone', 'Phone:') }}</div>
               <div class="col-md-9">{{ Form::text('phone') }}</div>
            </div>
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('cellnumber', 'Cellular Number:') }}</div>
               <div class="col-md-9">{{ Form::text('cellnumber') }}</div>
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
