<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 30.06.14
 * Time: 18:52
 */

class UserRole extends Eloquent {

   public $timestamps = false;
   protected $table = 'user_role';
   protected $fillable = ['name'];

   public function rights() {
      return $this->hasMany('UserRight');
   }

   public function group() {
      return $this->belongsToMany('Group');
   }

} 