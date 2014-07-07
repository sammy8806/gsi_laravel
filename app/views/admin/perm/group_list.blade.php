@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ route('perm.group.list') }}}">{{{ Lang::get('site.permissions.groups') }}}</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="header">
            <h2><i class="icon-group"> {{{ Lang::get('site.permissions.groups') }}}</i></h2>&nbsp;
            <a class="btn btn-xs" href="{{ route('perm.group.create') }}">
               <i class="icon-plus"></i> {{{ Lang::get('site.permissions.group_add') }}}
            </a>
         </div>
         <div class="content">
            <table class="table table-bordered table-striped">
               <tr>
                  <th>Name</th>
                  <th>Roles</th>
                  <th>Users</th>
                  <th>Actions</th>
               </tr>
               @foreach($groups as $group)
               <tr>
                  <td>{{{ $group->displayName }}}</td>
                  <td>
                     <ul>
                        @foreach($group->roles as $role)
                        <li>{{{ $role->displayName }}}</li>
                        @endforeach
                     </ul>
                  </td>
                  <td>
                     <ul>
                        @foreach($group->users as $user)
                        <li>{{{ $user->customLoginName }}}</li>
                        @endforeach
                     </ul>
                  </td>
                  <td>
                     <a class="btn btn-xs btn-link" href="{{ URL::route('perm.group.edit', [$group->id]) }}">
                        <i class="icon-edit-sign"></i>
                        Edit
                     </a>
                     <a class="btn btn-xs btn-danger" data-method="DELETE"
                        href="{{ URL::route('perm.group.destroy', [$group->id]) }}">
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