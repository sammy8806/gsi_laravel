<div class="form-row">
    <div class="col-md-3">{{ Form::label('name', 'Name:') }}</div>
    <div class="col-md-9">{{ Form::text('name') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('interpreter', 'Interpreter:') }}</div>
    <div class="col-md-9">{{ Form::text('interpreter') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('commands', 'Commands:') }}</div>
    <div class="col-md-9">{{ Form::textarea('commands') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('type', 'Type:') }}</div>
    <div class="col-md-9">{{ Form::select('type', [
        'start' => 'Start',
        'stop' =>'Stop',
        'install' => 'Install',
        'backup' => 'Backup',
        'delete' => 'Delete',
        'reinstall' => 'Reinstall'
        ]) }}
    </div>
</div>
<div class="form-row">
    <div class="col-md-9 col-md-offset-3">
        {{ Form::submit('Save') }}
    </div>
</div>