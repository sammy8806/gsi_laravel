<?php

class UserPermission extends Eloquent {

   public $timestamps = false;
   protected $table = 'user_permissions';
   protected $fillable = ['name', 'value', 'displayName'];

   public function roles() {
      return $this->hasMany('UserRole');
   }

}