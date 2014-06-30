<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
 * Created by PhpStorm.
 * User: steven
 * Date: 28.06.14
 * Time: 03:36
 */

class Game extends Eloquent {

   use SoftDeletingTrait;

   protected $table = 'games';

   protected $fillable = ['name', 'short', 'live_console', 'check_type'];
   protected $dates = ['deleted_at'];

   public function scripts() {
      return $this->belongsToMany('Script');
   }

   public function gameservers() {
      return $this->hasMany('Gameserver');
   }

} 