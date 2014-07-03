@extends('layouts.master')

@section('breadcrumb')
@parent
<li><a href="{{{ URL::action('ScriptController@index') }}}">{{{ Lang::get('site.script.scripts') }}}</a></li>
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="block">
         <div class="header">
            <h2><i class="icon-list"> {{{ Lang::get('site.script.scripts') }}}</i></h2>&nbsp;
            <a class="btn btn-xs" href="{{ action('ScriptController@create') }}"><i class="icon-plus"></i> {{{ Lang::get('site.script.add') }}}</a>
         </div>
         <div class="content">
            <table class="table table-bordered table-striped">
               <tr>
                  <th>Script</th>
                  <th>Interpreter</th>
                  <th>Type</th>
                  <th>Actions</th>
               </tr>
               @foreach($scripts as $script)
               <tr>
                  <td>{{ $script->name }}</td>
                  <td>{{ $script->interpreter }}</td>
                  <td>{{ $script->type }}</td>
                  <td>
                      <a class="btn btn-xs btn-link" href="{{ URL::action('ScriptController@edit', [$script->id]) }}">
                          <i class="icon-edit-sign"></i>
                          Edit
                      </a>
                     <a class="btn btn-xs btn-danger" data-method="delete" href="{{ URL::action('ScriptController@destroy', [$script->id]) }}">
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