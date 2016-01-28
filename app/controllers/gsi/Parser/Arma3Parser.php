<?php
/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 09.08.14
 * Time: 00:20
 */

namespace GSI\Parser;

include_once(dirname(__FILE__) . '/IConfigParser.php');


class Arma3Parser implements IConfigParser {

   public function parseConfig($string) {
      return ['content' => $string];
   }

   public function generateConfig($config) {
      return $config['content'];
   }
}