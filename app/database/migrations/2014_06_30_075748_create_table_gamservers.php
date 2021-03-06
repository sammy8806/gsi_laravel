<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableGamservers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gameservers', function(Blueprint $table)
		{
         $table->engine = 'InnoDB';

			$table->increments('id');
			$table->timestamps();

         $table->softDeletes();

         $table->integer('weight')->default(100)->unsigned();

         $table->integer('user_id')->unsigned();
         $table->integer('game_id')->unsigned();

         $table->foreign('user_id')->references('id')->on('users');
         $table->foreign('game_id')->references('id')->on('games');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gameservers');
	}

}
