<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableGameserver extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gameservers', function($table) {
         $table->integer('slot');
         $table->bigInteger('memory');
         $table->string('status', 30);
         $table->string('displayName');
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
      Schema::table('gameservers', function($table) {
         $table->dropColumn(['slot', 'memory', 'status', 'displayName']);
      });
	}

}
