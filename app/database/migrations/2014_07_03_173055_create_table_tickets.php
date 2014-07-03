<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTickets extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {

      Schema::create('ticket_categories', function(Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->string('short')->nullable();
         $table->string('color')->nullable();
      });

      Schema::create('tickets', function (Blueprint $table) {
         $table->increments('id');

         $table->integer('priority');
         $table->string('title');
         $table->text('text');

         $table->integer('issuer')->unsigned();
         $table->integer('responder')->unsigned();
         $table->integer('parent')->unsigned();
         $table->integer('category')->unsigned();

         $table->foreign('issuer')->references('id')->on('users');
         $table->foreign('responder')->references('id')->on('users');
         $table->foreign('parent')->references('id')->on('tickets');
         $table->foreign('category')->references('id')->on('ticket_categories');

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
      Schema::drop('tickets', 'ticket_categories');
   }

}
