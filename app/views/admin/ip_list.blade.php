@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('IpController@index') }}}">{{{ Lang::get('site.gameserver.ips') }}}</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="header">
            <h2><i class="icon-list"> {{{ Lang::get('site.gameserver.ips') }}}</i></h2>&nbsp;
            <a class="btn btn-xs" href="{{ action('IpController@create') }}"><i class="icon-plus"></i> {{{ Lang::get('site.gameserver.ip_add') }}}</a>
         </div>
         <div class="content">
            <table class="table table-bordered table-striped">
               <tr>
                  <th>IP</th>
                  <th>Actions</th>
               </tr>
               @foreach($ips as $ip)
               <tr>
                  <td>{{ $ip->ip }}</td>
                  <td>
                      <a class="btn btn-xs btn-link" href="{{ URL::action('IpController@edit', [$ip->id]) }}">
                          <i class="icon-edit-sign"></i>
                          Edit
                      </a>
                     <a class="btn btn-xs btn-danger" data-method="delete" href="{{ URL::action('IpController@destroy', [$ip->id]) }}">
                        <i class="icon-remove-sign"></i>
                        Delete
                     </a>
                  </td>
               </tr>
               @endforeach
            </table>
            <br />
         </div>
      </div>

   </div>
</div>
@stop

@section('scripts')
@parent
<script language="JavaScript">
   $(document).on('click', '[data-method]', function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('href'),
         type: 'DELETE',
         success: function(data, textStatus, jqXHR) {
            console.log('delete success');
            window.location.reload()
         }
      })
   })
</script>
@stop