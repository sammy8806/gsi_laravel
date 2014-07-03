<?php

/**
 * Created by PhpStorm.
 * User: steven
 * Date: 30.06.14
 * Time: 12:18
 */
class IpController extends BaseController
{

    public function index()
    {
        return View::make('admin.ip_list', ['ips' => Ip::all()]);
    }

    public function create()
    {
        return View::make('admin.ip_create', ['ip' => new Ip()]);
    }

    public function store()
    {

        $rules = [
            'ip' => 'Required|Unique:ips'
        ];

        $v = Validator::make(Input::all(), $rules);

        if ($v->passes()) {

            $ip = new Ip();
            $ip->fill(Input::all());
            $ip->save();

            return Redirect::action('IpController@index');
        } else {
            return Redirect::action('IpController@index')->withErrors($v->getFallbackMessages());
        }

    }

    public function show($id)
    {

    }

    public function update($id)
    {
        $ip = Ip::findOrFail($id);
        $ip->fill(Input::all());
        $ip->save();

        return Redirect::action('IpController@index');
    }


    public function edit($id)
    {
        return View::make('admin.ip_edit', ['ip' => Ip::findOrFail($id)]);
    }


    public function destroy($id)
    {
        Ip::destroy($id);

        // return Redirect::route('ip.index');
    }

}