@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="block">
            <div class="header">
                <h2>IP ADD</h2>
            </div>
            <div class="content controls">
                {{ Form::model($ip, ['method' => 'PATCH', 'action' => ['IpController@update', $ip->id]]) }}
                <div class="form-row">
                    <div class="col-md-3">{{ Form::label('ip', 'IP:') }}</div>
                    <div class="col-md-9">{{ Form::text('ip') }}</div>
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
