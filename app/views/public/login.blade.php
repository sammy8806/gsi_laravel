<!DOCTYPE html>
<html lang="en">
<head>
   <!--    <base href="http://cp.play-arena.de/public/" />-->
   <title>Play-Arena Control Panel</title>

   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

   <link rel="icon" type="image/ico" href="favicon.ico"/>

   <link href="/assets/css/stylesheets.css" rel="stylesheet" type="text/css"/>


</head>

<body class="wall-num6">
<div class="container theme-black container-fixed">

   <div class="login-block">
      <div class="block block-transparent">
         <div class="head">
            <div class="user">
               <div class="info user-change" style="opacity: 1;">
                  <img src="/assets/img/user.jpg" class="img-circle img-thumbnail">

               </div>
            </div>
         </div>
         <div class="content controls npt">
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
            {{ Form::model($user, ['method' => 'POST', 'action' => ['LoginController@postLogin']]) }}
            <div class="form-row user-change-row" style="display: block;">
               <div class="col-md-12">
                  {{ Form::label('username', 'User:', ['class' => 'invisible']) }}
                  <div class="input-group">
                     <div class="input-group-addon">
                        <span class="icon-user"></span>
                     </div>
                     {{ Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Username']) }}
                  </div>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-12">
                  {{ Form::label('password', 'Password:', ['class' => 'invisible']) }}
                  <div class="input-group">
                     <div class="input-group-addon">
                        <span class="icon-key"></span>
                     </div>
                     {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                  </div>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-12">
                  <div class="checkbox-inline">{{ Form::checkbox('stay', 1, null, ['class' => 'btn btn-default btn-block btn-clean']) }}</div>
                  {{ Form::label('stay', 'Stay Logged-In') }}
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-12">
                  {{ Form::submit('Log In', ['class' => 'btn btn-default btn-block btn-clean']) }}
               </div>
            </div>
<!--            <div class="form-row">-->
<!--               <div class="col-md-12">-->
<!--                  <a href="{{ action('LoginController@getRegister') }}" class="btn btn-default btn-block btn-clean">Register</a>-->
<!--               </div>-->
<!--            </div>-->
<!--            <div class="form-row">-->
<!--               <div class="col-md-12">-->
<!--                  <a href="#" class="btn btn-link btn-block">Forgot your password?</a>-->
<!--               </div>-->
<!--            </div>-->
         </div>
      </div>
   </div>

</div>
<script type="text/javascript" src="/assets/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/jquery/globalize.js"></script>
<script type="text/javascript" src="/assets/js/plugins/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript" src="/assets/js/plugins/uniform/jquery.uniform.min.js"></script>

<script type="text/javascript" src="/assets/js/plugins.js"></script>
<script type="text/javascript" src="/assets/js/actions.js"></script>
<!--<script type="text/javascript" src="/assets/js/settings.js"></script>-->
</body>
</html>