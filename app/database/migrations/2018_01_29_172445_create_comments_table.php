<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table) 
		{
			$table->increments('id');
			$table->integer('company_id');
			$table->integer('user_id');
			$table->integer('project_id');
			$table->integer('line_id')->nullable();
			$table->integer('charges_id')->nullable();
			$table->integer('parent')->nullable();
			$table->integer('child')->nullable();
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
		Schema::drop('comments');
	}

}
