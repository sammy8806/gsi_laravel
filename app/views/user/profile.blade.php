@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('UserController@getProfile') }}}">{{{ Lang::get('site.userprofile.profile') }}}</a></li>
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
                <h2>{{{ Lang::get('site.userprofile.username') }}}: {{$user->customLoginName}}</h2>
            </div>
            <div class="content controls">
                {{ Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) }}
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('customLoginName', 'Login Name:') }}</div>
                    <div class="col-md-9">{{$user->customLoginName}}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('email', 'Email:') }}</div>
                    <div class="col-md-9">{{ Form::email('email') }}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('status', 'Status:') }}</div>
                    <div class="col-md-9">{{ Form::select('status', ['active' => 'active', 'blocked' => 'blocked',
                        'tempBanned' => 'tempBanned']) }}
                    </div>
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