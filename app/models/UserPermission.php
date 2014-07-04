<?php

class UserPermission extends Eloquent {

   public $timestamps = false;
   protected $table = 'permissions';
   protected $fillable = ['name', 'value', 'display_name'];

   public function roles() {
      return $this->hasMany('UserRole');
   }

}