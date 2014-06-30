<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
 * Created by PhpStorm.
 * User: steven
 * Date: 28.06.14
 * Time: 03:33
 */

class Gameserver extends Eloquent {

   use SoftDeletingTrait;

   protected $table = 'gameservers';

   protected $fillable = ['weight'];
   protected $dates = ['deleted_at'];

   public function user() {
      return $this->belongsTo('User');
   }

   public function game() {
      return $this->belongsTo('Game');
   }

   public function ip() {
      return $this->hasMany('GameserverIp');
   }

}