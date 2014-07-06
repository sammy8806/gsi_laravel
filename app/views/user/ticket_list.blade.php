@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('TicketController@index') }}}">{{{ Lang::get('site.ticket.tickets') }}}</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="header">
            <h2><i class="icon-list"> {{{ Lang::get('site.ticket.ticket') }}}</i></h2>&nbsp;
            <a class="btn btn-xs" href="{{ action('TicketController@create') }}"><i class="icon-plus"></i> {{{
               Lang::get('site.ticket.add') }}}</a>
         </div>
         <div class="content">
            <table class="table table-bordered table-striped">
               <tr>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Priority</th>
                  <th>Actions</th>
               </tr>
               @foreach($tickets as $ticket)
               <tr>
                  <td>{{ $ticket->title }}</td>
                  <td>{{ $ticket->status }}</td>
                  <td>{{ ($ticket->priority) ? "True" : "False" }}</td>
                  <td>
                     <a class="btn btn-xs btn-link" href="{{ URL::action('TicketController@edit', [$ticket->id]) }}">
                        <i class="icon-edit-sign"></i>
                        Edit
                     </a>
                     <a class="btn btn-xs btn-danger" data-method="DELETE"
                        href="{{ URL::action('TicketController@destroy', [$ticket->id]) }}">
                        <i class="icon-remove-sign"></i>
                        Delete
                     </a>
                  </td>
               </tr>
               @endforeach
            </table>
            <br/>
         </div>
      </div>

   </div>
</div>
@stop

@section('scripts')
@parent
<script language="JavaScript">
   $(document).on('click', '[data-method]', function (e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('href'),
         type: $(this).data('method'),
         success: function (data, textStatus, jqXHR) {
            console.log('delete success');
            window.location.reload()
         }
      })
   })
</script>
@stop