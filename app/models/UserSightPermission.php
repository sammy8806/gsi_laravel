<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 30.06.14
 * Time: 19:02
 */
class UserSightPermission extends Eloquent {

   protected $table = 'sightPermissions';
   protected $timestamps = false;
   protected $fillable = ['objectId', 'readPermission', 'writePermission', 'linkPermission', 'deletePermission'];

   public function users() {
      return $this->belongsToMany('User');
   }

   public function groups() {
      return $this->belongsToMany('UserGroup');
   }

   public function sightPermissionTypes() {
      return $this->belongsToMany('UserSightPermissionType');
   }

} 