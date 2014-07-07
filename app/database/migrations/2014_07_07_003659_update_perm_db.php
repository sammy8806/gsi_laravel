<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdatePermDb extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
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
         Schema::table('dep_' . $pair[0] . '2' . $pair[1], function (Blueprint $table) use ($pair) {
            $table->increments('id');
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
