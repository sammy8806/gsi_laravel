<?php

class PermissionAdminController extends BaseController {

   // Groups

   public function group_index() {
      return View::make('admin.perm.group_list', ['groups' => UserGroup::all()]);
   }

   public function group_edit($id) {
      $aff_users = [];

      foreach (UserGroup::find($id)->users as $user)
         $aff_users[] = $user->id;

      $users = [];
      /** @var User $user */
      foreach (User::all() as $user) {
         if (!in_array($user->id, $aff_users)) {
            $users[$user->id] = $user->customLoginName . ' (' . $user->email . ')';
         }
      }

      $aff_roles = [];

      foreach (UserGroup::find($id)->roles as $role)
         $aff_roles[] = $role->id;

      $roles = [];
      /** @var UserRole $role */
      foreach (UserRole::all() as $role) {
         if (!in_array($role->id, $aff_roles)) {
            $roles[$role->id] = $role->displayName;
         }
      }

      // Sight Permission Types

      /** @var UserSightPermissionType $sightPermissionType */
      $sightPermissionTypes = [];
      foreach (UserSightPermissionType::all() as $sightPermissionType) {
         $sightPermissionTypes[$sightPermissionType->id] = $sightPermissionType->objectName;
      }

      // Sight Permissions

      $aff_sightPerms = [];

      foreach (UserGroup::find($id)->sightPermissions as $sightPermission)
         $aff_sightPerms[] = $sightPermission->id;

      $sightPermissions = [];
      /** @var UserSightPermission $sightPermission */
      foreach (UserSightPermission::all() as $sightPermission) {
         if (!in_array($sightPermission->id, $aff_sightPerms)) {
            $sightPermissions[$sightPermission->id] = $sightPermission->sightPermissionTypes[0]->objectName;
         }
      }

      return View::make('admin.perm.group_edit', [
            'group'                => UserGroup::find($id),
            'users'                => $users,
            'roles'                => $roles,
            'sightPermissionTypes' => $sightPermissionTypes,
            'sightPermissions'     => $sightPermissions
      ]);
   }

   public function group_add_user($id) {
      UserGroup::findOrFail($id)->users()->attach(User::find(Input::get('user')));

      return Redirect::route('perm.group.edit', $id);
   }

   public function group_del_user($id, $user_id) {
      UserGroup::findOrFail($id)->users()->detach(User::findOrFail($user_id));
      // return Redirect::route('perm.group.edit', $id);
   }

   public function group_add_role($id) {
      UserGroup::findOrFail($id)->users()->attach(UserRole::find(Input::get('role')));

      return Redirect::route('perm.group.edit', $id);
   }

   public function group_del_role($id, $role_id) {
      UserGroup::findOrFail($id)->users()->detach(UserRole::findOrFail($role_id));
      // return Redirect::route('perm.group.edit', $id);
   }

   public function group_create() {
      return View::make('admin.perm.group_add');
   }

   public function group_store() {
      $data = Input::all();

      $group = new UserGroup();
      $group->fill($data);
      $group->save();

      return Redirect::route('perm.group.list');
   }

   public function group_update($id) {
      $data = Input::all();

      $group = UserGroup::findOrFail($id);
      $group->fill($data);
      $group->save();

      return Redirect::route('perm.group.list');
   }

   public function group_destroy($id) {
      UserGroup::findOrFail($id)->delete();
   }

   // Roles

   public function role_index() {
      return View::make('admin.perm.role_list', ['roles' => UserRole::all()]);
   }

   public function role_create() {
      return View::make('admin.perm.role_add');
   }

   public function role_store() {
      $data = Input::all();

      $group = new UserRole();
      $group->fill($data);
      $group->save();

      return Redirect::route('perm.role.list');
   }

   public function role_edit($id) {

      // Users
      $aff_users = [];

      foreach (UserRole::find($id)->users as $user)
         $aff_users[] = $user->id;

      $users = [];
      /** @var User $user */
      foreach (User::all() as $user) {
         if (!in_array($user->id, $aff_users)) {
            $users[$user->id] = $user->customLoginName . ' (' . $user->email . ')';
         }
      }

      // Groups
      $aff_groups = [];

      foreach (UserRole::find($id)->groups as $group)
         $aff_groups[] = $group->id;

      $groups = [];
      /** @var UserGroup $group */
      foreach (UserGroup::all() as $group) {
         if (!in_array($group->id, $aff_groups)) {
            $groups[$group->id] = $group->displayName;
         }
      }

      // Permissions
      $aff_permissions = [];

      foreach (UserRole::find($id)->permissions as $group)
         $aff_permissions[] = $group->id;

      $permissions = [];
      /** @var UserPermission $permission */
      foreach (UserPermission::all() as $permission) {
         if (!in_array($permission->id, $aff_permissions)) {
            $permissions[$permission->id] = $permission->displayName;
         }
      }

      return View::make('admin.perm.role_edit', [
            'role'        => UserRole::findOrFail($id),
            'users'       => $users,
            'groups'      => $groups,
            'permissions' => $permissions
      ]);
   }

