@extends('layouts.master')

@section('content')
@if(Session::has('errors'))
<div class="block">
   {{-- Session::get('errors')->getMessages() --}}
   @foreach(Session::get('errors')->getMessages() as $error)
   @foreach($error as $error_data)
   <div class="alert alert-danger">
      <b>Error:</b> {{ $error_data }}
   </div>
   @endforeach
   @endforeach
</div>
@endif
<div class="row">
   <div class="col-md-6">
      <div class="block">
         <div class="header">
            <h2>User Add</h2>
         </div>
         <div class="content controls">
            {{ Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) }}
            @include('admin._user_form')
            {{ Form::close() }}
         </div>
      </div>
   </div>
   <div class="col-md-6">
      @include('admin.perm._user_sight_perm')
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
         },
         error: function (e) {
            console.log(e.responseText);
         }
      })
   })
</script>
@stop