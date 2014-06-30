<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableScripts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::table('scripts', function($table) {
         $table->dropForeign('scripts_game_id_foreign');
      });

		Schema::create('games_scripts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

         $table->integer('game_id')->unsigned();
         $table->integer('script_id')->unsigned();

         $table->foreign('game_id')->references('id')->on('games');
         $table->foreign('script_id')->references('id')->on('scripts');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('games_scripts');
	}

}
