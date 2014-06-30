@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('GameController@index') }}}">{{{ Lang::get('site.gameserver.games') }}}</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="header">
            <h2><i class="icon-list"> {{{ Lang::get('site.gameserver.games') }}}</i></h2>&nbsp;
            <a class="btn btn-xs" href="{{ action('GameController@create') }}"><i class="icon-plus"></i> {{{ Lang::get('site.gameserver.game_add') }}}</a>
         </div>
         <div class="content">
            <table class="table table-bordered table-striped">
               <tr>
                  <th>Game</th>
                  <th>Actions</th>
               </tr>
               @foreach($games as $game)
               <tr>
                  <td>{{ $game->name }}</td>
                  <td>
                     <a class="btn btn-xs btn-danger" data-method="delete" href="{{ URL::action('GameController@destroy', [$game->id]) }}">
                        <i class="icon-remove-sign"></i>
                        Delete
                     </a>
                  </td>
               </tr>
               @endforeach
            </table>
            <br />
         </div>
      </div>

   </div>
</div>
@stop

@section('scripts')
@parent
<script language="JavaScript">
   $(document).on('click', '[data-method]', function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('href'),
         type: 'DELETE',
         success: function(data, textStatus, jqXHR) {
            console.log('delete success');
            window.location.reload()
         }
      })
   })
</script>
@stop