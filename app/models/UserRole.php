<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 30.06.14
 * Time: 18:52
 */

class UserRole extends Eloquent {

   public $timestamps = false;
   protected $table = 'role';
   protected $fillable = ['displayName', 'description'];

   public function permissions() {
      return $this->belongsToMany('UserPermission');
   }

   public function group() {
      return $this->belongsToMany('Group');
   }

   public function users() {
      return $this->belongsToMany('User');
   }

} 