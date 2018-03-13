<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) 
		{
			$table->increments('id');
			$table->integer('company_id');
			$table->integer('user_id');
			$table->integer('project_id');
			$table->integer('line_id')->nullable();
			$table->integer('charge_id')->nullable();
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
		Schema::drop('posts');
	}

}
