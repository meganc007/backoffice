<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisedCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('post_id');
			$table->integer('parent_id');
			$table->longText('comment');
			$table->boolean('internal');
			$table->boolean('hidden');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
