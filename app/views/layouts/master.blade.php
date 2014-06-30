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
   <div class="row">
      <div class="col-md-12">

         <nav class="navbar brb" role="navigation">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse"
                       data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-reorder"></span>
               </button>
               <a class="navbar-brand" href="#"><img src="/assets/img/logo.png"/></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav">
                  <li>
                     <a href="{{{ URL::action('UserController@getDashboard') }}}">
                        <span class="icon-home"></span> {{{ Lang::get('site.navi.home') }}}
                     </a>
                  </li>
                  <li>
                     <a href="{{{ URL::action('GameserverController@index') }}}">
                        <span class="icon-th-large"></span> {{{ Lang::get('site.navi.gameserver') }}}
                     </a>
                  </li>
                  <li>
                     <a href="{{{ URL::action('GameController@index') }}}">
                        <span class="icon-gamepad"></span> {{{ Lang::get('site.navi.games') }}}
                     </a>
                  </li>
                  <li>
                     <a href="{{{ URL::action('IpController@index') }}}">
                        <span class="icon-list"></span> {{{ Lang::get('site.navi.ips') }}}
                     </a>
                  </li>
                  <li>
                     <a href="{{{ URL::action('UserController@index') }}}">
                        <span class="icon-user"></span> {{{ Lang::get('site.navi.users') }}}
                     </a>
                  </li>
<!--                  <li>-->
<!--                     <a href="{{{ URL::action('UserController@getSupportTickets') }}}">-->
<!--                        <span class="icon-comment"></span> {{{ Lang::get('site.navi.support') }}}-->
<!--                     </a>-->
<!--                  </li>-->
                  <li>
                        <a href="{{ action('LoginController@getLogout') }}">
                           <span class="icon-remove-sign"></span> {{{ Lang::get('site.navi.logout') }}} ({{ Auth::user()->customLoginName }})
                        </a>
                     </li>
                  </ul>
            </div>
         </nav>

      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            @section('breadcrumb')
            <li><a href="{{{ URL::action('UserController@getDashboard') }}}">Home</a></li>
            @show
         </ol>
      </div>
   </div>

   @yield('content')

   <div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            &copy; 2014 Play-Arena.net - all right reserved.
         </ol>
      </div>
   </div>


</div>
@section('scripts')
<script type='text/javascript' src='/assets/js/plugins/jquery/jquery.min.js'></script>
<script type='text/javascript' src='/assets/js/plugins/jquery/jquery-ui.min.js'></script>
<script type='text/javascript' src='/assets/js/plugins/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='/assets/js/plugins/jquery/globalize.js'></script>
<script type='text/javascript' src='/assets/js/plugins/bootstrap/bootstrap.min.js'></script>

<script type='text/javascript' src='/assets/js/plugins/uniform/jquery.uniform.min.js'></script>
<script type='text/javascript' src='/assets/js/plugins/select2/select2.min.js'></script>
<script type='text/javascript' src='/assets/js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
<script type='text/javascript' src='/assets/js/plugins/jquery/jquery-ui-timepicker-addon.js'></script>
<script type='text/javascript' src='/assets/js/plugins/ibutton/jquery.ibutton.js'></script>

<script type='text/javascript' src='/assets/js/plugins.js'></script>
<script type='text/javascript' src='/assets/js/actions.js'></script>
<script type='text/javascript' src='/assets/js/settings.js'></script>
@show
</body>
</html>
