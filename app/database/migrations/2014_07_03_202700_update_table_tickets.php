<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableTickets extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      Schema::table('tickets', function (Blueprint $table) {
         $table->string('status');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      Schema::table('tickets', function (Blueprint $table) {
         Schema::dropColumn(['status']);
      });
   }

}
