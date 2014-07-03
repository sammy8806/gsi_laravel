<?php

class GameController extends \BaseController {

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index() {
      return View::make('admin.game_list', ['games' => Game::all()]);
   }


   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create() {
      return View::make('admin.game_add', ['game' => new Game()]);
   }


   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store() {
      $game = new Game();
      $game->fill(Input::all());
      $game->save();

      return Redirect::action('GameController@index');
   }


   /**
    * Display the specified resource.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function show($id) {
      //
   }


   /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function edit($id) {
      return View::make('admin.game_edit', ['game' => Game::findOrFail($id)]);
   }


   /**
    * Update the specified resource in storage.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function update($id) {
      $game = Game::findOrFail($id);
      $game->fill(Input::all());
      $game->save();

      return Redirect::action('GameController@index');
   }


   /**
    * Remove the specified resource from storage.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function destroy($id) {
      //
   }

   public function getScript($id) {

      $scripts = [];

      $cats = array_unique(DB::table('scripts')->lists('type'));

      foreach ($cats as $script_type) {
         $script = Game::findOrFail($id)->scripts;
         if (count($script) == 0) {
            $scripts[$script_type][0] = new Game();
            $scripts[$script_type][0]->id = -1;
            $scripts[$script_type][0]->name = '---';
         } else {
            foreach ($script as $s) {
               if ($s->type == $script_type) {
                  $scripts[$script_type][] = $s;
               }
            }
         }
      }

      $script_list = [];

      foreach (Script::all() as $script) {
         $script_list[$script->id] = '[' . $script->type . '] ' . $script->name;
      }

      return View::make('admin.game_scripts',
            ['game' => Game::findOrFail($id), 'scripts' => $scripts, 'script_list' => $script_list]
      );
   }

   public function patchScript($id) {
      /** @var Game $game */
      $game = Game::findOrFail($id);
      if(count($game->scripts) > 1) {
         return Redirect::action('GameController@getScript', $id)->with('flash_notice', 'Can\'t add another script of this type');
      }

      $game->scripts()->attach(Input::get('script'));

      return Redirect::action('GameController@getScript', $id);
   }

   public function deleteScript($id, $scriptId) {
      /** @var Game $game */
      $game = Game::findOrFail($id);
      $game->scripts()->detach($scriptId);

      // return Redirect::action('GameController@getScript', $id);
   }

   public function postStartAction($gsId) {
      $action = Input::get('action');

      $gs = Gameserver::find($gsId);

      $scripts = $gs->game->scripts;
      $host = $gs->ipport->ip->ip . ':8080';

      /** @var Script $script_f */
      $script_f = null;

      foreach($scripts as $script) {
         if($script->type == $action) {
            $script_f = $script;
         }
      }

      return Redirect::action('ActionController@getPush')->with('action_data', [$script_f, $host]);
   }

}
