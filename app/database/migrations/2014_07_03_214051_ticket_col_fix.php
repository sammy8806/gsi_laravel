<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TicketColFix extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      Schema::table('tickets', function (Blueprint $table) {
         $table->dropIndex('tickets_issuer_foreign');
         $table->dropIndex('tickets_responder_foreign');
         $table->dropIndex('tickets_parent_foreign');
         $table->dropIndex('tickets_category_foreign');

         $table->renameColumn('issuer', 'issuer_id');
         $table->renameColumn('responder', 'responder_id');
         $table->renameColumn('parent', 'parent_id');
         $table->renameColumn('category', 'category_id');

         $table->foreign('issuer_id')->references('id')->on('users');
         $table->foreign('responder_id')->references('id')->on('users');
         $table->foreign('parent_id')->references('id')->on('tickets');
         $table->foreign('category_id')->references('id')->on('ticket_categories');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      Schema::table('tickets', function (Blueprint $table) {
         $table->dropForeign('tickets_issuer_id_foreign');
         $table->dropForeign('tickets_responder_id_foreign');
         $table->dropForeign('tickets_parent_id_foreign');
         $table->dropForeign('tickets_category_id_foreign');

         $table->renameColumn('issuer_id', 'issuer');
         $table->renameColumn('responder_id', 'responder');
         $table->renameColumn('parent_id', 'parent');
         $table->renameColumn('category_id', 'category');

         $table->foreign('issuer')->references('id')->on('users');
         $table->foreign('responder')->references('id')->on('users');
         $table->foreign('parent')->references('id')->on('tickets');
         $table->foreign('category')->references('id')->on('ticket_categories');
      });
   }

}
