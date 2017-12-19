<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logins', function(Blueprint $table){
			$table->increments('id');
			$table->integer('company_id');
			$table->integer('server_id');
			$table->integer('domain_id');
			$table->string('username');
			$table->string('password');
			$table->string('login_type');
			$table->string('url');
			$table->string('comments');
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
		Schema::drop('logins');
	}

}
