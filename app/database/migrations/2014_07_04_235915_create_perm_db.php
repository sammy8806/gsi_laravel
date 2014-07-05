<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermDb extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      // Create the main tables
      Schema::create('user_groups', function (Blueprint $table) {
         $table->engine = 'InnoDB';
         $table->increments('id');
         $table->string('displayName');
         $table->string('description');
      });

      Schema::create('user_sight_permissions', function (Blueprint $table) {
         $table->engine = 'InnoDB';
         $table->increments('id');
         $table->integer('appObjectId');
         $table->boolean('readPermission');
         $table->boolean('writePermission');
         $table->boolean('linkPermission');
         $table->boolean('deletePermission');
      });

      Schema::create('user_sight_permission_types', function (Blueprint $table) {
         $table->engine = 'InnoDB';
         $table->increments('id');
         $table->string('objectName');
      });

      Schema::create('user_permissions', function (Blueprint $table) {
         $table->engine = 'InnoDB';
         $table->increments('id');
         $table->string('displayName');
         $table->string('name');
         $table->string('value');
      });

      Schema::create('user_roles', function (Blueprint $table) {
         $table->engine = 'InnoDB';
         $table->increments('id');
         $table->string('displayName');
         $table->string('description');
      });

      // Create the dependency tables
      $pairs = [
            ['role', 'permission'],
            ['role', 'group'],
            ['role', 'user'],
            ['group', 'user'],
            ['sight_permission', 'group'],
            ['sight_permission', 'user'],
            ['sight_permission', 'sight_permission_type']
      ];

      foreach ($pairs as $pair) {
         Schema::create('dep_' . $pair[0] . '2' . $pair[1], function (Blueprint $table) use ($pair) {
            for ($i = 0; $i <= 1; $i++) {
               $table->integer($pair[$i] . '_id')->unsigned();
               $table->foreign(
                     $pair[$i] . '_id',
                     ($pair[0] == 'sight_permission' && $pair[1] == 'sight_permission_type') ?
                           'dep_sight2sight_type_sight' . ($i == 1 ? '_type' : '') . '_id_foreign' : null
               )
                     ->references('id')
                     ->on(($pair[$i] == 'user') ? $pair[$i] . 's' : 'user_' . $pair[$i] . 's');
            }
         });
      }
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      //
   }

}
