<div class="form-row">
    <div class="col-md-3">{{ Form::label('customLoginName', 'Login Name:') }}</div>
    <div class="col-md-9">{{ Form::text('customLoginName') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('email', 'Email:') }}</div>
    <div class="col-md-9">{{ Form::email('email') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('status', 'Status:') }}</div>
    <div class="col-md-9">{{ Form::select('status', ['active' => 'active', 'blocked' => 'blocked', 'tempBanned' => 'tempBanned']) }}</div>
</div>

<div class="form-row">
    <div class="col-md-3">{{ Form::label('first_name', 'First Name:') }}</div>
    <div class="col-md-9">{{ Form::text('first_name') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('last_name', 'Last Name:') }}</div>
    <div class="col-md-9">{{ Form::text('last_name') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('address', 'Address:') }}</div>
    <div class="col-md-9">{{ Form::text('address') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('phone', 'Phone:') }}</div>
    <div class="col-md-9">{{ Form::text('phone') }}</div>
</div>
<div class="form-row">
    <div class="col-md-3">{{ Form::label('cellnumber', 'Cellular Number:') }}</div>
    <div class="col-md-9">{{ Form::text('cellnumber') }}</div>
</div>
<div class="form-row">
    <div class="col-md-9 col-md-offset-3">
        {{ Form::submit('Save') }}
    </div>
</div>
