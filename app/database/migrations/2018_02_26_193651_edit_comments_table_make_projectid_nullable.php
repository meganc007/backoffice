<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCommentsTableMakeProjectidNullable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE `comments` MODIFY `project_id` INTEGER NULL;');
	    DB::statement('UPDATE `comments` SET `project_id` = NULL WHERE `project_id` = 0;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('UPDATE `comments` SET `project_id` = 0 WHERE `project_id` IS NULL;');
    	DB::statement('ALTER TABLE `comments` MODIFY `project_id` INTEGER NOT NULL;');
	}

}
