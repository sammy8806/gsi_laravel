<?php

/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 05.07.14
 * Time: 01:40
 */
class UserSightPermissionType extends Eloquent {

   protected $table = 'sightPermissionType';
   protected $timestamps = false;
   protected $fillable = ['objectName'];

   public function sightPermissions() {
      return $this->hasMany('UserSightPermission');
   }

} 