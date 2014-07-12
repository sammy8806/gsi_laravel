@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ route('perm.group.list') }}}">{{{ Lang::get('site.permissions.groups') }}}</a></li>
<li><a href="{{{ route('perm.group.edit', $group->id) }}}">{{{ Lang::get('site.permissions.group_edit') }}}</a></li>
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
   <div class="col-md-4">
   <div class="block">
         <div class="header">
            <h2>{{{ Lang::get('site.permissions.group_edit') }}}</h2>
         </div>
         <div class="content controls">
            {{ Form::model($group, ['method' => 'PATCH', 'route' => ['perm.group.update', $group->id]]) }}
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
   <div class="col-md-4">
      <div class="block">
         <div class="header">
            <h2>Affected Users</h2>
         </div>
         <div class="content controls">
            @foreach($group->users as $user)
            <div class="form-row">
               <div class="col-md-3">User:</div>
               <div class="col-md-7">{{{ $user->customLoginName }}} ({{{ $user->email }}})</div>
               <div class="col-md-2">
                  <a class="btn btn-xs btn-danger" data-method="DELETE"
                     href="{{ URL::route('perm.group.del_user', [$group->id, $user->id]) }}">
                  <i class="icon-remove"></i>
                  </a>
               </div>
            </div>
            @endforeach

            @if(count($users) != 0)
            {{ Form::open(['method' => 'POST', 'route' => ['perm.group.add_user', $group->id]]) }}
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('user', 'Add User:') }}</div>
               <div class="col-md-7">{{ Form::select('user', $users) }}</div>
               <div class="col-md-2">{{ Form::submit('Add') }}</div>
            </div>
            {{ Form::close() }}
            @endif
         </div>
      </div>
      <div class="block">
         <div class="header">
            <h2>Affected Roles</h2>
         </div>
         <div class="content controls">
            @foreach($group->roles as $role)
            <div class="form-row">
               <div class="col-md-3">Role:</div>
               <div class="col-md-7">{{{ $role->name }}}</div>
               <div class="col-md-3">
                  <a class="btn btn-xs btn-danger" data-method="DELETE"
                     href="{{ URL::route('perm.group.del_role', [$group->id, $role->id]) }}">
                     <i class="icon-remove"></i>
                  </a>
               </div>
            </div>
            @endforeach

            @if(count($roles) != 0)
            {{ Form::open(['method' => 'POST', 'route' => ['perm.group.add_role']]) }}
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('role', 'Add Role:') }}</div>
               <div class="col-md-7">{{ Form::select('role', $roles) }}</div>
               <div class="col-md-2">{{ Form::submit('Add') }}</div>
            </div>
            {{ Form::close() }}
            @endif
         </div>
      </div>
   </div>
   <div class="col-md-4">
      @include('admin.perm._group_sight_perm')
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