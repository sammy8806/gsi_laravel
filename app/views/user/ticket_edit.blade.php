@extends('layouts.master')


@section('breadcrumb')

@parent
 <li><a href="{{{ URL::action('TicketController@index') }}}">{{{ Lang::get('site.ticket.tickets') }}}</a></li>
 <li><a href="{{{ URL::action('TicketController@create') }}}">{{{ Lang::get('site.ticket.tickets_new') }}}</a></li>
@stop


@section('content')
<div class="row">
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>Lang::get('site.ticketform.edit_ticket')</h2>
         </div>
         <div class="content controls">
            {{ Form::model($ticket, ['method' => 'PATCH', 'action' => ['TicketController@edit']]) }}
            @include('user._ticket_form')
            {{ Form::close() }}
      </div>
   </div>
</div>


@stop