<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIps extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      Schema::create('ips', function (Blueprint $table) {
         $table->increments('id');
         $table->string('ip');
         $table->timestamps();
      });

      Schema::create('gameserver_ips', function (Blueprint $table) {
         $table->increments('id');
         $table->string('port');
         $table->integer('ip_id')->unsigned();
         $table->foreign('ip_id')->references('id')->on('ips');
         $table->timestamps();
      });

      Schema::table('gameservers', function ($table) {
         $table->integer('ipport_id')->unsigned();
         $table->foreign('ipport_id')->references('id')->on('gameserver_ips');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      Schema::drop('ips');
      Schema::drop('gameservers_ips');
      Schema::table('gameservers', function ($table) {
         $table->dropForeign('gameservers_ipport_id_foreign');
         $table->dropColumn(['ipport_id']);
      });
   }

}
