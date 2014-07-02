<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 03.07.14
 * Time: 00:09
 */

class ActionController extends BaseController {

   public function push($host, $commands) {

      $req = new \Jyggen\Curl\Request('http://' . $host);
      $req->setOption(CURLOPT_FOLLOWLOCATION, true);
      $req->setOption(CURLOPT_POST, true);
      $req->setOption(CURLOPT_POSTFIELDS, ['commandline' => $commands]);
      $req->execute();

      if ($req->isSuccessful()) {
         return $req->getRawResponse();
      } else {
         throw new \Jyggen\Curl\Exception\CurlErrorException($req->getErrorMessage());
      }

   }

} 