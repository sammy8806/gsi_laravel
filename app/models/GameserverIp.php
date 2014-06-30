<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 28.06.14
 * Time: 03:45
 */

class GameserverIp extends Eloquent {

   protected $table = 'gameserver_ips';

   protected $fillable = ['port'];

   public function gameserver() {
      return $this->has('Gameserver');
   }

   public function ip() {
      return $this->belongsTo('Ip');
   }

}