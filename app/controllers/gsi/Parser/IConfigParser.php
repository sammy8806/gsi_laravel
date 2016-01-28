<?php
/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 09.08.14
 * Time: 00:18
 */

namespace GSI\Parser;


interface IConfigParser {

   public function parseConfig($string);

   public function generateConfig($config);

}