<div class="form-row">
   <div class="col-md-3">{{ Form::label('title', Lang::get('site.ticketform.title')) }}</div>
   <div class="col-md-9">{{ Form::text('title') }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('text', Lang::get('site.ticketform.text')) }}</div>
   <div class="col-md-9">{{ Form::textarea('text') }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('status', Lang::get('site.ticketform.status')) }}</div>
   <div class="col-md-9">{{ Form::select('status', ['open' => 'open', 'closed' => 'closed']) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('priority', Lang::get('site.ticketform.priority')) }}</div>
   <div class="col-md-9">{{ Form::select('priority', ['high' => 'high', 'medium' => 'medium', 'low' => 'low']) }}</div>
</div>
<div class="form-row">
   <div class="col-md-3">{{ Form::label('category', Lang::get('site.ticketform.category')) }}</div>
   <div class="col-md-9">{{ Form::select('category', $categories) }}</div>
</div>
<div class="form-row">
   <div class="col-md-9 col-md-offset-3">
      {{ Form::submit(Lang::get('site.ticketform.save')) }}
   </div>
</div>