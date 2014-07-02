<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 28.06.14
 * Time: 03:42
 */

class Ip extends Eloquent {

   protected $table = 'ips';

   protected $fillable = ['ip'];

   public function hosts() {
      return $this->belongsTo('Host');
   }

//   public function gameservers() {
//      return $this->belongsTo('Gameserver');
//   }

   public function gameserver_ips() {
      return $this->hasMany('GameserverIp');
   }

}