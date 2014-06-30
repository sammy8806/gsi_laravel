<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      Schema::create('users', function (Blueprint $table) {
         $table->engine = 'InnoDB';

         $table->increments('id');

         $table->string('first_name', 50)->nullable();
         $table->string('last_name', 50)->nullable();
         $table->string('email', 50);
         $table->string('customLoginName', 50)->nullable();
         $table->string('lastLogin', 50)->nullable();
         $table->string('lastLoginIP', 50)->nullable();
         $table->string('password');
         $table->text('address')->nullable();
         $table->dateTime('lastLoginDate');
         $table->boolean('active');
         $table->string('phone', 50)->nullable();
         $table->string('cellnumber', 50)->nullable();
         $table->string('remember_token', 100)->nullable();

         $table->timestamps();
         $table->softDeletes();

      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      Schema::drop('users');
   }

}
