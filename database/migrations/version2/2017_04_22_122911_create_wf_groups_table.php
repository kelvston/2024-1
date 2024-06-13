<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWfGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wf_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('wf_module_id');
			$table->integer('level_id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wf_groups');
	}

}
