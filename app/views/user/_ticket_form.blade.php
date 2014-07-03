<div class="form-row">
   <div class="col-md-3">{{ Form::label('title', 'Title:') }}</div>
   <div class="col-md-9">{{ Form::text('title') }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('text', 'Text:') }}</div>
   <div class="col-md-9">{{ Form::textarea('text') }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('status', 'Status:') }}</div>
   <div class="col-md-9">{{ Form::select('status', ['open' => 'open', 'closed' => 'closed']) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('priority', 'Priority:') }}</div>
   <div class="col-md-9">{{ Form::select('priority', ['high' => 'high', 'medium' => 'medium', 'low' => 'low']) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('category', 'Category:') }}</div>
   <div class="col-md-9">{{ Form::select('category', $categories) }}</div>
</div>
<div class="form-row">
   <div class="col-md-9 col-md-offset-3">
      {{ Form::submit('Save') }}
   </div>
</div>