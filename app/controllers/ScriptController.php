<?php

class ScriptController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.script_list', ['scripts' => Script::all()]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.script_add', ['script' => new Script()]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $rules = [
            'name' => 'AlphaNum|Required',
            'interpreter' => '',
            'type' => 'AlphaNum|Required',
            'commands' => 'Required'
        ];

        $v = Validator::make(Input::all(), $rules);

        if($v->passes()) {
            $script = new Script();
            $script->fill(Input::all());
            $script->save();

            return Redirect::action('ScriptController@index');
        } else {
            return Redirect::action('ScriptController@index')->withErrors($v->getMessageBag());
        }

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
