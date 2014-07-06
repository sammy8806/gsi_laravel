<?php

/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 06.07.14
 * Time: 22:24
 */
class PermissionAdminController extends BaseController {

   // Groups

   public function getGroup($id = null) {
      if ($id === null) {
         return View::make('admin.perm.group_list', UserGroup::all());
      }
   }

   public function postGroup() {
      // Add an Group
   }

   public function patchGroup($id) {
      // Update an Group
   }

   // Roles

   public function getRole($id = null) {
      if ($id === null) {
         return View::make('admin.perm.role_list', UserRole::all());
      }
   }

   public function postRole() {
      // Add an Role
   }

   public function patchRole($id) {
      // Update an Role
   }

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
} 