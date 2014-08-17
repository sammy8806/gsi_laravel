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
                    <div class="col-md-3">{{ Form::label('customLoginName', Lang::get('site.profile.customLoginName')) }}</div>
                    <div class="col-md-9">{{$user->customLoginName}}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('email', Lang::get('site.profile.email')) }}</div>
                    <div class="col-md-9">{{ Form::email('email') }}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('status', Lang::get('site.profile.status')) }}</div>
                    <div class="col-md-9">{{ Form::select('status', ['active' => 'active', 'blocked' => 'blocked',
                        'tempBanned' => 'tempBanned']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('first_name', Lang::get('site.profile.first_name')) }}</div>
                    <div class="col-md-9">{{ Form::text('first_name') }}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('last_name', Lang::get('site.profile.last_name')) }}</div>
                    <div class="col-md-9">{{ Form::text('last_name') }}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('address', Lang::get('site.profile.address')) }}</div>
                    <div class="col-md-9">{{ Form::text('address') }}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('phone', Lang::get('site.profile.phone')) }}</div>
                    <div class="col-md-9">{{ Form::text('phone') }}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('cellnumber', Lang::get('site.profile.cellnumber')) }}</div>
                    <div class="col-md-9">{{ Form::text('cellnumber') }}</div>
                </div>
                <div class="form-row">
                    <div class="col-md-9 col-md-offset-3">
                        {{ Form::submit(Lang::get('site.profile.save')) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop