<?php

class GameserverController extends \BaseController {

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index() {
      $gameservers = Gameserver::all();

      return View::make('user/gameserver_list', ['gameservers' => $gameservers]);
   }


   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create() {

      $games = [];
      foreach (Game::all() as $game) {
         $games[$game->id] = $game->name;
      }

      $ips = [];
      foreach (Ip::all() as $ip) {
         $ips[$ip->id] = $ip->ip;
      }

      $users = [];
      foreach (User::all() as $user) {
         $users[$user->id] = $user->email;
      }

      return View::make('admin.gameserver_add', [
            'gameserver' => new Gameserver(),
            'games'      => $games,
            'ips'        => $ips,
            'users'      => $users,
      ]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store() {
      $rules = [
            'slot'        => 'Integer',
            'memory'      => 'Integer|Min:128|Max:10240', // from 128MB to 10G
            'status'      => 'Required',
            'ip'          => 'Required',
            'port'        => 'Integer|Min:1024|Max:65534|Required',
            'displayName' => '',
            'user'        => 'Required|Exists:users,id'
      ];

      $v = Validator::make(Input::all(), $rules);

      if ($v->passes()) {

         $ip_port = new GameserverIp();
         $ip_port->port = Input::get('port');

         $ip = Ip::find(Input::get('ip'));
         $ip_port->ip()->associate($ip);
         $ip_port->save();

         $user = User::find(Input::get('user'));
         $game = Game::find(Input::get('game'));

         $gameserver = new Gameserver();
         $gameserver->fill(Input::all());
         $gameserver->ipport()->associate($ip_port);
         $gameserver->user()->associate($user);
         $gameserver->game()->associate($game);
         $gameserver->save();

         return Redirect::action('GameserverController@index');
      } else {
         return Redirect::action('GameserverController@create')->withErrors($v->getMessageBag());
      }

   }


   /**
    * Display the specified resource.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function show($id) {
      $gameserver = Gameserver::find($id);

      return View::make('user.gameserver_show', ['gameserver' => $gameserver]);
   }


   /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function edit($id) {

      $gameserver = Gameserver::findOrFail($id);

      $games = [];
      foreach (Game::all() as $game) {
         $games[$game->id] = $game->name;
      }

      $users = [];
      foreach (User::all() as $user) {
         $users[$user->id] = $user->email;
      }

      $ips = [];
      foreach (Ip::all() as $ip) {
         $ips[$ip->id] = $ip->ip;
      }

      $port = $gameserver->ipport->port;

      return View::make('admin.gameserver_edit', [
            'gameserver'    => $gameserver,
            'games'         => $games,
            'ips'           => $ips,
            'users'         => $users,
            'port'          => $port,
            'game_selected' => $gameserver->game->id,
            'user_selected' => $gameserver->user->id,
            'ip_selected'   => $gameserver->ipport->ip->id
      ]);

   }


   /**
    * Update the specified resource in storage.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function update($id) {
      $rules = [
            'slot'        => 'Integer',
            'memory'      => 'Integer|Min:128|Max:10240', // from 128MB to 10G
            'status'      => 'Required',
            'ip'          => 'Required',
            'port'        => 'Integer|Min:1024|Max:65534|Required',
            'displayName' => '',
            'user'        => 'Required|Exists:users,id'
      ];

      $v = Validator::make(Input::all(), $rules);

      if ($v->passes()) {

         $user = User::find(Input::get('user'));
         $game = Game::find(Input::get('game'));

         /** @var Gameserver $gameserver */
         $gameserver = Gameserver::findOrFail($id);
         $gameserver->fill(Input::all());

         /** @var GameserverIp $ipport */
         $ipport = $gameserver->ipport;

         if($gameserver->ipport->ip->id != Input::get('ip')) {
            $ipport->ip()->associate(Ip::findOrFail(Input::get('ip')));
            $ipport->save();
         }

         if($gameserver->ipport->port != Input::get('port')) {
            $ipport->port = Input::get('port');
            $ipport->save();
         }

         $gameserver->user()->associate($user);

         if ($gameserver->game->id != $game->id) {
            $gameserver->game()->associate($game);
         }

         $gameserver->save();

         return Redirect::action('GameserverController@index');
      } else {
         return Redirect::action('GameserverController@update', $id)->withErrors($v->getMessageBag());
      }
   }


   /**
    * Remove the specified resource from storage.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function destroy($id) {
      GameserverIp::destroy(Gameserver::findOrFail($id));
      Gameserver::destroy($id);
   }

}
