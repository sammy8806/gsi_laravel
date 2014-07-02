<?php

class UserPermission extends Eloquent {

   protected $table = 'user_permission';

   protected $fillable = ['name', 'display_name'];

   public $timestamps = false;

   public function users() {
      return $this->belongsToMany('Users');
   }

   public function rights() {
      return $this->belongsToMany('UserRight');
   }

} 