   public function role_add_user($id) {
      UserRole::findOrFail($id)->users()->attach(User::find(Input::get('user')));

      return Redirect::route('perm.role.edit', $id);
   }

   public function role_del_user($id) {
      UserRole::findOrFail($id)->users()->detach(User::find(Input::get('user')));
      // return Redirect::route('perm.role.edit', $id);
   }

   public function role_add_group($id) {
      UserRole::findOrFail($id)->groups()->attach(UserGroup::find(Input::get('group')));

      return Redirect::route('perm.role.edit', $id);
   }

   public function role_del_group($id) {
      UserRole::findOrFail($id)->groups()->detach(UserGroup::find(Input::get('group')));
      // return Redirect::route('perm.role.edit', $id);
   }

   public function role_add_permission($id) {
      UserRole::findOrFail($id)->groups()->attach(UserPermission::find(Input::get('permission')));

      return Redirect::route('perm.role.edit', $id);
   }

   public function role_del_permission($id) {
      UserRole::findOrFail($id)->groups()->detach(UserPermission::find(Input::get('permission')));
      // return Redirect::route('perm.role.edit', $id);
   }

   public function role_update($id) {
      $data = Input::all();

      $group = UserRole::findOrFail($id);
      $group->fill($data);
      $group->save();

      return Redirect::route('perm.role.list');
   }

   public function role_destroy($id) {
      UserRole::find($id)->delete();
   }

   // Permission

   /**
    * @param \Illuminate\Database\Eloquent\Model $type
    * @param Integer $target_id
    * @param Input $data
    *
    * @return int
    */
   protected function sight_perm_add($type, $target_id, $data) {

      foreach (['read', 'write', 'link', 'delete'] as $p_type)
         (array_key_exists($p_type . 'Permission', $data)) ? : $data[$p_type . 'Permission'] = false;

      $target = $type::findOrFail($target_id);
      $className_tmp = UserSightPermissionType::findOrFail($data['permissionType']);
      $className = $className_tmp->objectName;

      if (!($target instanceof User || $target instanceof UserGroup)) {
         return;
      }

      $target->grantPermission(
            $className::findOrFail($data['appObjectId']),
            [
                  'r' => $data['readPermission'],
                  'w' => $data['writePermission'],
                  'l' => $data['linkPermission'],
                  'd' => $data['deletePermission']
            ]
      );
   }

   /**
    * @param \Illuminate\Database\Eloquent\Model $type
    * @param $target_id
    * @param $perm_id
    *
    * @return int
    */
   protected function sight_perm_del($type, $target_id, $perm_id) {
      $target = $type::findOrFail($target_id);
      $perm = UserSightPermission::findOrFail($perm_id);

      return $target->sightPermissions()->detach($perm);
   }

   public function sight_perm_type_index() {
      return View::make('admin.perm.sight_perm_type_list', ['types' => UserSightPermissionType::all()]);
   }


   public function sight_perm_user_add($id) {

      $rules = [
            'permissionType' => 'Exists:user_sight_permission_types,id',
            'appObjectId'    => 'Required|Integer|Min:1'
      ];

      $v = Validator::make(Input::all(), $rules);

      if (
            $v->passes() &&
            $this->sight_perm_add('User', $id, Input::all())
      ) {
         return Redirect::back();
      } else {
         Session::flash('errors', $v->getMessageBag());

         return Redirect::back();
      }
   }

   public function sight_perm_user_remove($id, $sp_id) {
      return $this->sight_perm_del('User', $id, $sp_id);
   }

   public function sight_perm_group_add($id) {
      $rules = [
            'permissionType' => 'Exists:user_sight_permission_types,id',
            'appObjectId'    => 'Required|Integer|Min:1'
      ];

      $v = Validator::make(Input::all(), $rules);

      if (
            $v->passes() &&
            $this->sight_perm_add('UserGroup', $id, Input::all())
      ) {
         return Redirect::back();
      } else {
         Session::flash('errors', $v->getMessageBag());

         return Redirect::back();
      }
   }

   public function sight_perm_group_remove($id, $grp_id) {
      $this->sight_perm_del('UserGroup', $id, $grp_id);
   }

}