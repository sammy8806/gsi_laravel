@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('UserController@index') }}}">{{{ Lang::get('site.gameserver.users') }}}</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="header">
            <h2><i class="icon-user"> {{{ Lang::get('site.gameserver.users') }}}</i></h2>&nbsp;
            <a class="btn btn-xs" href="{{ action('UserController@create') }}"><i class="icon-plus"></i> {{{ Lang::get('site.gameserver.user_add') }}}</a>
         </div>
         <div class="content">
            <table class="table table-bordered table-striped">
               <tr>
                  <th>{{{ Lang::get('site.user_list.id')}}}</th>
                  <th>{{{ Lang::get('site.user_list.fist_name')}}}</th>
                  <th>{{{ Lang::get('site.user_list.last_name')}}}</th>
                  <th>{{{ Lang::get('site.user_list.login_name')}}}</th>
                  <th>{{{ Lang::get('site.user_list.email')}}}</th>
                  <th>{{{ Lang::get('site.user_list.last_login')}}}</th>
                  <th>{{{ Lang::get('site.user_list.status')}}}</th>
                  <th>{{{ Lang::get('site.user_list.actions')}}}</th>
               </tr>
               @foreach($users as $user)
               <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->customLoginName }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->last_login }}</td>
                  <td>{{ $user->active }}</td>
                  <td>
                     <a class="btn btn-xs btn-danger" data-method="delete" href="{{ URL::action('UserController@destroy', [$user->id]) }}">
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