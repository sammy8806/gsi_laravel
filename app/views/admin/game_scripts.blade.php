@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('GameController@index') }}}">{{{ Lang::get('site.gameserver.games') }}}</a></li>
<li><a href="{{{ URL::action('GameController@show', [$game->id]) }}}">{{$game->name}}</a></li>
<li><a href="{{{ URL::action('GameController@getScript', $game->id) }}}">{{{ Lang::get('site.gameserver.scripts') }}}</a></li>
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
            <h2>Active Scripts</h2>
         </div>
         <div class="content controls">
            @foreach($scripts as $key => $script)
            <div class="form-row">
               <div class="col-md-3">{{ ucfirst($key . '-Script:') }}</div>
               <div class="col-md-9">
                  @foreach($script as $i)
                  @if($i->id > 0)
                  <a class="btn btn-xs btn-danger" data-method="DELETE"
                     href="{{ URL::action('GameController@deleteScript', [$game->id, $i->id]) }}">
                     <i class="icon-remove"></i>
                  </a>
                  {{ $i->name }}
                  ({{ $i->id }})
                  @else
                  {{ $i->name }}
                  @endif
                  <br/>
                  @endforeach
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>Script Add</h2>
         </div>
         <div class="content controls">
            {{ Form::model($game, ['method' => 'PATCH', 'action' => ['GameController@patchScript', $game->id]]) }}
            <div class="form-row">
               <div class="col-md-3">{{ Form::label('script', 'Script:') }}</div>
               <div class="col-md-9">{{ Form::select('script', $script_list) }}
               </div>
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
</div>
@stop

@section('scripts')
@parent
<script language="JavaScript">
   $(document).on('click', '[data-method]', function (e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('href'),
         type: 'DELETE',
         success: function (data, textStatus, jqXHR) {
            console.log('delete success');
            window.location.reload()
         }
      })
   })
</script>
@stop