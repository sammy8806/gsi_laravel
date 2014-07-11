<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

   use UserTrait, RemindableTrait, SoftDeletingTrait;

   /**
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'users';

   /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
   protected $hidden = array('password', 'remember_token');

   protected $fillable = [
         'first_name',
         'last_name',
         'email',
         'customLoginName',
         'lastLogin',
         'lastLoginIP',
         'lastLoginDate',
         'active',
         'address',
         'phone',
         'cellnumber'
   ];
   protected $guarded = ['password'];
   protected $dates = ['deleted_at'];

   public function gameservers() {
      return $this->hasMany('Gameserver');
   }

   public function tickets() {
      return $this->hasMany('Ticket');
   }

   public function groups() {
      return $this->hasMany('UserGroup');
   }

   public function roles() {
      return $this->hasMany('UserRole');
   }

   public function sightPermissions() {
      return $this->belongsToMany('UserSightPermission', 'dep_sight_permission2user', 'user_id', 'sight_permission_id');
   }

   /**
    * @param String $role_name Name of the Role
    * @param bool $include_indirect Should we search recusively (Groups)?
    *
    * @return bool
    */
   public function hasRole($role_name, $include_indirect = true) {
      foreach ($this->roles as $role) {
         if ($role->name == $role_name) {
            return true;
         }
      }

      if ($include_indirect) {
         foreach ($this->groups as $group) {
            if ($group->hasRole($role_name)) {
               return true;
            }
         }
      }

      return false;
   }

   /**
    * @param String $group_name Name of the searched Group
    *
    * @return bool
    */
   public function hasGroup($group_name) {
      foreach ($this->groups as $group) {
         if ($group->name == $group_name) {
            return true;
         }
      }

      return false;
   }

   /**
    * @param Model $object The asked object
    * @param string $action Name of the action (read,write,link,delete)
    *
    * @return bool
    */
   public function hasPermission($object, $action = 'read') {
      $className = get_class($object);
//      $type = UserSightPermissionType::where('objectName', '=', $className)->get()->first();
      $perms = $this->sightPermissions;

      /** @var UserSightPermission $perm */
      foreach ($perms as $perm) {
         if ($perm == null) {
            continue;
         }

         /** @var UserSightPermissionType $type */
         $type = $perm->sightPermissionTypes()->first();
         if ($type->objectName != $className) {
            continue;
         } else {
            if ($perm->appObjectId == $object->id && $perm->{$action . 'Permission'} == true) {
               return true;
            }
         }
      }

      return false;
   }

   public function grantPermission($object, $rights = array('r' => true, 'w' => true, 'l' => true, 'd' => false)) {
      $className = get_class($object);
      /** @var UserSightPermissionType $type */
      $type = UserSightPermissionType::where('objectName', '=', $className)->get()[0];
      $perm = new UserSightPermission();
      $perm->appObjectId = $object->id;
      $perm->readPermission = $rights['r'];
      $perm->writePermission = $rights['w'];
      $perm->linkPermission = $rights['l'];
      $perm->deletePermission = $rights['d'];
      $perm->save();

      $perm->sightPermissionTypes()->attach($type);
      $perm->save();

      $this->sightPermissions()->attach($perm);
   }

   public function revokePermission($object) {
      $className = get_class($object);

      /** @var UserSightPermissionType $type */
      $type = UserSightPermissionType::where('objectName', '=', $className);

      /** @var UserSightPermission[] $perm */
      $perm = UserSightPermission::where('appObjectId', '=', $object->id)->get();
      foreach ($perm as $p) {
         if ($p->sightPermissionTypes[0]->objectName == $className) {
            $p->delete();
         }
      }
   }

//    public function tickets()
//    {
//        return $this->hasMany('Ticket');
//    }
//
//    public function actionLogEntrys()
//    {
//        return $this->hasMany('ActionLogEntry');
//    }

}
