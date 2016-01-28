<?php

/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 09.08.14
 * Time: 00:37
 */
class ConfigManagerController extends BaseController {

   /**
    * @param Game $game
    *
    * @return string Json
    */
   public function getTemplateFile(Game $game) {

   }

   /**
    * @param String $template JSON
    * @param String $filename
    * @param string $path Relative file-path
    *
    * @return array key => value
    */
   public function getConfigFromTemplate($template, $filename, $path = '/') {

   }

   /**
    * @param string $template
    * @param string $filename
    * @param string $path
    *
    * @return bool
    */
   public function writeConfigFile($template, $filename, $path = '/') {

   }

   protected function getConfigDiff($configTemplate, $newConfig) {

   }

} 