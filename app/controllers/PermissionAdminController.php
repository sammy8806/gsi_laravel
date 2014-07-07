<?php

/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 06.07.14
 * Time: 22:24
 */
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
            $roles[$role->id] = $user->displayName;
         }
      }

      return View::make('admin.perm.group_edit', [
            'group' => UserGroup::find($id),
            'users' => $users,
            'roles' => UserRole::all()
      ]);
   }

   public function group_add_user($id) {
      UserGroup::findOrFail($id)->users()->attach(User::find(Input::get('user')));

      return Redirect::route('perm.group.edit', $id);
   }

   public function group_del_user($id) {
      UserGroup::findOrFail($id)->users()->detach(User::find(Input::get('user')));
      // return Redirect::route('perm.group.edit', $id);
   }

   public function group_add_role($id) {
      UserGroup::findOrFail($id)->users()->attach(UserRole::find(Input::get('role')));

      return Redirect::route('perm.group.edit', $id);
   }

   public function group_del_role($id) {
      UserGroup::findOrFail($id)->users()->detach(UserRole::find(Input::get('role')));
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
      // Update an Group
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

   /*
      // Permission

      public function getPermission($id = null) {
         if ($id === null) {
            return View::make('admin.perm.permission_list', UserPermission::all());
         }
      }

      public function postPermission() {
         // Add an Permission
      }

      public function patchPermisison($id) {
         // Update an Permission
      }

      // Sight-Permission Types

      public function getSightPermissionType($id = null) {
         if ($id === null) {
            return View::make('admin.perm.sight_perm_list', UserSightPermissionType::all());
         }
      }

      public function postSightPermissionType() {
         // Add an Sight-Permission Type
      }

      public function patchSightPermissionType($id) {
         // Updates an Sight-Permission Type
      }
   */
}