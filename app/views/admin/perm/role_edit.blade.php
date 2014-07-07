@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ route('perm.role.list') }}}">{{{ Lang::get('site.permissions.roles') }}}</a></li>
<li><a href="{{{ route('perm.role.edit', $role->id) }}}">{{{ Lang::get('site.permissions.role_edit') }}}</a></li>
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
            <h2>{{{ Lang::get('site.permissions.role_edit') }}}</h2>
         </div>
         <div class="content controls">
            {{ Form::model($role, ['method' => 'PATCH', 'route' => ['perm.role.update', $role->id]]) }}
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
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>Affected Users</h2>
         </div>
         <div class="content controls">
            @foreach($role->users as $user)
            <div class="form-row">
               <div class="col-md-2"><b>User</b></div>
               <div class="col-md-8">{{{ $user->customLoginName }}} ({{{ $user->email }}})</div>
               <div class="col-md-2">
                  <a class="btn btn-xs btn-danger" data-method="DELETE"
                     href="{{ URL::route('perm.role.del_user', $role->id) }}">
                     <i class="icon-remove"></i>
                  </a>
               </div>
            </div>
            @endforeach

            @if(count($users) != 0)
            {{ Form::open(['method' => 'POST', 'route' => ['perm.role.add_user', $role->id]]) }}
            <div class="form-row">
               <div class="col-md-2">{{ Form::label('user', 'Add User:') }}</div>
               <div class="col-md-8">{{ Form::select('user', $users) }}</div>
               <div class="col-md-2">{{ Form::submit('Add') }}</div>
            </div>
            {{ Form::close() }}
            @endif
         </div>
      </div>
      <div class="block">
         <div class="header">
            <h2>Affected groups</h2>
         </div>
         <div class="content controls">
            @foreach($role->groups as $group)
            <div class="form-row">
               <div class="col-md-2"><b>Group</b></div>
               <div class="col-md-8">{{{ $group->displayName }}}</div>
               <div class="col-md-2">
                  <a class="btn btn-xs btn-danger" data-method="DELETE"
                     href="{{ URL::route('perm.role.del_group', $role->id) }}">
                     <i class="icon-remove"></i>
                  </a>
               </div>
            </div>
            @endforeach

            @if(count($groups) != 0)
            {{ Form::open(['method' => 'POST', 'route' => ['perm.role.add_group', $role->id]]) }}
            <div class="form-row">
               <div class="col-md-2">{{ Form::label('group', 'Add group:') }}</div>
               <div class="col-md-8">{{ Form::select('group', $groups) }}</div>
               <div class="col-md-2">{{ Form::submit('Add') }}</div>
            </div>
            {{ Form::close() }}
            @endif
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