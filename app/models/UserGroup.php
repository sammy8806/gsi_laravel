<?php
use Illuminate\Database\Eloquent\Model;

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

   public function revokePermissionById($perm_id) {
      $perm = UserSightPermissionType::findOrFail($perm_id);

      return $perm->delete();
   }

   public function revokePermissionByObject($object) {
      $className = get_class($object);
      $return = [];

      /** @var UserSightPermission[] $perm */
      $perm = UserSightPermission::where('appObjectId', '=', $object->id)->get();
      foreach ($perm as $p) {
         if ($p->sightPermissionTypes[0]->objectName == $className) {
            $return[] = $p->delete();
         }
      }

      return $return;
   }

}