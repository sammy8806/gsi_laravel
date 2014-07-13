<?php

/**
 * Created by PhpStorm.
 * User: steven
 * Date: 30.06.14
 * Time: 18:52
 */
class UserRole extends Eloquent {

   public $timestamps = false;
   protected $table = 'user_roles';
   protected $fillable = ['displayName', 'description'];

   public function permissions() {
      return $this->belongsToMany('UserPermission', 'dep_role2permission', 'role_id', 'permission_id');
   }

   public function groups() {
      return $this->belongsToMany('UserGroup', 'dep_role2group', 'role_id', 'group_id');
   }

   public function users() {
      return $this->belongsToMany('User', 'dep_role2user', 'role_id', 'user_id');
   }

}