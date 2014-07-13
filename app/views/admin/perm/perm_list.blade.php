@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ route('perm.permission.list') }}}">{{{ Lang::get('site.permissions.permissions') }}}</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="header">
            <h2><i class="icon-permission"> {{{ Lang::get('site.permissions.permissions') }}}</i></h2>&nbsp;
            <a class="btn btn-xs" href="{{ route('perm.permission.create') }}">
               <i class="icon-plus"></i> {{{ Lang::get('site.permissions.permission_add') }}}
            </a>
         </div>
         <div class="content">
            <table class="table table-bordered table-striped">
               <tr>
                  <th>Name</th>
                  <th>Attached Roles</th>
                  <th>Value</th>
                  <th>Actions</th>
               </tr>
               @foreach($permissions as $permission)
               <tr>
                  <td>{{{ $permission->displayName }}}</td>
                  <td>
                     <ul>
                        @foreach($permission->roles as $role)
                        <li>{{{ $role->displayName }}}</li>
                        @endforeach
                     </ul>
                  </td>
                  <td>
                     {{{ $permission->value }}}
                  </td>
                  <td>
                     <a class="btn btn-xs btn-link" href="{{ URL::route('perm.permission.edit', [$permission->id]) }}">
                        <i class="icon-edit-sign"></i>
                        Edit
                     </a>
                     <a class="btn btn-xs btn-danger" data-method="DELETE"
                        href="{{ URL::route('perm.permission.destroy', [$permission->id]) }}">
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