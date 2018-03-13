<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeCommentsParentidNullable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE `comments` MODIFY `parent_id` INTEGER NULL;');
	    DB::statement('UPDATE `comments` SET `parent_id` = NULL WHERE `parent_id` = 0;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('UPDATE `comments` SET `parent_id` = 0 WHERE `parent_id` IS NULL;');
    	DB::statement('ALTER TABLE `comments` MODIFY `parent_id` INTEGER NOT NULL;');
	}

}
