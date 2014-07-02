<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 03.07.14
 * Time: 00:09
 */

class ActionController extends BaseController {

   public function push() {

      $req = new \Jyggen\Curl\Request('http://176.100.32.2:8080');
      $req->setOption(CURLOPT_FOLLOWLOCATION, true);
      $req->setOption(CURLOPT_POST, true);
      $req->execute();

      if ($req->isSuccessful()) {
         return $req->getRawResponse();
      } else {
         throw new \Jyggen\Curl\Exception\CurlErrorException($req->getErrorMessage());
      }

   }

} 