<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table){

			$table->increments('id');
			$table->integer('company_id');
			$table->string('fname');
			$table->string('lname');
			$table->string('email');
			$table->string('department');
			$table->string('status');
			$table->string('phone');
			$table->string('password');
			$table->string('reset_token');
			$table->datetime('token_time');
			$table->boolean('hidden');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
