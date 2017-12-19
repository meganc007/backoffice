<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table){
			$table->increments('id');
			$table->integer('company_id');
			$table->integer('domain_id');
			$table->integer('user_id');
			$table->string('name');
			$table->string('type');
			$table->string('status');
			$table->datetime('status_date');
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
		Schema::drop('projects');
	}

}
