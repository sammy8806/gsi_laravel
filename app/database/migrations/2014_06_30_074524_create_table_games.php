<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGames extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      Schema::create('games', function (Blueprint $table) {
         $table->engine = 'InnoDB';
         $table->increments('id');
         $table->timestamps();

         $table->softDeletes();

         $table->string('name', 80);
         $table->string('short', 10);
         $table->boolean('live_console')->default(false);
         $table->string('check_type', 15);

      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      Schema::drop('games');
   }

}
