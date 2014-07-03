<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 03.07.14
 * Time: 00:09
 */

class ActionController extends BaseController {

   public function getPush() {

      list($script, $host) = Session::get('action_data');

      if(!$script) {
         return Redirect::action('GameserverController@index')->with("Really nope");
      }

      $commands = $script->commands;

//      dd($commands);

      if(!($commands != ""))
         return Redirect::action('GameserverController@index')->with("Nope");

      if($host == "") {
         return Redirect::action('GameserverController@index')->with("wat");
      }

      $req = new \Jyggen\Curl\Request('http://' . $host);
      $req->setOption(CURLOPT_CONNECTTIMEOUT, 1);
      $req->setOption(CURLOPT_TIMEOUT, 1);
      $req->setOption(CURLOPT_FOLLOWLOCATION, true);
      $req->setOption(CURLOPT_POST, true);
      $req->setOption(CURLOPT_POSTFIELDS, 'commandline='.urlencode($commands));
      $req->execute();

      if ($req->isSuccessful()) {
//         return $req->getRawResponse();
         return Redirect::action('GameserverController@index');
      } else {
//         throw new \Jyggen\Curl\Exception\CurlErrorException($req->getErrorMessage());
         return Redirect::action('GameserverController@index')->with($req->getErrorMessage());
      }

   }

}