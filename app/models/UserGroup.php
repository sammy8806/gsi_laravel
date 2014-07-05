<?php

/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 05.07.14
 * Time: 01:39
 */
class UserGroup extends Eloquent {

   protected $table = 'user_groups';
   protected $timestamps = false;
   protected $fillable = ['displayName', 'description'];

   public function roles() {
      return $this->hasMany('UserRole');
   }

   public function users() {
      return $this->belongsToMany('User');
   }

   public function sightPermissions() {
      return $this->hasMany('UserSightPermission');
   }

} 