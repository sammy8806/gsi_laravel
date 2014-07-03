<?php

class UserPermission extends Eloquent {

   public $timestamps = false;
   protected $table = 'user_permission';
   protected $fillable = ['name', 'display_name'];

   public function users() {
      return $this->belongsToMany('Users');
   }

   public function rights() {
      return $this->belongsToMany('UserRight');
   }

} 