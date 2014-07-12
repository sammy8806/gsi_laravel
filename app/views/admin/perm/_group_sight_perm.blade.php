<div class="block">
   <div class="header">
      <h2>Add Sight Permissions</h2>
   </div>
   <div class="content controls">
      {{ Form::open(['method' => 'POST', 'route' => ['perm.group.add_sightPermission', $group->id]]) }}
      <div class="form-row">
         <div class="col-md-4">{{ Form::label('permissionType', 'Type:') }}</div>
         <div class="col-md-8">{{ Form::select('permissionType', $sightPermissionTypes) }}</div>
      </div>
      <div class="form-row">
         <div class="col-md-4">{{ Form::label('appObjectId', 'ID:') }}</div>
         <div class="col-md-8">{{ Form::text('appObjectId') }}</div>
      </div>
      @foreach(['read', 'write', 'link', 'delete'] as $type)
      <div class="form-row">
         <div class="col-md-4">{{ Form::label($type.'Permission', ucfirst($type).':') }}</div>
         <div class="col-md-8">
            <div class="checkbox-inline">{{ Form::checkbox($type.'Permission') }}</div>
         </div>
      </div>
      @endforeach
      <div class="form-row">
         <div class="col-md-offset-4 col-md-4">{{ Form::submit('Add') }}</div>
      </div>
      {{ Form::close() }}
   </div>
</div>
@if(count($group->sightPermissions) > 0)
<div class="block">
   <div class="header">
      <h2>Granted Sight Permissions</h2>
   </div>
   <div class="content controls">
      @foreach($group->sightPermissions as $sight)
      <div class="form-row">
         <div class="col-md-2"><b>{{{ $sight->sightPermissionTypes[0]->objectName }}}</b></div>
         <div class="col-md-8">#{{{ $sight->appObjectId }}}</div>
         <div class="col-md-2">
            <a class="btn btn-xs btn-danger" data-method="DELETE"
               href="{{ URL::route('perm.group.del_sightPermission', [$group->id,$sight->id]) }}">
               <i class="icon-remove"></i>
            </a>
         </div>
      </div>
      @endforeach
   </div>
</div>
@endif