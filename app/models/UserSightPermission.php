<?php

/**
 * Created by PhpStorm.
 * User: steven
 * Date: 30.06.14
 * Time: 19:02
 */
class UserSightPermission extends Eloquent {

   protected $table = 'user_sight_permissions';
   protected $timestamps = false;
   protected $fillable = ['objectId', 'readPermission', 'writePermission', 'linkPermission', 'deletePermission'];

   public function users() {
      return $this->belongsToMany('User', 'dep_sight_permission2user', 'sight_permission_id', 'user_id');
   }

   public function groups() {
      return $this->belongsToMany('UserGroup', 'dep_sight_permission2group', 'sight_permission_id', 'group_id');
   }

   public function sightPermissionTypes() {
      return $this->belongsToMany('UserSightPermissionType', 'dep_sight_permission2sight_permission_type',
            'sight_permission_id', 'sight_permission_type_id');
   }

} 