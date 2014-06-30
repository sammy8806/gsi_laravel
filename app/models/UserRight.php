<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 30.06.14
 * Time: 19:02
 */

class UserRight extends Eloquent {

   protected $table = 'user_rights';

   protected $fillable = ['name', 'display_name'];

   public $timestamps = false;

   public function roles() {
      return $this->belongsToMany('UserRole');
   }

} 