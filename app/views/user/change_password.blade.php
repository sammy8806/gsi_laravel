@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('UserController@getChangePassword') }}}">{{{ Lang::get('site.userprofile.updatePassword') }}}</a></li>
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
    <div class="col-md-12">


        <div class="block">
            <div class="header">
                <h2>{{{ Lang::get('site.userprofile.updatePassword') }}}</h2>
            </div>
            <div class="content controls">
                {{ Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@patchUpdatePassword', $user->id]]) }}
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('password', 'Password:') }}</div>
                    <div class="col-md-9">{{ Form::password('password') }}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('password_confirmation', 'Password Confirm:') }}</div>
                    <div class="col-md-9">{{ Form::password('password_confirmation') }}</div>
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