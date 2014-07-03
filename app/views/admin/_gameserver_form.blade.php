<div class="form-row">
   <div class="col-md-3">{{ Form::label('game', 'Game:') }}</div>
   <div class="col-md-9">{{ Form::select('game', $games) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('user', 'User:') }}</div>
   <div class="col-md-9">{{ Form::select('user', $users) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('slot', 'Slot:') }}</div>
   <div class="col-md-9">{{ Form::text('slot') }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('memory', 'Memory:') }}</div>
   <div class="col-md-9">{{ Form::text('memory') }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('status', 'Status:') }}</div>
   <div class="col-md-9">{{ Form::select('status', ['active' => 'active', 'blocked' => 'blocked', 'maintanance' => 'maintanance']) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('ip', 'IP:') }}</div>
   <div class="col-md-9">{{ Form::select('ip', $ips) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('port', 'Port:') }}</div>
   <div class="col-md-9">{{ Form::text('port', $port) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('displayName', 'Display Name:') }}</div>
   <div class="col-md-9">{{ Form::text('displayName') }}</div>
</div>
<div class="form-row">
   <div class="col-md-9 col-md-offset-3">
      {{ Form::submit('Save') }}
   </div>
</div>