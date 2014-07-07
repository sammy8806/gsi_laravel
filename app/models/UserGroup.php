<?php

/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 05.07.14
 * Time: 01:39
 */
class UserGroup extends Eloquent {

   protected $table = 'user_groups';
   public $timestamps = false;
   protected $fillable = ['displayName', 'description'];

   public function roles() {
      return $this->belongsToMany('UserRole', 'dep_role2group', 'role_id', 'group_id');
   }

   public function users() {
      return $this->belongsToMany('User', 'dep_group2user', 'group_id', 'user_id');
   }

   public function sightPermissions() {
      return $this->belongsToMany('UserSightPermission', 'dep_sight_permission2group', 'group_id',
            'sight_permission_id');
   }

}