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
      //
   }


   /**
    * Update the specified resource in storage.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function update($id) {
      //
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

}
